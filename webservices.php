<?php
$myPdo = null;
header('Access-Control-Allow-Origin: *');
require_once('/home/newsfeedsmartapp/public_html/libs2/functions.php');
$obj = new Functions("india");
$uid = $_POST["user_id"];
function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
$action = $_POST['action'];
$source = $_POST['source'];
switch ($action) {
    case "create_user":
        $device = "web";
        if (isMobile()) {
            $device = "mobile";
        }
        $uid = $obj->createUser("manchester_city_count21", $device, array('source' => $source));
        echo $uid;
        break;
    case "start":
        buttonIncrement();
        break;
    case "getWrongText":
        getWrongText();
        break;
    case "next":
        buttonIncrement();
        break;
    case "userData":
        userData();
        break;

    case "saveImgFileName":
        saveImgFileName();
        break;
    case "fshare":
        buttonIncrement();
        break;
    case "wshare":
        buttonIncrement();
        break;
    case "download_link":
        buttonIncrement();
        break;
    case "custom_thumbnail_store":
        custom_thumbnail_store();
        break;
    case "whshare_download":
        whshare_download();
        break;
}

function buttonIncrement()
{
    global $obj;
    $uid = NULL;
    $action = $_POST['action'];
    if (isset($_POST['user_id'])) {
        $uid = $_POST['user_id'];
    }
    $res1 = $obj->clickUpdater("manchester_city_count21", $uid, $action);
    echo ($res1);
}

function userData()
{
    global $obj;
    $uid = NULL;
    if (isset($_POST['user_id'])) {
        $uid = $_POST['user_id'];
    }
    $jersy_name = $_POST['jersy_name'];
    $userData = array('jersy_name' => $jersy_name);
    $uid = array('uid' => $_POST['user_id']);
    $res5 = $obj->updateData('manchester_city_count21', $userData, $uid);
    echo ("save Data");
}
function saveImgFileName()
{
    global $obj;
    $uid = NULL;
    if (isset($_POST['user_id'])) {
        $uid = $_POST['user_id'];
    }

    $file_name = $_POST['share_Img_File'];
    $fileData = array('share_Img_File' => $file_name);
    $uid = array('uid' => $_POST['user_id']);
    $res5 = $obj->updateData('manchester_city_count21', $fileData, $uid);
    echo ("save Data");
}

function custom_thumbnail_store()
{
    global $obj;
    $uid = NULL;
    if (isset($_POST['user_id'])) {
        $uid = $_POST['user_id'];
    }
    $font_path = 'font/Pattaya-Regular.ttf';
    $jersy_name = filter_var($_POST['jersy_name'], FILTER_SANITIZE_STRING);
    $random = $_POST['random'];
    $file_name =  $uid . "_" . $random . "_" . $jersy_name;
    //set image
    $squire_Img = imagecreatetruecolor(1200, 630);
    $image = imagecreatefrompng('FB-thumbnailtemplate.png');
    $bgImg = imagecopy($squire_Img, $image, 0, 0, 0, 0, 1200, 630);

    $white = imagecolorallocatealpha($squire_Img, 255, 255, 255, 0);
    // // Print Text On FB share img
    // $text_box =  imagettftext($squire_Img, 20, 0, 420, 400, $white, $font_path, $jersy_name);
    $text_box = imagettfbbox(20, 0, $font_path, $jersy_name);
    $box_width = 170;
    $box_x = 364;
    $jsesyTextLength = $text_box[2] - $text_box[0];
    $x = (($box_width - $jsesyTextLength) / 2) + $box_x;
    imagettftext($squire_Img, 20, 0, $x, 410, $white, $font_path, $jersy_name);


    imagejpeg($squire_Img, "Thumbnail/" . $file_name . ".png");
    echo json_encode(array('thumbnail_name' => $file_name));
}

function whshare_download()
{

    global $obj;
    $uid = NULL;
    if (isset($_POST['user_id'])) {
        $uid = $_POST['user_id'];
    }
    $font_path = 'font/Pattaya-Regular.ttf';
    $jersy_name = filter_var($_POST['jersy_name'], FILTER_SANITIZE_STRING);
    $random = $_POST['random'];
    $file_name2 =  $uid . "_" . $random . "_" . $jersy_name;
    //set image
    $squire_Img = imagecreatetruecolor(1080, 1080);
    $image = imagecreatefrompng('Download-Image.png');
    $bgImg = imagecopy($squire_Img, $image, 0, 0, 0, 0, 1080, 1080);

    $white = imagecolorallocatealpha($squire_Img, 255, 255, 255, 0);
    // // Print Text On Whatsapp share img

    $text_box = imagettfbbox(20, 0, $font_path, $jersy_name);
    $box_width = 170;
    $box_x = 210;
    $jsesyTextLength = $text_box[2] - $text_box[0];
    $x = (($box_width - $jsesyTextLength) / 2) + $box_x;
    imagettftext($squire_Img, 26, 0, $x, 700, $white, $font_path, $jersy_name);


    imagejpeg($squire_Img, "Thumbnail/Wshare_downloadImg/" . $file_name2 . ".png");
    echo json_encode(array('wshare_download' => $file_name2));
}


function getWrongText()
{
    global $obj;
    $wrongData = $obj->myPdo->from("manchester_city_checkText_21")
        ->select()
        ->select('wrong_text')
        ->fetchAll();
    echo json_encode($wrongData);
}
