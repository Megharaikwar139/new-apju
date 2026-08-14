<?php
$pages = ['gallery', 'why-aku', 'our-recruiters', 'awardsand-recognigation', 'faculty-welfare'];
foreach($pages as $slug) {
    file_put_contents($slug . '.php', "<?php\n\$_GET['type'] = 'page';\n\$_GET['slug'] = '$slug';\nrequire 'single.php';\n?>");
}
echo "Physical files created.\n";
?>
