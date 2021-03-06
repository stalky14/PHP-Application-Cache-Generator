<?php
ob_start();
header("content-type: text/cache-manifest; charset: UTF-8");

echo "CACHE MANIFEST \n";
echo "# Generated with PHP \n";
echo "# Andrew Stalker 2015 \n\n";
echo "# Explicitly cached files \n";

$dir = dirname(__FILE__);
$dirlength = strlen($dir)+1;
// This is the length of the site root from the manifest file.
// This part of the path and the proceeding / (reason for the +1) must be removed to give relative link to file.

// Global Variables
$excludedExt = [];
$excludedDirs = ["subdir"];

printFiles($dir,$dirlength);

echo "NETWORK: \n";
echo "* \n\n";

function printFiles($dir,$rootlength)
{
    global $excludedDirs;
    if(!in_array(substr($dir,$rootLength), $excludedDirs)) {
       $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? printFiles("$dir/$file",$rootlength) : printFile("$dir/$file",$rootlength);
        } 
    }
}

function printFile($file,$rootlength)
{
  global $excludedExt;
  if(substr($file,$rootlength) !== substr(__FILE__,$rootlength)) {
      if(!in_array(pathinfo($file, PATHINFO_EXTENSION), $excludedExt)) {
          echo substr($file,$rootlength)."\n";
          echo "#".md5_file($file)."\n";
      }
  }
}
ob_flush();
