<?php
ob_start();
header("content-type: text/cache-manifest; charset: UTF-8");

echo "CACHE MANIFEST \n";
echo "# Generated with PHP \n";
echo "# Andrew Stalker 2015 \n\n";
echo "# Explicitly cached files \n";

$dir = dirname(__FILE__);
//echo "# ".$dir. "\n";

$files = array_diff(scandir($dir), array('.', '..'));
foreach ($files as $file) {
    echo "$file\n";
    echo "#".md5_file($file)."\n";
}

ob_flush();