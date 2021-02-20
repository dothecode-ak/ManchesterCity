<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (isset($_GET["download_key"])) {
    $download_key = $_GET["download_key"];
    // $download_key = 931684461;
    $fileName = getcwd() . '/Thumbnail/Wshare_downloadImg/' . $download_key . '.png';
    if (file_exists($fileName)) {

        header('Content-Description: File Transfer');
        header("Cache-Control: public");
        header('Content-Type:  application/octet-stream');
        header("Content-Type: image/png");
        header('Content-Disposition: attachment; filename=' . $download_key . ".png");
        header('Content-Transfer-Encoding: binary');
        header('Pragma: public');
        flush();
        readfile($fileName);
    }
}
