<?php
$dir = new RecursiveDirectoryIterator('admin');
$iterator = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    $new_content = str_replace('../../APJ-WEB/wp-content/uploads/', '../uploads/', $content);
    $new_content = str_replace('../APJ-WEB/wp-content/uploads/', '../uploads/', $new_content);
    if ($content !== $new_content) {
        file_put_contents($path, $new_content);
        echo "Updated $path\n";
    }
}
echo "Done admin replacements.\n";
?>
