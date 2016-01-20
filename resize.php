<?php
/**
 * Created by Benjaco
 */

include "appdata/conf.php";

$imgname = $_POST['fil'];
$w = $_POST['width'];
$h = $_POST['height'];

include "php_image_magician.class.php";

$magicianObj = new imageLib($folder . $imgname);


$magicianObj->resizeImage($w, $h, 'crop');


$magicianObj->saveImage($folder . $imgname);


echo ($w > $h ? 'lanscape' : ($w == $h ? 'kvadradic' : 'protrat' ) );