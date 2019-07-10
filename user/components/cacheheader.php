<?php
$cachefile = 'cache.html';
$cachetime = 4 * 60;
// Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->n";
    exit;
}
ob_start(); // Start the output buffer

?>