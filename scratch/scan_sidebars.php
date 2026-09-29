<?php
$files = glob(__DIR__ . '/../*.php');
$results = [];
foreach ($files as $file) {
    $content = file_get_contents($file);
    $bn = basename($file);
    if (preg_match_all('/(?:include|require|include_once|require_once)\s*[\'"]([^\'"]*sidebar[^\'"]*)[\'"]/i', $content, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $m) {
            $results[] = [
                'file' => $bn,
                'sidebar' => $m[1]
            ];
        }
    }
}

foreach ($results as $r) {
    printf("%-45s => %s\n", $r['file'], $r['sidebar']);
}
