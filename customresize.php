<?php
include "appdata/conf.php";
$imgname = $folder . $_POST["img"];
$full_width = intval($_POST["full_width"]);
$full_height = intval($_POST["full_Height"]);
$resized_width = intval($_POST["resized_width"]);
$resized_height = intval($_POST["resized_height"]);
$start_x = intval($_POST["start_x"]);
$start_y = intval($_POST["start_y"]);
$fastemaal = $_POST["fastemaal"];
$ny_width = intval($_POST["ny_width"]);
$ny_height = intval($_POST["ny_height"]);

$fileinfomation = getimagesize($imgname);
$width = $fileinfomation[0];
$height = $fileinfomation[1];
$mime = $fileinfomation["mime"];
$type = substr(strrchr($mime, '/'), 1);


$img = false;
switch ($type) {
    case 'jpeg':
        $img = imagecreatefromjpeg($imgname);
        $new_image_ext = 'jpg';
        break;

    case 'png':
        $img = imagecreatefrompng($imgname);
        $new_image_ext = 'png';
        imagealphablending($img, false);
        imagesavealpha($img, true);
        break;

    case 'bmp':
        $img = imagecreatefrombmp($imgname);
        $new_image_ext = 'bmp';
        break;

    case 'gif':
        $img = imagecreatefromgif($imgname);
        $new_image_ext = 'gif';
        break;

    case 'vnd.wap.wbmp':
        $img = imagecreatefromwbmp($imgname);
        $new_image_ext = 'bmp';
        break;

    case 'xbm':
        $img = imagecreatefromxbm($imgname);
        $new_image_ext = 'xbm';
        break;

    default:
        $img = imagecreatefromjpeg($imgname);
        $new_image_ext = 'jpg';
}
$after_croped_width = round(($resized_width/$full_width)*$width);
$after_croped_height = round(($resized_height/$full_height)*$height);
$croppin_x = round(($start_x/$full_width)*$width);
$croppin_y = round(($start_y/$full_height)*$height);
// bool imagecopy (  $dst_im ,  $src_im ,  $dst_x ,  $dst_y ,  $src_x ,  $src_y ,  $src_w ,  $src_h )
$img = imagecrop($img, array("x"=>$croppin_x, "y"=>$croppin_y, "width"=>$after_croped_width, "height"=>$after_croped_height));

switch ($type) {
    case 'jpeg':
        imagejpeg($img, $imgname);
        break;

    case 'png':
        imagepng($img, $imgname);
        break;

    case 'bmp':
        imagebmp($img, $imgname);
        break;

    case 'gif':
        imagegif($img, $imgname);
        break;

    case 'vnd.wap.wbmp':
        imagewbmp($img, $imgname);
        break;

    case 'xbm':
        imagexbm($img, $imgname);
        break;

    default:
        imagejpeg($img, $imgname);
}
imagedestroy($img);


if ($fastemaal == "1") {
    /*$new_image = imagecreatetruecolor($ny_width, $ny_height);
    $aspect1 = $ny_height / $ny_width;
    $aspect1_o = $ny_width / $ny_height;
    $aspect2 = $after_croped_height / $after_croped_width;

    if ($aspect1 < $aspect2) {
        // lut i top og bund
        $start_y_f = round(($start_y/$full_height)*$height);


        imagecopy($img, $img, 0, $start_y_f, 0, 0, $ny_width, $ny_height);
    } else if ($aspect1 > $aspect2) {

    } else {
        imagecopy($img, $img, 0, 0, 0, 0, $ny_width, $ny_height);
    }*/

    include 'php_image_magician.class.php';
    $img = new imageLib($imgname);
    $img->resizeImage($ny_width, $ny_height, 4);
    $img->saveImage($imgname);
}



list($w, $h, $type, $attr) = getimagesize($imgname);


echo json_encode(array(
    "width"=>$w,
    "height"=>$h,
    "class"=> ($w > $h ? 'lanscape' : ($w == $h ? 'kvadradic' : 'protrat'))
));