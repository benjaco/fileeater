<?php
/**
 * Created by Benjaco
 */
include "appdata/conf.php";
$fil = $folder . $_POST['fil'];
$hvadskalgores = $_POST['vej'];

$fileinfomation = getimagesize($fil);

$width = $fileinfomation[0];
$height = $fileinfomation[1];
$mime = $fileinfomation["mime"];

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



switch ($hvadskalgores) {
    case 1:
        $img = imagerotate($img, 90, 0);
        break;
    case 2:
        $img = imagerotate($img, 180, 0);
        break;
    case 3:
        $img = imagerotate($img, 270, 0);
        break;
    case 4: // horizontal

        imageflip($img, IMG_FLIP_HORIZONTAL);

        break;
    case 5: //vertical
        imageflip($img, IMG_FLIP_VERTICAL);




}

switch ($type) {
    case 'jpeg':
        imagejpeg($img, $fil);
        break;

    case 'png':
        imagepng($img, $fil);
        break;

    case 'bmp':
        imagebmp($img, $fil);
        break;

    case 'gif':
        imagegif($img, $fil);
        break;

    case 'vnd.wap.wbmp':
        imagewbmp($img, $fil);
        break;

    case 'xbm':
        imagexbm($img, $fil);
        break;

    default:
        imagejpeg($img, $fil);
}



imagedestroy($img);

list($w, $h, $type, $attr) = getimagesize($fil);


echo($w > $h ? 'lanscape' : ($w == $h ? 'kvadradic' : 'protrat'));