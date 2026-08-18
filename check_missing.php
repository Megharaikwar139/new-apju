<?php
$missing = 0;
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));
foreach ($files as $file) {
    if ($file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        // Find links like uploads/...
        if (preg_match_all('/(?:src|href)=[\'"](uploads\/[^\'"]+)[\'"]/i', $content, $matches)) {
            foreach ($matches[1] as $localPath) {
                $absolutePath = __DIR__ . '/' . $localPath;
                if (!file_exists($absolutePath)) {
                    echo "Missing local file: $localPath (in {$file->getFilename()})\n";
                    $missing++;
                    if ($missing > 10) break 2;
                }
            }
        }
    }
}
echo "Total missing: $missing\n";
