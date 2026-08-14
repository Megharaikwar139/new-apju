<?php
$html = file_get_contents('media_test3.html');
preg_match_all('/<p(.*?)>(.*?)<\/p>/is', $html, $matches);
foreach($matches[2] as $match) {
    echo trim(strip_tags($match)) . "\n";
}
