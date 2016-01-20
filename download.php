<?php

include "appdata/conf.php";


$archive_file_name='photos.zip';

$zip = new ZipArchive();

if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE) !== TRUE) {
    exit("cannot open <$archive_file_name>\n");
}



$filer = scandir(substr_replace($folder, "", -1));
unset($filer[0]);
unset($filer[1]);
unset($filer[2]);


foreach ($filer as $files) {
    $zip->addFile($folder . $files, $files);
}


$zip->close();
//then send the headers to foce download the zip file
header("Content-type: application/zip");
header("Content-Disposition: attachment; filename=$archive_file_name");
header("Pragma: no-cache");
header("Expires: 0");
readfile("$archive_file_name");


unlink($archive_file_name);
