<?php
/**
 * Created by Benjaco
 */
include "appdata/conf.php";

$filer = scandir(substr_replace($folder, "", -1));
unset($filer[0]);
unset($filer[1]);
unset($filer[2]);
rsort($filer, SORT_NUMERIC);

$filid = count($filer);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Finder</title>
<style>
* {
    padding: 0;
    margin: 0;
}

.clear {
    clear: both;
}

#toomenu {
    height: 130px;
}

#amlupload {
    background-color: #d7dad3;
    width: 260px;
    box-shadow: 1px 1px 12px 5px rgba(0, 0, 0, .5);
    border-bottom-right-radius: 15px;
    border-bottom-left-radius: 15px;
    margin: auto;

    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

}

#amlupload #amluploadoption {
    height: 0;
    /*80*/
    -webkit-transition: height .5s;
    -moz-transition: height .5s;
    -ms-transition: height .5s;
    -o-transition: height .5s;
    transition: height .5s;

    overflow-y: hidden;
}

#amlupload input {
    padding: 10px;
}

#amlupload button {
    margin: 5px auto 0 auto;
    display: block;
    width: 150px;

}

#amlupload #vis_aml_upload {
    box-shadow: inset 0 4px 10px -5px rgba(0, 0, 0, 1);
    background-color: #EEE;
    text-align: center;
    padding: 10px;
    border-bottom-right-radius: 15px;
    border-bottom-left-radius: 15px;
    font-family: verdana, helvetica, sans-serif;

}

#amlupload #options {
    height: 0px;
    /*50*/

    -webkit-transition: height .5s;
    -moz-transition: height .5s;
    -ms-transition: height .5s;
    -o-transition: height .5s;
    transition: height .5s;

    overflow-y: hidden;

}

#amlupload #options select {
    padding: 5px;
    width: 240px;
    margin: 10px;

}

#vis_aml_upload_open {
    float: left;
    width: 115px;
    text-align: center;
    margin-left: 40px;
}

#wrapper {

    margin: auto;
    width: 300px;
    position: relative;
}

#droparea {
    background-color: #00b0e8;
    border-radius: 100%;
    width: 256px;
    height: 256px;
    margin: auto;
    margin-top: 10px;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    padding: 22px;
    background-size: 90% 90%;
    background-repeat: no-repeat;
    background-position: center;
}

.klartilupload {
    background-image: url("img/upload.png");
}

.uploadhover {
    background-image: url("img/uploadhover.png");
}

.uploader {
    background-image: url("img/uploader.png");
}

.arebejder {
    background-image: url("img/vent.GIF");
}

.green {
    background-image: url("img/isuploaded.png");
    background-color: #7bcd12 !important;
}

#valg_click {
    height: 38px;
    width: 35px;
    position: absolute;
    top: 135px;
    left: -35px;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;

    cursor: pointer;
    display: none;

}

#slet_click {
    height: 38px;
    width: 35px;
    position: absolute;
    top: 135px;
    right: -35px;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;

    cursor: pointer;
    display: none;
}

#rotate_click {
    height: 38px;
    width: 35px;
    position: absolute;
    top: 32px;
    right: -8px;

    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    transform: rotate(-32deg);
    -ms-transform: rotate(-32deg);
    -webkit-transform: rotate(-32deg);

    cursor: pointer;
    display: none;
}

#resize_click {
    height: 38px;
    width: 35px;
    position: absolute;
    top: 76px;
    right: -29px;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;

    transform: rotate(-18deg);
    -ms-transform: rotate(-18deg);
    -webkit-transform: rotate(-18deg);

    cursor: pointer;
    display: none;

}

#slet {
    background-color: #CA1F1F;
    border-radius: 25px;
    height: 38px;
    width: 65px;
    position: absolute;
    top: 135px;
    right: 2px;
    /*right: -35px;*/
    z-index: -1;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    display: none;

}

#slet img, #resize img, #rotate img, #c_resize img, #color img {
    height: 27px;
    margin: 5px;
    float: right;
}

#vaelg {
    background-color: #7DCD12;
    border-radius: 25px;
    height: 38px;
    width: 65px;
    position: absolute;
    top: 135px;
    /*left: -35px;*/
    left: 2px;
    z-index: -1;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    display: none;

}

#resize {
    background-color: #0063e7;
    border-radius: 25px;
    height: 38px;
    width: 65px;
    position: absolute;
    top: 87px;
    right: 12px;
    /*top: 80px;
    right: -30px;*/
    z-index: -1;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    display: none;

    transform: rotate(-18deg);
    -ms-transform: rotate(-18deg);
    -webkit-transform: rotate(-18deg);

}

#rotate {
    background-color: #0063e7;
    border-radius: 25px;
    height: 38px;
    width: 65px;
    position: absolute;
    top: 65px;
    right: 29px;
    /* top: 40px;
    right: -10px; */
    z-index: -1;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    display: none;
    transform: rotate(-32deg);
    -ms-transform: rotate(-32deg);
    -webkit-transform: rotate(-32deg);

}

#vaelg img {
    height: 27px;
    margin: 5px;
}

#liste {
    z-index: -1;
    background-color: #d7dad3;
    position: absolute;
    top: 200px;
    left: 20px;
    width: 260px;
    padding-top: 165px;
    border-radius: 15px;
    box-shadow: 1px 1px 12px 5px rgba(0, 0, 0, .5);
    margin-bottom: 100px;
}

#check {
    position: absolute;
    left: 30px;
    top: 330px;
}

.listitem {
    position: relative;
    padding: 10px;
    border-bottom: 1px solid #B4B4B4;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

}

.selected {
    background-color: #00b0e8;
}

.navn {
    font-size: 16px;
    font-family: verdana, helvetica, sans-serif;

}

.size {
    font-weight: bold;
    font-size: 8px;
}

.image {
    background-color: #595959;
    transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    -webkit-transform: rotate(10deg);
    position: absolute;
    top: 0px;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    right: 0;

    border: 2px #666 solid;

}

.image.protrat {
    height: 45px;
    width: auto;

}

.image.kvadradic {
    height: 40px;
    width: 40px;
}

.image.lanscape {
    height: auto;
    width: 45px;
}

.image:hover {
    transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    right: 10px;
    z-index: 20000;

    top: 0;

}

.image.protrat:hover {
    height: 220px;
    width: auto;
    /*bottom: -125px;*/

}

.image.lanscape:hover {
    height: auto;
    width: 220px;
    /*bottom: -75px;*/

}

.image.kvadradic:hover {
    height: 200px;
    width: 200px;
    bottom: -115px;

}

.image:hover img {
    top: 2%;
    left: 2%;
    height: 96%;
    width: 97%;
}

.new {
    background: #7bcd12 !important;

}

#er_du_sikker_paa_at_du_vil_slette_denne_fil {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, .75);

    display: none;
    opacity: 0;

    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    z-index: 100;
}

#er_du_sikker_paa_at_du_vil_slette_denne_fil_inner {
    background-color: #dedede;
    width: 100%;
    margin-top: 100px;
    padding-bottom: 10px;
}

#er_du_sikker_paa_at_du_vil_slette_denne_fil_title {
    text-align: center;
    font-family: verdana, helvetica, sans-serif;
    color: #222;
    padding-top: 10px;
}

#er_du_sikker_paa_at_du_vil_slette_denne_fil_valg {
    margin-top: 10px;
    height: 65px;
}

#er_du_sikker_paa_at_du_vil_slette_denne_fil_valg_inner {
    width: 256px;
    margin: auto;
    height: 100%;
    margin-bottom: 10px;
}

#er_du_sikker_paa_at_du_vil_slette_denne_fil_anuler {
    height: 65px;
    width: 65px;
    background-image: url("img/delete.png");
    background-size: 80% 80%;
    background-color: #CA1F1F;
    background-position: center;

    border-radius: 40px;
    float: left;
    cursor: pointer;
}

#er_du_sikker_paa_at_du_vil_slette_denne_fil_ok {
    height: 65px;
    width: 65px;
    background-image: url("img/isuploaded.png");
    background-size: 80% 80%;
    background-color: #7bcd12;
    background-position: center;

    border-radius: 40px;
    float: right;
    cursor: pointer;

}

#resize_option {
    position: absolute;
    top: 70px;
    left: 80px;
    background-color: #d7dad3;
    height: 160px;
    width: 140px;
    border-radius: 35px;
    display: none;
    box-shadow: 2px 2px 10px #000;

    opacity: 0;

    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

}

#resize_option_luk {
    height: 40px;
    border-top-left-radius: 35px;
    border-top-right-radius: 35px;
    cursor: pointer;
    background-image: url("img/delete.png");
    background-size: 18% 60%;
    background-color: #CA1F1F;
    background-position: center;
    background-repeat: no-repeat;
}

#resize_option_size {
    height: 79px;
    padding-top: 2px;
}

#resize_option_size input {
    padding: 5px;
    border: 1px #AAA solid;
    margin: 5px;
    width: 118px;
}

#resize_option_ok {
    height: 40px;
    border-bottom-left-radius: 35px;
    border-bottom-right-radius: 35px;
    cursor: pointer;
    background-image: url("img/isuploaded.png");
    background-size: 18% 60%;
    background-color: #7bcd12;
    background-position: center;
    background-repeat: no-repeat;

}

#rotate_options {
    position: absolute;
    top: 70px;
    left: 80px;
    background-color: #d7dad3;
    height: 160px;
    width: 140px;
    border-bottom-left-radius: 100px;
    border-bottom-right-radius: 100px;
    display: none;
    box-shadow: 2px 2px 10px #000;

    opacity: 0;

    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

}

#rotate_option_luk {
    height: 40px;
    cursor: pointer;
    background-image: url("img/delete.png");
    background-size: 18% 60%;
    background-color: #CA1F1F;
    background-position: center;
    background-repeat: no-repeat;
}

#rotate_option_venstre, #rotate_option_hojre {
    background-color: #00b0e8;
    height: 60px;
    width: 70px;
    float: left;
    box-shadow: inset 0 0 30px rgba(255, 255, 255, .5);
    cursor: pointer;
}

#rotate_option_halvomgang {
    background-color: #00b0e8;
    height: 60px;
    width: 140px;
    clear: both;
    box-shadow: inset 0 0 30px rgba(255, 255, 255, .5);
    border-bottom-left-radius: 100px;
    border-bottom-right-radius: 100px;
    cursor: pointer;
}

#rotate_options .flip {
    background-color: #00b0e8;
    height: 40px;
    width: 70px;
    float: left;
    box-shadow: inset 0 0 30px rgba(255, 255, 255, .5);
    cursor: pointer;

}

#rotate_options .flip img {
    margin: 5px 0 0 25px;
}

#rotate_option_venstre img, #rotate_option_hojre img {
    width: 20px;
    height: 40px;
    margin-top: 10px;
    margin-left: 25px;
}

#rotate_option_halvomgang img {
    width: 40px;
    height: 20px;
    margin-top: 20px;
    margin-left: 50px;

}

#c_resize {
    background-color: #00B0E8;
    border-radius: 25px;
    width: 38px;
    height: 38px;
    position: absolute;
    top: 55px;
    right: -50px;
    z-index: 2;

    display: none;
    opacity: 0;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    cursor: pointer;
}

#c_resize span {
    display: block;
    margin-top: 4px;
    margin-left: 9px;
}

#custum_crop {
    position: absolute;
    top: 70px;
    left: -30px;
    background-color: #d7dad3;
    width: 360px;

    display: none;
    box-shadow: 2px 2px 10px #000;

    opacity: 0;

    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    z-index: 10;

    border-radius: 15px;

}

#custum_crop_size {
    margin: 5px;
}

#custum_crop_height {
    width: 165px;
    float: left;
}

#custum_crop_width {
    width: 165px;
    float: right;
}

#custum_crop_size p {
    font-family: verdana, helvetica, sans-serif;
    font-weight: bold;
    font-size: 12px;

    margin-bottom: 10px;
}

#custum_crop_luk {
    height: 25px;
    cursor: pointer;
    background-color: #CA1F1F;
    padding-top: 10px;

    border-top-left-radius: 15px;
    border-top-right-radius: 15px;

    text-align: center;

}

#custum_crop_image {
    width: 350px;
    margin: 5px;
    background-size: 100% 100%;

    position: relative;
}

#custum_crop_resizer {
    background-color: rgba(255, 255, 255, .3);
    height: 100px;
    width: 100px;
    position: absolute;
    cursor: move;
    left: 0px;
    right: 0px;

}

#custum_crop_resizer_hivimig {
    height: 10px;
    width: 10px;
    background-color: #EEEEEE;
    border-radius: 10px;
    cursor: se-resize;
    position: absolute;
    top: 95px;
    left: 95px;
}

#custum_crop_ok {
    height: 25px;
    cursor: pointer;
    padding-top: 10px;

    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;

    text-align: center;
    background-color: #7bcd12;

}

#custum_crop_resizer_last_size {
    background-color: rgba(0, 0, 0, .5);

    height: 100px;
    width: 100px;

    display: none;
}

#custum_crop_new_size {
    margin: 5px;
}

#custum_crop_new_size_height {
    width: 170px;
    margin-right: 10px;
}

#custum_crop_new_size_height {
    width: 170px;
}

#custum_crop_luk img, #custum_crop_ok img, #coloroptions_luk img, #coloroptions_ok img {
    height: 20px;
    display: block;
    margin: 0 auto;
}

#color_click {
    height: 38px;
    width: 35px;
    position: absolute;
    top: 1px;
    right: 29px;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;

    transform: rotate(-43deg);
    -ms-transform: rotate(-43deg);
    -webkit-transform: rotate(-43deg);

    cursor: pointer;
    display: none;

}

#color {
    background-color: #0063E7;
    border-radius: 25px;
    width: 65px;
    height: 38px;
    position: absolute;
    /*
        top: 9px;
        right: 23px;
    */
    top: 42px;
    right: 58px;
    z-index: -1;

    display: none;

    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    transform: rotate(-43deg);
    -ms-transform: rotate(-43deg);
    -webkit-transform: rotate(-43deg);

}

#coloroptions {
    position: absolute;
    top: 70px;
    left: -30px;
    background-color: #d7dad3;
    width: 360px;

    opacity: 0;
    display: none;

    box-shadow: 2px 2px 10px #000;

    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -ms-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;

    z-index: 10;

    border-radius: 15px;
}

#coloroptions_luk {
    height: 25px;
    cursor: pointer;
    background-color: #CA1F1F;
    padding-top: 10px;

    border-top-left-radius: 15px;
    border-top-right-radius: 15px;

    text-align: center;
}

#coloroptions_ok {
    height: 25px;
    cursor: pointer;
    padding-top: 10px;

    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;

    text-align: center;
    background-color: #7bcd12;
}

#coloroptions_adjust {
    margin: 5px;
    font-family: verdana, helvetica, sans-serif;
    color: #333333;
}

#coloroptions_adjust_sliders > div {
    margin: 10px 0;
}

#coloroptions_adjust img {
    width: 100%;
}

#coloroptions_opdata {
    float: right;
    font-size: 12px;
    font-weight: bold;

    cursor: pointer;
}

#coloroptions_nulstil {
    float: right;
    font-size: 12px;
    font-weight: bold;
    margin-right: 20px;
    cursor: pointer;
}

#coloroptions_finjust {
    font-size: 12px;
    font-weight: bold;
    cursor: pointer;
}

#coloroptions_grovjust {
    font-size: 12px;
    font-weight: bold;
    cursor: pointer;
}

#coloroptions_finjust.active, #coloroptions_grovjust.active {
    border-bottom: 1px solid #333333;
}

#coloroptions_adjust input[type=range] {
    display: block;
    width: 100%;
}

input[type="range"] {
    margin-top: 5px;
    -webkit-appearance: none;
    background-color: #4f4f4f;
    height: 2px;

    outline: none;
}

input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    position: relative;
    top: 0;
    z-index: 1;
    width: 25px;
    height: 7px;
    cursor: pointer;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.3);
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.3);
    background-color: #484848;
}

#download {
    display: none;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    padding-top: 15px;
    padding-bottom: 15px;
    background-color: #EEEEEE;
    border-top: 2px solid #AAA;
    z-index: 100000;
    text-align: center;
    font-weight: bold;
    font-size: 24px;
    font-family: verdana, helvetica, sans-serif;
}

#download a {
    color: #333333;
    text-decoration: none;
}


</style>
<script>
var folder = "<?php echo $folder; ?>";
var filid = <?php echo $filid; ?>;
var knapper = {
    "valg": <?php echo ( isset($_GET['valg']) ? "false" : "true") ?>,
    "slet": <?php echo ( isset($_GET['slet']) ? "false" : "true") ?>,
    "resize": <?php echo ( isset($_GET['resize']) ? "false" : "true") ?>,
    "cresize": <?php echo ( isset($_GET['cresize']) ? "false" : "true") ?>,
    "flip": <?php echo ( isset($_GET['flip']) ? "false" : "true") ?>,
    "color": <?php echo ( isset($_GET['farve']) ? "false" : "true") ?>
};

var amluploadsynlig = false;
var optionssynlig = false;
var custum_crop_prev_parm = {"active": false, "width": 0, "height": 0};
var filenamemode = 1;
window.onload = function () {

    var uploadbox = document.getElementById("droparea");

    uploadbox.addEventListener("drop", drop, false);
    uploadbox.addEventListener("dragenter", dragEnter, false);
    uploadbox.addEventListener("dragexit", dragExit, false);
    uploadbox.addEventListener("dragover", dragOver, false);
    uploadbox.addEventListener("dragleave", dragLeave, false);

    setEventsOnImageForClick();

    document.getElementById("slet_click").onclick = function () {
        document.getElementById("er_du_sikker_paa_at_du_vil_slette_denne_fil").style.display = "block";
        setTimeout(function () {
            document.getElementById("er_du_sikker_paa_at_du_vil_slette_denne_fil").style.opacity = "1";
        }, 1)

    };
    document.getElementById("er_du_sikker_paa_at_du_vil_slette_denne_fil_anuler").onclick = skjulErDuSikkerPaaAtDuVilSletteBoksen;
    document.getElementById("er_du_sikker_paa_at_du_vil_slette_denne_fil_ok").onclick = function () {
        skjulErDuSikkerPaaAtDuVilSletteBoksen();
        var filer_der_skal_slettes = document.querySelectorAll(".selected");
        var urls = [];
        for (var y = 0; y < filer_der_skal_slettes.length; y++) {
            urls.push(filer_der_skal_slettes[y].dataset.url);
            filer_der_skal_slettes[y].remove();
        }
        var filer = JSON.stringify(urls);
        var xmlSletRequest = new XMLHttpRequest();
        xmlSletRequest.open("POST", "slet.php", true);
        xmlSletRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlSletRequest.send("filer=" + filer);

        updateFunctionsKnapper()
    };


    document.getElementById("valg_click").onclick = function () {
        window.opener.setValue(document.querySelector(".selected").dataset.url);
        window.close();
    };

    document.getElementById("filenameoption").onchange = function (){
        filenamemode = this.value;
        optionssynlig = false;
        document.getElementById("options").style.height = "0px"

    };


    document.getElementById("amluploadknap").onclick = function () {
        var fileInput = document.getElementById('amlselcfiler');

        var filer = [];

        for (var i = 0; i < fileInput.files.length; i++) {
            filer.push(fileInput.files[i]);
        }

        var antal = filer.length;
        if (antal != 0) {
            skjulFunctionsEtiketter();
            setTimeout(function () {
                upload(filer, antal, 0);
            }, 500)

        }

        fileInput.value = null;

        amluploadsynlig = false;
        document.getElementById("amluploadoption").style.height = "0px"
    };

    document.getElementById("vis_aml_upload_open").onclick = function () {
        if (amluploadsynlig) {
            amluploadsynlig = false;
            document.getElementById("amluploadoption").style.height = "0px"
        } else {
            optionssynlig = false;
            document.getElementById("options").style.height = "0px";

            amluploadsynlig = true;
            document.getElementById("amluploadoption").style.height = "80px"
        }
    };
    document.getElementById("vis_aml_upload_options").onclick = function () {
        if (optionssynlig) {
            optionssynlig = false;
            document.getElementById("options").style.height = "0px"
        } else {
            amluploadsynlig = false;
            document.getElementById("options").style.height = "50px";

            optionssynlig = true;
            document.getElementById("amluploadoption").style.height = "0px"

        }
    };
    document.getElementById('resize_click').onclick = function () {
        skjulFunctionsEtiketter();
        document.getElementById("resize_option").style.display = "block";
        setTimeout(function () {
            document.getElementById("resize_option").style.opacity = "1";

        }, 1)

    };
    document.getElementById('resize_option_luk').onclick = function () {
        visFunctionsEtiketter();
        document.getElementById("resize_option").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("resize_option").style.display = "none";

        }, 500)
    };
    document.getElementById("resize_option_ok").onclick = function () {
        visFunctionsEtiketter();
        var new_height = document.getElementById("resize_option_height").value;
        var new_width = document.getElementById("resize_option_width").value;

        if (isNaN(new_height) || isNaN(new_width)) {
            if (isNaN(new_height)) {
                document.getElementById("resize_option_height").value = "";
            } else {
                document.getElementById("resize_option_width").value = "";
            }
        } else {
            document.getElementById("resize_option_height").value = "";
            document.getElementById("resize_option_width").value = "";

            new_height = parseInt(new_height);
            new_width = parseInt(new_width);

            var filer_der_skal_resizes = document.querySelectorAll(".selected");
            var urls = [];
            for (var y = 0; y < filer_der_skal_resizes.length; y++) {
                urls.push(filer_der_skal_resizes[y].dataset.url);

            }
            var ialt = urls.length;


            document.getElementById("resize_option").style.opacity = "0";
            setTimeout(function () {
                document.getElementById("resize_option").style.display = "none";

            }, 1);
            skjulFunctionsEtiketter();

            setTimeout(function () {
                var percentComplete = 0;
                var heightWidth = Math.round(percentComplete * 256);
                uploadbox.style.height = heightWidth + "px";
                uploadbox.style.width = heightWidth + "px";
                resize(urls, new_width, new_height, 0, ialt);
                uploadbox.style.marginTop = (128 - (heightWidth / 2)) + 10 + "px";

            }, 500)

        }
    };
    document.getElementById('rotate_option_luk').onclick = function () {
        visFunctionsEtiketter();
        document.getElementById("rotate_options").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("rotate_options").style.display = "none";

        }, 500)
    };
    document.getElementById('rotate_click').onclick = function () {
        skjulFunctionsEtiketter();
        document.getElementById("rotate_options").style.display = "block";
        setTimeout(function () {
            document.getElementById("rotate_options").style.opacity = "1";

        }, 1)

    };
    document.getElementById('rotate_option_hojre').onclick = function () {
        rotateFlipImagePrepare(3);
    };
    document.getElementById('rotate_option_venstre').onclick = function () {
        rotateFlipImagePrepare(1);
    };
    document.getElementById('rotate_option_halvomgang').onclick = function () {
        rotateFlipImagePrepare(2);
    };
    document.getElementById('rotate_option_flip_h').onclick = function () {
        rotateFlipImagePrepare(5);
    };
    document.getElementById('rotate_option_flip_v').onclick = function () {
        rotateFlipImagePrepare(4);
    };


    document.getElementById("c_resize").onclick = function () {
        if (document.querySelectorAll(".selected").length == 1) {
            skjulFunctionsEtiketter();
            document.getElementById("custum_crop").style.display = "block";
            setTimeout(function () {
                document.getElementById("custum_crop").style.opacity = "1";

            }, 1);


            var img_name = document.querySelector(".selected").dataset.url;
            cc_image = img_name;
            var img_height = parseInt(document.querySelector(".selected .height").innerHTML);
            var img_width = parseInt(document.querySelector(".selected .width").innerHTML);
            var aspect = img_height / img_width;
            var aspect2 = img_width / img_height;

            document.getElementById("custum_crop_new_size_checkbox").checked = false;
            document.getElementById("custum_crop_resizer_last_size").style.display = "none";

            document.getElementById("custum_crop_new_size_height").value = img_height;
            document.getElementById("custum_crop_new_size_width").value = img_width;

            document.getElementById('custum_crop_image').style.backgroundImage = 'url("' + folder + img_name + '")';
            document.getElementById('custum_crop_image').style.height = (350 * aspect) + "px";

            drag_bg_image.h = (350 * aspect);

            document.getElementById('custum_crop_resizer').style.height = ((350 * aspect) - 20) + 'px';
            document.getElementById('custum_crop_resizer').style.width = '330px';
            document.getElementById('custum_crop_resizer').style.top = '10px';
            document.getElementById('custum_crop_resizer').style.left = '10px';

            set_hiv_i_mig();


        }


    };
    document.getElementById("custum_crop_new_size_checkbox").onclick = function () {
        custum_crop_prev_parm.active = document.getElementById("custum_crop_new_size_checkbox").checked;
        if (custum_crop_prev_parm.active) {
            custum_crop_prev_parm.width = parseInt(document.getElementById("custum_crop_new_size_width").value);
            custum_crop_prev_parm.height = parseInt(document.getElementById("custum_crop_new_size_height").value);

            document.getElementById("custum_crop_new_size_width").disabled = false;
            document.getElementById("custum_crop_new_size_height").disabled = false;

            document.getElementById("custum_crop_resizer_last_size").style.display = "block";


            set_new_size_preview();
        } else {
            document.getElementById("custum_crop_resizer_last_size").style.display = "none";
            document.getElementById("custum_crop_new_size_width").disabled = true;
            document.getElementById("custum_crop_new_size_height").disabled = true;

        }
    };
    document.getElementById("custum_crop_new_size_width").onchange = function () {
        custum_crop_prev_parm.width = parseInt(document.getElementById("custum_crop_new_size_width").value);
        set_new_size_preview();
    };

    document.getElementById("custum_crop_new_size_height").onchange = function () {
        custum_crop_prev_parm.height = parseInt(document.getElementById("custum_crop_new_size_height").value);
        set_new_size_preview();
    };
    document.getElementById("custum_crop_new_size_width").onkeyup = function () {
        custum_crop_prev_parm.width = parseInt(document.getElementById("custum_crop_new_size_width").value);
        set_new_size_preview();
    };
    document.getElementById("custum_crop_new_size_height").onkeyup = function () {
        custum_crop_prev_parm.height = parseInt(document.getElementById("custum_crop_new_size_height").value);
        set_new_size_preview();
    };

    document.getElementById("custum_crop_luk").onclick = function () {
        visFunctionsEtiketter();
        document.getElementById("custum_crop").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("custum_crop").style.display = "none";

        }, 500)

    };
    document.getElementById("custum_crop_ok").onclick = function () {
        document.getElementById("custum_crop").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("custum_crop").style.display = "none";

        }, 500);
        var full_width = drag_bg_image.w,
            full_height = drag_bg_image.h,
            resized_width = document.getElementById("custum_crop_resizer").offsetWidth,
            resized_height = document.getElementById("custum_crop_resizer").offsetHeight,
            x = document.getElementById("custum_crop_resizer").offsetLeft,
            y = document.getElementById("custum_crop_resizer").offsetTop,
            fast_ny_maal = (custum_crop_prev_parm.active ? 1 : 0),
            ny_width = custum_crop_prev_parm.width,
            ny_height = custum_crop_prev_parm.height,
            image = cc_image;

        skjulFunctionsEtiketter();

        var uploadbox = document.getElementById("droparea");
        uploadbox.className = "arebejder";


        var xmlCustumCropRequest = new XMLHttpRequest();
        xmlCustumCropRequest.open("POST", "customresize.php", true);
        xmlCustumCropRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlCustumCropRequest.send("img=" + image +
            "&full_width=" + full_width +
            "&full_Height=" + full_height +
            "&resized_width=" + resized_width +
            "&resized_height=" + resized_height +
            "&start_x=" + x +
            "&start_y=" + y +
            "&fastemaal=" + fast_ny_maal +
            "&ny_width=" + ny_width +
            "&ny_height=" + ny_height
        );

        xmlCustumCropRequest.onreadystatechange = function () {
            if (xmlCustumCropRequest.readyState == 4 && xmlCustumCropRequest.status == 200) {
                var tilbage = JSON.parse(xmlCustumCropRequest.responseText);
                updataImage(image);
                var selectImage = '[data-url="' + image + '"] .image';
                document.querySelector(selectImage).className = "image " + tilbage.class;
                var selectW = '[data-url="' + image + '"] .width';
                var selectH = '[data-url="' + image + '"] .height';

                document.querySelector(selectW).innerHTML = tilbage.width;
                document.querySelector(selectH).innerHTML = tilbage.height;

                visFunctionsEtiketter();
                uploadbox.className = "klartilupload green";
                setTimeout(function () {
                    uploadbox.className = "klartilupload";
                }, 500);
            }
        }
    };


    document.getElementById("custum_crop_resizer").addEventListener("dragstart", f_dragstart);
    document.getElementById("custum_crop_resizer").addEventListener("drag", f_dragmove);

    document.getElementById("custum_crop_resizer_hivimig").addEventListener("dragstart", r_dragstart);
    document.getElementById("custum_crop_resizer_hivimig").addEventListener("drag", r_dragmove)


    document.getElementById("color_click").onclick = function () {
        skjulFunctionsEtiketter();
        document.getElementById("coloroptions").style.display = "block";

        document.getElementById("coloroptions_grayscale").checked = false;
        document.getElementById("coloroptions_brightness").value = 0;
        document.getElementById("coloroptions_contrast").value = 0;


        setTimeout(function () {
            document.getElementById("coloroptions").style.opacity = "1";

        }, 1);
        var selectedurlcolor = document.querySelector(".selected").dataset.url;
        document.getElementById("coloroptions_img").src = folder + selectedurlcolor;

    };
    document.getElementById("coloroptions_luk").onclick = function () {
        visFunctionsEtiketter();
        document.getElementById("coloroptions").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("coloroptions").style.display = "none";

        }, 500)

    };
    document.getElementById("coloroptions_opdata").onclick = function () {
        color_image_preview();
    };
    document.getElementById("coloroptions_nulstil").onclick = function () {
        document.getElementById("coloroptions_grayscale").checked = false;
        document.getElementById("coloroptions_brightness").value = 0;
        document.getElementById("coloroptions_contrast").value = 0;
        color_image_preview();
    };
    document.getElementById("coloroptions_ok").onclick = function () {
        document.getElementById("coloroptions").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("coloroptions").style.display = "none";

        }, 500);

        var uploadbox = document.getElementById("droparea");
        uploadbox.className = "arebejder";


        var selectedurlcolor = document.querySelector(".selected").dataset.url;
        var ss = (document.getElementById("coloroptions_grayscale").checked ? 1 : 0);
        var lys = document.getElementById("coloroptions_brightness").value;
        var kontrast = document.getElementById("coloroptions_contrast").value;


        var xmlCustumColorRequest = new XMLHttpRequest();
        xmlCustumColorRequest.open("POST", "coloreidting.php", true);
        xmlCustumColorRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlCustumColorRequest.send("fil=" + selectedurlcolor +
            "&ss=" + ss +
            "&b=" + lys +
            "&k=" + kontrast
        );

        xmlCustumColorRequest.onreadystatechange = function () {
            if (xmlCustumColorRequest.readyState == 4 && xmlCustumColorRequest.status == 200) {
                updataImage(selectedurlcolor);

                visFunctionsEtiketter();
                uploadbox.className = "klartilupload green";
                setTimeout(function () {
                    uploadbox.className = "klartilupload";
                }, 500);
            }
        }

    };

    document.getElementById("coloroptions_finjust").onclick = function () {
        document.getElementById("coloroptions_brightness").value = 0;
        document.getElementById("coloroptions_contrast").value = 0;

        document.getElementById("coloroptions_brightness").setAttribute("max", 100);
        document.getElementById("coloroptions_brightness").setAttribute("min", -100);
        document.getElementById("coloroptions_contrast").setAttribute("max", 100);
        document.getElementById("coloroptions_contrast").setAttribute("min", -100);

        this.className = "active";
        document.getElementById("coloroptions_grovjust").className = "";

    };
    document.getElementById("coloroptions_grovjust").onclick = function () {
        document.getElementById("coloroptions_brightness").value = 0;
        document.getElementById("coloroptions_contrast").value = 0;

        document.getElementById("coloroptions_brightness").setAttribute("max", 255);
        document.getElementById("coloroptions_brightness").setAttribute("min", -255);
        document.getElementById("coloroptions_contrast").setAttribute("max", 255);
        document.getElementById("coloroptions_contrast").setAttribute("min", -255);

        this.className = "active";
        document.getElementById("coloroptions_finjust").className = "";

    };


    document.getElementById("checkall").onclick = function () {
        var elements = document.querySelectorAll(".listitem");
        for (var i = 0; i < elements.length; i++) {
            var o = elements[i];
            o.dataset.selected = "1";
            o.classList.add("selected");
        }
        updateFunctionsKnapper();
    };
    document.getElementById("checknone").onclick = function () {
        var elements = document.querySelectorAll(".listitem");
        for (var i = 0; i < elements.length; i++) {
            var o = elements[i];
            o.dataset.selected = "0";
            o.classList.remove("selected");
        }
        updateFunctionsKnapper();
    };
    document.onselectstart = function () {
        return false;
    }

};
function color_image_preview() {
    var selectedurlcolor = document.querySelector(".selected").dataset.url;
    var ss = (document.getElementById("coloroptions_grayscale").checked ? 1 : 0);
    var lys = document.getElementById("coloroptions_brightness").value;
    var kontrast = document.getElementById("coloroptions_contrast").value;

    document.getElementById("coloroptions_img").src = "colorpreview.php?ss=" + ss + "&k=" + kontrast + "&b=" + lys + "&fil=" + selectedurlcolor;


}
function rotateFlipImagePrepare(type) {

    document.getElementById("rotate_options").style.opacity = "0";
    setTimeout(function () {
        document.getElementById("rotate_options").style.display = "none";

    }, 500);

    var filer_der_skal_resizes = document.querySelectorAll(".selected");
    var urls = [];
    for (var y = 0; y < filer_der_skal_resizes.length; y++) {
        urls.push(filer_der_skal_resizes[y].dataset.url);

    }
    var ialt = urls.length;
    var uploadbox = document.getElementById("droparea");
    uploadbox.className = "arebejder";
    var percentComplete = 0;
    var heightWidth = Math.round(percentComplete * 256);
    uploadbox.style.height = heightWidth + "px";
    uploadbox.style.width = heightWidth + "px";
    uploadbox.style.marginTop = (128 - (heightWidth / 2)) + 10 + "px";

    rotataFlipImage(urls, type, 0, ialt);
}
function rotataFlipImage(url, type, antal, antalialt) {
    var this_url = url[0];

    var newurllist = [];
    for (var i = 1; i < url.length; i++) {
        newurllist.push(url[i])
    }
    var uploadbox = document.getElementById("droparea");


    var xmlRotateRequest = new XMLHttpRequest();
    xmlRotateRequest.open("POST", "rotateflip.php", true);
    xmlRotateRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlRotateRequest.send("fil=" + this_url + "&vej=" + type);

    xmlRotateRequest.onreadystatechange = function () {
        if (xmlRotateRequest.readyState == 4 && xmlRotateRequest.status == 200) {
            var selectW = '[data-url="' + this_url + '"] .width';
            var selectH = '[data-url="' + this_url + '"] .height';
            var selectImage = '[data-url="' + this_url + '"] .image';


            var height = document.querySelector(selectH).innerHTML;
            var width = document.querySelector(selectW).innerHTML;
            document.querySelector(selectW).innerHTML = height;
            document.querySelector(selectH).innerHTML = width;
            document.querySelector(selectImage).className = "image " + xmlRotateRequest.responseText;
            updataImage(this_url);

            antal = antal + 1;

            var percentComplete = (antal / antalialt);

            var heightWidth = Math.round(percentComplete * 256);
            uploadbox.style.height = heightWidth + "px";
            uploadbox.style.width = heightWidth + "px";

            uploadbox.style.marginTop = (128 - (heightWidth / 2)) + 10 + "px";


            if (antal != antalialt) {
                rotataFlipImage(newurllist, type, antal, antalialt);
            } else {
                visFunctionsEtiketter();
                uploadbox.className = "klartilupload green";
                setTimeout(function () {
                    uploadbox.className = "klartilupload";
                }, 500);

            }
        }
    }

}

function updataImage(imageName) {
    var selectImagesImg = '[data-url="' + imageName + '"] .image';
    document.querySelector(selectImagesImg).src = folder + imageName + "?" + +new Date().getTime();

}
var isInFunction = false;
function skjulFunctionsEtiketter() {
    isInFunction = true;
    document.getElementById("vaelg").style.opacity = "0";
    document.getElementById("slet").style.opacity = "0";
    document.getElementById("rotate").style.opacity = "0";
    document.getElementById("resize").style.opacity = "0";
    document.getElementById("c_resize").style.opacity = "0";
    document.getElementById("color").style.opacity = "0";
}
function visFunctionsEtiketter() {
    isInFunction = false;
    document.getElementById("vaelg").style.opacity = "1";
    document.getElementById("slet").style.opacity = "1";
    document.getElementById("rotate").style.opacity = "1";
    document.getElementById("resize").style.opacity = "1";
    document.getElementById("c_resize").style.opacity = "1";
    document.getElementById("color").style.opacity = "1";
}
function resize(url, width, height, antal, antalialt) {
    var uploadbox = document.getElementById("droparea");
    uploadbox.className = "arebejder";

    var this_url = url[0];

    var newurllist = [];
    for (var i = 1; i < url.length; i++) {
        newurllist.push(url[i])
    }

    var xmlSletRequest = new XMLHttpRequest();
    xmlSletRequest.open("POST", "resize.php", true);
    xmlSletRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlSletRequest.send("fil=" + this_url + "&width=" + width + "&height=" + height);

    xmlSletRequest.onreadystatechange = function () {
        if (xmlSletRequest.readyState == 4 && xmlSletRequest.status == 200) {
            var selectW = '[data-url="' + this_url + '"] .width';
            var selectH = '[data-url="' + this_url + '"] .height';
            var selectImage = '[data-url="' + this_url + '"] .image';
            console.log(selectH);
            console.log(selectW);
            document.querySelector(selectH).innerHTML = height;
            document.querySelector(selectW).innerHTML = width;
            document.querySelector(selectImage).className = "image " + xmlSletRequest.responseText;
            updataImage(this_url);

            antal = antal + 1;

            var percentComplete = (antal / antalialt);

            var heightWidth = Math.round(percentComplete * 256);
            uploadbox.style.height = heightWidth + "px";
            uploadbox.style.width = heightWidth + "px";

            uploadbox.style.marginTop = (128 - (heightWidth / 2)) + 10 + "px";


            if (antal != antalialt) {
                resize(newurllist, width, height, antal, antalialt);
            } else {
                visFunctionsEtiketter();
                uploadbox.className = "klartilupload green";
                setTimeout(function () {
                    uploadbox.className = "klartilupload";
                }, 500);

            }
        }
    }


}
function dragEnter(e) {
    document.getElementById("droparea").className = "uploadhover";

    e.stopPropagation();
    e.preventDefault();


}
function dragExit(e) {
    e.stopPropagation();
    e.preventDefault();

}
function dragOver(e) {
    e.stopPropagation();
    e.preventDefault();

}
function dragLeave(e) {
    document.getElementById("droparea").className = "klartilupload";

    e.stopPropagation();
    e.preventDefault();

}
function drop(e) {
    e.stopPropagation();
    e.preventDefault();


    /** @namespace e.dataTransfer */
    var filer = e.target.files || e.dataTransfer.files;


    var antal = filer.length;
    skjulFunctionsEtiketter();
    upload(filer, antal, 0);


}
function upload(files, antal, antaluploaded) {
    console.log(antaluploaded + "-" + antal);
    var uploadbox = document.getElementById("droparea");
    uploadbox.className = "uploader";

    console.log(files);

    var formobject = new FormData();
    formobject.append('file[]', files[0]);

    var oldfilelist = files;
    files = [];
    for (var i = 1; i < oldfilelist.length; i++) {
        files.push(oldfilelist[i])
    }


    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php?fm='+filenamemode, true);

    xhr.upload.onprogress = function (e) {
        /** @namespace e.lengthComputable */
        if (e.lengthComputable) {
            var percentComplete = (e.loaded / e.total) * ((antaluploaded + 1) / antal);

            console.log("a" + percentComplete);
            console.log("b" + e.loaded / e.total);
            console.log("c" + (antaluploaded / antal));
            console.log("e" + ( antal));
            console.log("f" + (antaluploaded));

            var heightWidth = Math.round(percentComplete * 256);
            uploadbox.style.height = heightWidth + "px";
            uploadbox.style.width = heightWidth + "px";

            uploadbox.style.marginTop = (128 - (heightWidth / 2)) + 10 + "px";


        }
    };

    xhr.onload = function () {
        if (this.status == 200) {
            if (files.length == 0) {
                uploadbox.className = "klartilupload green";
                uploadbox.style.height = "256px";
                uploadbox.style.width = "256px";

                uploadbox.style.marginTop = "10px";

                visFunctionsEtiketter();

                setTimeout(function () {
                    uploadbox.className = "klartilupload";
                }, 500);
            }


            console.log(this.response);

            var resp = JSON.parse(this.response);
            var filename = resp.name;


            var element = document.createElement("div");
            var name_element = document.createElement("div");
            element.className = "listitem new";
            name_element.className = "navn";
            if (filename == 0) {
                name_element.innerHTML = "Filen blev ikke uploaded";
                element.appendChild(name_element);
            } else {
                filid++;
                name_element.innerHTML = filename + " ";
                element.dataset.url = filename;
                element.dataset.selected = 0;
                element.dataset.id = filid;

                var sizespan = document.createElement("span");
                sizespan.className = "size";
                var heightspan = document.createElement("span");
                var widthspan = document.createElement("span");
                var x = document.createTextNode("x");
                heightspan.className = "height";
                widthspan.className = "width";
                heightspan.innerHTML = resp.height;
                widthspan.innerHTML = resp.width;
                sizespan.appendChild(widthspan);
                sizespan.appendChild(x);
                sizespan.appendChild(heightspan);
                name_element.appendChild(sizespan);


                var image_element = document.createElement("img");
                image_element.className = "image " + resp.class;
                image_element.src = folder + filename;

                element.appendChild(name_element);
                element.appendChild(image_element);
            }
            document.getElementById('liste').insertBefore(element, document.getElementById('liste').firstChild);

            setEventsOnImageForClick();


            setTimeout(function () {
                var new_elements = document.querySelectorAll(".new");
                for (var h = 0; h < new_elements.length; h++) {
                    new_elements[h].className = "listitem";
                }


                if (files.length != 0) {
                    antaluploaded = antaluploaded + 1;
                    upload(files, antal, antaluploaded);
                }

            }, 500);


        }
    };

    xhr.send(formobject);

}
function skjulErDuSikkerPaaAtDuVilSletteBoksen() {
    document.getElementById("er_du_sikker_paa_at_du_vil_slette_denne_fil").style.opacity = 0;
    setTimeout(function () {
        document.getElementById("er_du_sikker_paa_at_du_vil_slette_denne_fil").style.display = "none";

    }, 500)
}


var lastSelect = false;
function selctfunction(e) {

    if (!isInFunction) {
        if (this.dataset.selected == 0) {
            this.dataset.selected = 1;
            this.classList.add("selected");
            if (e.shiftKey) {
                if (lastSelect != this.dataset.id && lastSelect !== false) {
                    var itemelements = document.querySelectorAll(".listitem");
                    for (var i = 0; i < itemelements.length; i++) {
                        var element = itemelements[i];
                        if (parseInt(lastSelect) > parseInt(this.dataset.id)) {
                            if (parseInt(element.dataset.id) < parseInt(lastSelect) && parseInt(element.dataset.id) > parseInt(this.dataset.id)) {
                                element.dataset.selected = 1;
                                element.classList.add("selected");
                            }
                        } else if (parseInt(lastSelect) < parseInt(this.dataset.id)) {
                            if (parseInt(element.dataset.id) > parseInt(lastSelect) && parseInt(element.dataset.id) < parseInt(this.dataset.id)) {
                                element.dataset.selected = 1;
                                element.classList.add("selected");
                            }
                        }
                    }
                }
            }
            lastSelect = parseInt(this.dataset.id);
        } else {
            this.dataset.selected = 0;
            this.classList.remove("selected");
            lastSelect = false
        }

    }


    updateFunctionsKnapper();


}


function visValg(vis) {
    if (knapper.valg) {
        if (vis) {
            document.getElementById("vaelg").style.display = "block";
            document.getElementById("valg_click").style.display = "block";
            setTimeout(function () {
                document.getElementById("vaelg").style.left = "-35px";
            }, 5)
        } else {
            document.getElementById("vaelg").style.left = "2px";
            document.getElementById("valg_click").style.display = "none";
            setTimeout(function () {
                document.getElementById("vaelg").style.display = "none";
            }, 500);
        }
    }
}
function visSlet(vis) {
    if (knapper.slet) {
        if (vis) {
            document.getElementById("slet").style.display = "block";
            document.getElementById("slet_click").style.display = "block";
            setTimeout(function () {
                document.getElementById("slet").style.right = "-35px";
            }, 5)
        } else {
            document.getElementById("slet").style.right = "2px";
            document.getElementById("slet_click").style.display = "none";
            setTimeout(function () {
                document.getElementById("slet").style.display = "none";
            }, 500);
        }
    }

}
function visResize(vis) {
    if (knapper.resize) {
        if (vis) {
            document.getElementById("resize").style.display = "block";
            document.getElementById("resize_click").style.display = "block";
            setTimeout(function () {
                document.getElementById("resize").style.top = "80px";
                document.getElementById("resize").style.right = "-30px";
            }, 5)
        } else {
            document.getElementById("resize").style.top = "87px";
            document.getElementById("resize").style.right = "12px";
            document.getElementById("resize_click").style.display = "none";
            setTimeout(function () {
                document.getElementById("resize").style.display = "none";
            }, 500);
        }
    }

}
function visCResize(vis) {
    if (knapper.cresize) {
        if (vis) {
            document.getElementById("c_resize").style.display = "block";
            setTimeout(function () {
                document.getElementById("c_resize").style.opacity = "1";
            }, 5)
        } else {
            document.getElementById("c_resize").style.opacity = "0";
            setTimeout(function () {
                document.getElementById("c_resize").style.display = "none";
            }, 500);
        }
    }

}
function visFlip(vis) {
    if (knapper.flip) {
        if (vis) {
            document.getElementById("rotate").style.display = "block";
            document.getElementById("rotate_click").style.display = "block";
            setTimeout(function () {
                document.getElementById("rotate").style.top = "40px";
                document.getElementById("rotate").style.right = "-10px";
            }, 5)
        } else {
            document.getElementById("rotate").style.top = "65px";
            document.getElementById("rotate").style.right = "29px";
            document.getElementById("rotate_click").style.display = "none";
            setTimeout(function () {
                document.getElementById("rotate").style.display = "none";
            }, 500);
        }
    }


}
function visColor(vis) {
    if (knapper.color) {
        if (vis) {
            document.getElementById("color").style.display = "block";
            document.getElementById("color_click").style.display = "block";
            setTimeout(function () {
                document.getElementById("color").style.top = "9px";
                document.getElementById("color").style.right = "32px";
            }, 5)
        } else {
            document.getElementById("color").style.top = "42px";
            document.getElementById("color").style.right = "58px";
            document.getElementById("color_click").style.display = "none";
            setTimeout(function () {
                document.getElementById("color").style.display = "none";
            }, 500);
        }
    }

}
function updateFunctionsKnapper() {
    var selected_elements = document.querySelectorAll(".selected");
    var antal_selected_elements = selected_elements.length;


    if (antal_selected_elements == 0) {
        visValg(false);
        visSlet(false);
        visResize(false);
        visCResize(false);
        visFlip(false);
        visColor(false);
    } else if (antal_selected_elements == 1) {
        visValg(true);
        visSlet(true);
        visResize(true);
        visCResize(true);
        visFlip(true);
        visColor(true);
    } else {
        visValg(false);
        visSlet(true);
        visResize(true);
        visCResize(false);
        visFlip(true);
        visColor(false);
    }

}
function setEventsOnImageForClick() {
    var elements = document.querySelectorAll(".listitem");
    console.log(elements);
    for (var e = 0; e < elements.length; e++) {
        var element = elements[e];
        element.addEventListener("click", selctfunction, false)

    }
}


var drag_pos = {"mouseX": 0, "mouseY": 0, "w": 0, "h": 0, "t": 0, "l": 0};
var drag_bg_image = {"w": 350, "h": 0};
var cc_image = "";
function r_dragstart(e) {
    drag_pos.mouseX = e.clientX;
    drag_pos.mouseY = e.clientY;
    drag_pos.w = document.getElementById("custum_crop_resizer").offsetWidth;
    drag_pos.h = document.getElementById("custum_crop_resizer").offsetHeight;
    drag_pos.t = document.getElementById("custum_crop_resizer").offsetTop;
    drag_pos.l = document.getElementById("custum_crop_resizer").offsetLeft;

    drag_bg_image.h = document.getElementById("custum_crop_image").offsetHeight;

    console.log(1)

}
function r_dragmove(e) {
    e.preventDefault();
    console.log(2);

    new_drag_pos_x = e.clientX;
    new_drag_pos_y = e.clientY;

    var forskelX = new_drag_pos_x - drag_pos.mouseX;
    var forskelY = new_drag_pos_y - drag_pos.mouseY;

    /*console.log(forskelX+"-"+(forskelY));
     console.log(new_drag_pos_x+"/"+(new_drag_pos_y));
     console.log(drag_pos.mouseX+"/"+(drag_pos.mouseY));*/

    if (forskelX > 0) {
        if ((drag_pos.l + drag_pos.w + forskelX) < drag_bg_image.w) {
            console.log(7);
            document.getElementById("custum_crop_resizer").style.width = drag_pos.w + forskelX + "px";

            set_hiv_i_mig();
        }
    } else if (forskelX < 0) {
        if (Math.abs(forskelX) < drag_pos.w) {
            console.log(8);
            document.getElementById("custum_crop_resizer").style.width = drag_pos.w + forskelX + "px";

            set_hiv_i_mig();
        }
    }
    if (forskelY > 0) {
        if ((drag_pos.t + drag_pos.h + forskelY) < drag_bg_image.h) {
            console.log(9);
            document.getElementById("custum_crop_resizer").style.height = drag_pos.h + forskelY + "px";

            set_hiv_i_mig();
        }
    } else if (forskelY < 0) {
        if (Math.abs(forskelY) < drag_pos.h) {
            console.log(10);
            document.getElementById("custum_crop_resizer").style.height = drag_pos.h + forskelY + "px";

            set_hiv_i_mig();
        }
    }

    set_new_size_preview();

}
function f_dragstart(e) {
    drag_pos.mouseX = e.clientX;
    drag_pos.mouseY = e.clientY;
    drag_pos.w = document.getElementById("custum_crop_resizer").offsetWidth;
    drag_pos.h = document.getElementById("custum_crop_resizer").offsetHeight;
    drag_pos.t = document.getElementById("custum_crop_resizer").offsetTop;
    drag_pos.l = document.getElementById("custum_crop_resizer").offsetLeft;
    console.log(3)
}
function f_dragmove(e) {
    e.preventDefault();
    console.log(4);


    new_drag_pos_x = e.clientX;
    new_drag_pos_y = e.clientY;

    var forskelX = new_drag_pos_x - drag_pos.mouseX;
    var forskelY = new_drag_pos_y - drag_pos.mouseY;

    if (forskelX > 0) {
        if (drag_pos.w + drag_pos.l + forskelX < drag_bg_image.w) {
            console.log(7);
            document.getElementById("custum_crop_resizer").style.left = drag_pos.l + forskelX + "px";

            set_hiv_i_mig();
        }
    } else if (forskelX < 0) {
        if (drag_pos.l + forskelX > 0) {
            console.log(8);
            document.getElementById("custum_crop_resizer").style.left = drag_pos.l + forskelX + "px";

            set_hiv_i_mig();
        }
    }
    if (forskelY > 0) {
        if (drag_pos.h + drag_pos.t + forskelY < drag_bg_image.h) {
            console.log(9);
            document.getElementById("custum_crop_resizer").style.top = drag_pos.t + forskelY + "px";

            set_hiv_i_mig();
        }
    } else if (forskelY < 0) {
        if (drag_pos.t + forskelY > 0) {
            console.log(10);
            document.getElementById("custum_crop_resizer").style.top = drag_pos.t + forskelY + "px";

            set_hiv_i_mig();
        }
    }


}

function set_hiv_i_mig() {
    document.getElementById('custum_crop_resizer_hivimig').style.top = document.getElementById('custum_crop_resizer').offsetHeight + document.getElementById('custum_crop_resizer').offsetTop - 5 + 'px';
    document.getElementById('custum_crop_resizer_hivimig').style.left = document.getElementById('custum_crop_resizer').offsetWidth + document.getElementById('custum_crop_resizer').offsetLeft - 5 + 'px';
}
function set_new_size_preview() {
    if (custum_crop_prev_parm.active) {
        var aspect1 = custum_crop_prev_parm.height / custum_crop_prev_parm.width;
        var aspect1_o = custum_crop_prev_parm.width / custum_crop_prev_parm.height;
        var aspect2 = document.getElementById("custum_crop_resizer").offsetHeight / document.getElementById("custum_crop_resizer").offsetWidth;

        console.log(aspect1 + "-" + aspect2);

        if (aspect1 < aspect2) {
            document.getElementById("custum_crop_resizer_last_size").style.width = document.getElementById("custum_crop_resizer").offsetWidth + "px";
            document.getElementById("custum_crop_resizer_last_size").style.height = document.getElementById("custum_crop_resizer").offsetWidth * aspect1 + "px";


            document.getElementById("custum_crop_resizer_last_size").style.marginTop = (document.getElementById("custum_crop_resizer").offsetHeight - document.getElementById("custum_crop_resizer").offsetWidth * aspect1) / 2 + "px";
            document.getElementById("custum_crop_resizer_last_size").style.marginLeft = 0;
        } else if (aspect1 > aspect2) {
            document.getElementById("custum_crop_resizer_last_size").style.height = document.getElementById("custum_crop_resizer").offsetHeight + "px";
            document.getElementById("custum_crop_resizer_last_size").style.width = document.getElementById("custum_crop_resizer").offsetHeight * aspect1_o + "px";

            document.getElementById("custum_crop_resizer_last_size").style.marginTop = 0;
            document.getElementById("custum_crop_resizer_last_size").style.marginLeft = (document.getElementById("custum_crop_resizer").offsetWidth - document.getElementById("custum_crop_resizer").offsetHeight * aspect1_o) / 2 + "px";

        } else {
            document.getElementById("custum_crop_resizer_last_size").style.margin = "0";
            document.getElementById("custum_crop_resizer_last_size").style.width = document.getElementById("custum_crop_resizer").offsetWidth + "px";
            document.getElementById("custum_crop_resizer_last_size").style.height = document.getElementById("custum_crop_resizer").offsetHeight + "px";

        }

    }
}

</script>
</head>
<body>

<div id="toomenu">
    <div id="amlupload">
        <div id="amluploadoption">
            <input id="amlselcfiler" type="file" multiple><br>
            <button id="amluploadknap">Upload</button>
        </div>
        <div id="options">
            <select id="filenameoption">
                <option value="1">{id}.[ext]</option>
                <option value="2">[name].[ext]</option>
                <option value="3">{id}[name].[ext]</option>
                <option value="4">{id}_[name].[ext]</option>
                <option value="5">{id}-[name].[ext]</option>
                <option value="6">{id}.[name].[ext]</option>
            </select>
        </div>
        <div id="vis_aml_upload">
            <div id="vis_aml_upload_options">
                <img src="img/option.png" height="20" style="float: left"/>
            </div>
            <div id="vis_aml_upload_open">
                STIFINDER
            </div>
            <div id="vis_aml_upload_download">
                <a href="download.php" download>
                    <img src="img/download.png" height="20" style="float: right" alt=""/>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div id="wrapper">


    <div id="droparea" class="klartilupload">
    </div>

    <div id="vaelg">
        <img src="img/isuploaded.png" alt="" title="Vælg den valgte element"/>
    </div>
    <div id="slet">
        <img src="img/delete.png" alt="" title="Slet det/de makerede elementer"/>
    </div>
    <div id="rotate">
        <img src="img/rotate.png" alt="" title="Roter det/de makerede elementer"/>
    </div>
    <div id="resize">
        <img src="img/resize.png" alt="" title="Resize det/de makerede elementer"/>
    </div>
    <div id="c_resize">
        <img src="img/resize_c.png" alt="" title="Costom resize det makerede elementer"/>
    </div>
    <div id="color">
        <img src="img/color.png" alt="" title="Jusrer lystyrke og sort/hvid mulighed"/>
    </div>


    <div id="er_du_sikker_paa_at_du_vil_slette_denne_fil">
        <div id="er_du_sikker_paa_at_du_vil_slette_denne_fil_inner">
            <div id="er_du_sikker_paa_at_du_vil_slette_denne_fil_title">
                Er du sikker på at du vil slette denne fil?
            </div>
            <div id="er_du_sikker_paa_at_du_vil_slette_denne_fil_valg">
                <div id="er_du_sikker_paa_at_du_vil_slette_denne_fil_valg_inner">
                    <div id="er_du_sikker_paa_at_du_vil_slette_denne_fil_anuler"></div>
                    <div id="er_du_sikker_paa_at_du_vil_slette_denne_fil_ok"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="resize_option">
        <div id="resize_option_luk">

        </div>
        <div id="resize_option_size">
            <input type="number" id="resize_option_height" placeholder="Højde"><br>
            <input type="number" id="resize_option_width" placeholder="Bredde">
        </div>

        <div id="resize_option_ok">

        </div>
    </div>
    <div id="rotate_options">
        <div id="rotate_option_luk">

        </div>
        <div id="rotate_option_hjul">
            <div id="rotate_option_flip_h" class="flip">
                <img src="img/flip_h.png" alt=""/>
            </div>
            <div id="rotate_option_flip_v" class="flip">
                <img src="img/flip_v.png" alt=""/>
            </div>
            <div id="rotate_option_venstre">
                <img src="img/rotateoptionicon_venstre.png" alt="Til venstre"/>
            </div>
            <div id="rotate_option_hojre">
                <img src="img/rotateoptionicon_hojre.png" alt="Til højre"/>
            </div>
            <div id="rotate_option_halvomgang">
                <img src="img/rotateoptionicon_halv.png" alt="En halv rundte"/>
            </div>

        </div>
    </div>
    <div id="custum_crop">
        <div id="custum_crop_luk">
            <img src="img/delete.png" alt=""/>
        </div>
        <div id="custum_crop_new_size">
            <div id="custum_crop_new_size_checkboxouter">
                <div>
                    <input type="checkbox" id="custum_crop_new_size_checkbox">
                    <label for="custum_crop_new_size_checkbox">
                        Sæt ny fast størelse
                    </label>
                </div>
                <input type="number" id="custum_crop_new_size_height" placeholder="Højde" disabled>
                <input type="number" id="custum_crop_new_size_width" placeholder="Brede" disabled>
            </div>
        </div>
        <div id="custum_crop_image">
            <div id="custum_crop_resizer" draggable="true">
                <div id="custum_crop_resizer_last_size">

                </div>
            </div>
            <div id="custum_crop_resizer_hivimig" draggable="true"></div>
        </div>
        <div id="custum_crop_ok">
            <img src="img/isuploaded.png" alt=""/>
        </div>
    </div>
    <div id="coloroptions">
        <div id="coloroptions_luk">
            <img src="img/delete.png" alt=""/>
        </div>
        <div id="coloroptions_adjust">
            <img id="coloroptions_img" src="" alt=""/>
            <div>
                <span id="coloroptions_finjust">Fin justering</span>
                <span id="coloroptions_grovjust" class="active">Grov justering</span>
                <span id="coloroptions_opdata">Opdater</span>
                <span id="coloroptions_nulstil">Nulstil</span>
            </div>

            <div id="coloroptions_adjust_sliders">
                <div>
                    <input type="checkbox" id="coloroptions_grayscale"/>
                    <label for="coloroptions_grayscale">
                        Sort hvid
                    </label>
                </div>
                <div>
                    <label for="coloroptions_brightness">
                        Lysbalance
                    </label>
                    <input type="range" min="-255" max="255" value="0" id="coloroptions_brightness"/>
                </div>
                <div>
                    <label for="coloroptions_contrast">
                        Kontrast
                    </label>
                    <input type="range" min="-255" max="255" value="0" id="coloroptions_contrast"/>
                </div>
            </div>
        </div>

        <div id="coloroptions_ok">
            <img src="img/isuploaded.png" alt=""/>
        </div>
    </div>

    <div id="valg_click"></div>
    <div id="slet_click"></div>
    <div id="rotate_click"></div>
    <div id="resize_click"></div>
    <div id="color_click"></div>

    <div id="check">
        <img src="img/checkall.png" id="checkall" alt=""/>
        <img src="img/checknone.png" id="checknone" alt=""/>
    </div>

    <div id="liste">

        <?php

        foreach ($filer as $fil) {
            list($width, $height, $type, $attr) = getimagesize($folder . $fil);
            ?>
            <div class="listitem" data-id="<?php echo $filid; ?>" data-url="<?php echo $fil ?>"
                 data-selected="0">
                <div class="navn">
                    <?php echo $fil ?>
                    <span class="size"><span class="width"><?php echo $width; ?></span>x<span
                            class="height"><?php echo $height; ?></span></span>
                </div>

                <img
                    class="image <?php echo($width > $height ? 'lanscape' : ($width == $height ? 'kvadradic' : 'protrat')) ?>"
                    src="<?php echo $folder . $fil ?>">

            </div>

        <?php
            $filid--;
        }
        ?>
    </div>

</div>

</body>
</html>