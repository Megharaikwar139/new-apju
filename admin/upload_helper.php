<?php
/**
 * Secure File Upload Helper
 * Protects against Malicious File Uploads, Web Shells, and Path Traversal.
 */

if (!defined('SECURE_UPLOAD_HELPER')) {
    define('SECURE_UPLOAD_HELPER', true);
}

/**
 * Validates and securely saves an uploaded file.
 *
 * @param array $file The $_FILES['input_name'] array
 * @param string $destinationDir Absolute destination directory path
 * @param array $allowedExtensions Array of allowed extensions, e.g. ['jpg', 'jpeg', 'png', 'webp', 'pdf']
 * @param int $maxSizeBytes Maximum allowed file size in bytes (default 12MB)
 * @return array ['success' => bool, 'fileName' => string, 'error' => string]
 */
function secure_upload_file($file, $destinationDir, $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'], $maxSizeBytes = 12582912) {
    if (empty($file) || !isset($file['error'])) {
        return ['success' => false, 'fileName' => '', 'error' => 'No file provided.'];
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errorMessages = [
            UPLOAD_ERR_INI_SIZE   => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
            UPLOAD_ERR_FORM_SIZE  => 'The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form.',
            UPLOAD_ERR_PARTIAL    => 'The uploaded file was only partially uploaded.',
            UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the file upload.'
        ];
        return ['success' => false, 'fileName' => '', 'error' => $errorMessages[$file['error']] ?? 'Upload error.'];
    }

    // 1. Verify file was actually uploaded via HTTP POST
    if (!is_uploaded_file($file['tmp_name'])) {
        return ['success' => false, 'fileName' => '', 'error' => 'Invalid upload request detected.'];
    }

    // 2. Validate file size
    if ($file['size'] > $maxSizeBytes) {
        $maxMB = round($maxSizeBytes / (1024 * 1024), 1);
        return ['success' => false, 'fileName' => '', 'error' => "File size exceeds limit of {$maxMB}MB."];
    }

    // 3. Extract and check extension
    $originalName = $file['name'];
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    $normalizedAllowed = array_map('strtolower', $allowedExtensions);
    if (!in_array($extension, $normalizedAllowed, true)) {
        return ['success' => false, 'fileName' => '', 'error' => 'Invalid file format. Allowed: ' . implode(', ', $allowedExtensions)];
    }

    // 4. Reject dangerous double extensions (e.g. shell.php.jpg)
    $dangerousSubstrings = ['php', 'phtml', 'phar', 'inc', 'exe', 'sh', 'py', 'pl', 'cgi', 'asp', 'jsp'];
    $filenameWithoutLastExt = pathinfo($originalName, PATHINFO_FILENAME);
    $allParts = explode('.', strtolower($filenameWithoutLastExt));
    foreach ($allParts as $part) {
        if (in_array(trim($part), $dangerousSubstrings, true)) {
            return ['success' => false, 'fileName' => '', 'error' => 'Security Error: File contains suspicious multi-extension.'];
        }
    }

    // 5. Validate MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedMime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    $allowedMimes = [
        'jpg'  => ['image/jpeg', 'image/pjpeg'],
        'jpeg' => ['image/jpeg', 'image/pjpeg'],
        'png'  => ['image/png', 'image/x-png'],
        'webp' => ['image/webp'],
        'gif'  => ['image/gif'],
        'svg'  => ['image/svg+xml', 'text/plain', 'text/xml'],
        'pdf'  => ['application/pdf', 'application/x-pdf'],
        'doc'  => ['application/msword'],
        'docx' => ['application/vnd.openxmlformats-officedocument.wordprocessingml.document']
    ];

    if (isset($allowedMimes[$extension])) {
        if (!in_array($detectedMime, $allowedMimes[$extension], true)) {
            return ['success' => false, 'fileName' => '', 'error' => 'File content type does not match its extension.'];
        }
    }

    // 6. Ensure destination directory exists and is writable
    if (!is_dir($destinationDir)) {
        if (!@mkdir($destinationDir, 0755, true)) {
            return ['success' => false, 'fileName' => '', 'error' => 'Failed to create destination directory.'];
        }
    }

    // 7. Generate a secure, clean unique filename
    $cleanBase = preg_replace('/[^a-zA-Z0-9_-]/', '', pathinfo($originalName, PATHINFO_FILENAME));
    $cleanBase = substr($cleanBase, 0, 40);
    $uniqueId = time() . '_' . bin2hex(random_bytes(4));
    $safeFileName = (!empty($cleanBase) ? $cleanBase . '_' : '') . $uniqueId . '.' . $extension;

    $targetPath = rtrim($destinationDir, '/\\') . DIRECTORY_SEPARATOR . $safeFileName;

    // 8. Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return ['success' => false, 'fileName' => '', 'error' => 'Failed to move uploaded file.'];
    }

    // Set safe permissions
    @chmod($targetPath, 0644);

    return [
        'success'  => true,
        'fileName' => $safeFileName,
        'filePath' => $targetPath,
        'error'    => ''
    ];
}
