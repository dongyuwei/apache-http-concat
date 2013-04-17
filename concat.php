<?php
/*
 *@author newdongyuwei@gmail.com
 */
$filelist = $_GET[ "files" ].split('?');

$type;
if (preg_match('/\.js/', $filelist)) {
    $type = 'application/x-javascript';
} 
if (preg_match('/\.css/', $filelist)) {
    $type = 'text/css';
}
header('Content-Type: ' . $type );

$root = dirname(__FILE__);
$files = explode( "?", $filelist );
array_shift($files);
$files = explode(',',$files[0]);
foreach ( $files as $idx => $file ) {
    $file = $root . '/' . $file;
    if (!file_exists($file)) {
        echo ($file . ' not found.');
    }
    echo file_get_contents($file);
}