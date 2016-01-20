<?php
/**
 * Created by Benjaco
 */

if (isset($_FILES['file'])) {
    $mode = intval($_GET['fm']);


    $names = $_FILES['file']['name'];
    $types = $_FILES['file']['type'];
    $tmpnames = $_FILES['file']['tmp_name'];
    $errors = $_FILES['file']['error'];
    $sizes = $_FILES['file']['size'];

    $antal = count($names);

    $fil = array(
        'name' => $names[0],
        'type' => $types[0],
        'tmp_name' => $tmpnames[0],
        'error' => $errors[0],
        'size' => $sizes[0]
    );




    $response = array();

    $id = intval(file_get_contents("appdata/fileid.txt"));


    if (getimagesize($fil['tmp_name'])) {

        list($w, $h, $type, $attr) = getimagesize($fil['tmp_name']);


        $oldfilename = basename($fil['name']);
        $pices = explode(".", $oldfilename);
        $end = end($pices);
        $first = substr($oldfilename, 0, strlen($oldfilename) - strlen($end) - 1);


        switch ($mode){
            case 1:
                $filename = $id . "." . $end;
                break;
            case 2:
                $filename = $oldfilename;
                break;
            case 3:
                $filename = $id.$oldfilename;
                break;
            case 4:
                $filename = $id."_".$oldfilename;
                break;
            case 5:
                $filename = $id."-".$oldfilename;
                break;
            case 6:
                $filename = $id.".".$oldfilename;
                break;
            default:
                $filename = $id . "." . $end;
        }


        include "appdata/conf.php";

        if ($fil['error'] == 0 && move_uploaded_file($fil['tmp_name'], $folder . $filename)) {
            $response["name"] = $filename;
            $response["class"] = ($w > $h ? 'lanscape' : ($w == $h ? 'kvadradic' : 'protrat'));
            $response["height"] = $h;
            $response["width"] = $w;
        } else {
            $response["name"] = 0;
        }

        $id++;


    } else {
        $response[] = 0;
    }


    file_put_contents("appdata/fileid.txt", $id);
    echo json_encode($response);

}

