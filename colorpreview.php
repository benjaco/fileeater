<?php
/**
 * Created by Benjaco
 */



$fil = 'uploadfolder/' . $_GET['fil'];

$sorthvid = $_GET["ss"];
$kontrast = $_GET["k"];
$lysbalance = $_GET["b"];


$fileinfomation = getimagesize($fil);

$width = $fileinfomation[0];
$height = $fileinfomation[1];
$mime = $fileinfomation["mime"];
header('Content-Type:'.$mime);

$type = substr(strrchr($mime, '/'), 1);



$img = false;

switch ($type) {
    case 'jpeg':
        $img = imagecreatefromjpeg($fil);
        $new_image_ext = 'jpg';
        break;

    case 'png':
        $img = imagecreatefrompng($fil);
        $new_image_ext = 'png';
        imagealphablending($img, false);
        imagesavealpha($img, true);
        break;

    case 'bmp':
        $img = imagecreatefrombmp($fil);
        $new_image_ext = 'bmp';
        break;

    case 'gif':
        $img = imagecreatefromgif($fil);
        $new_image_ext = 'gif';
        break;

    case 'vnd.wap.wbmp':
        $img = imagecreatefromwbmp($fil);
        $new_image_ext = 'bmp';
        break;

    case 'xbm':
        $img = imagecreatefromxbm($fil);
        $new_image_ext = 'xbm';
        break;

    default:
        $img = imagecreatefromjpeg($fil);
        $new_image_ext = 'jpg';
}

if ($sorthvid == "1") {
    imagefilter($img, IMG_FILTER_GRAYSCALE);
}
imagefilter($img, IMG_FILTER_BRIGHTNESS, $lysbalance);
imagefilter($img, IMG_FILTER_CONTRAST, $kontrast);


switch ($type) {
    case 'jpeg':
        imagejpeg($img);
        break;

    case 'png':
        imagepng($img);
        break;

    case 'bmp':
        imagebmp($img);
        break;

    case 'gif':
        imagegif($img);
        break;

    case 'vnd.wap.wbmp':
        imagewbmp($img);
        break;



    default:
        imagejpeg($img);
}



imagedestroy($img);
