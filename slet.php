<?php
if (isset($_POST['filer'])) {
    include "appdata/conf.php";
    $filer = json_decode($_POST['filer']);
    foreach ($filer as $fil) {

        unlink($folder.$fil);
    }
}