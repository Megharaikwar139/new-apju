<?php
$content = file_get_contents('index.php');
$content = preg_replace('/urlencode\(([^)]+)\)/', '$1', $content);
file_put_contents('index.php', $content);
echo 'done';
