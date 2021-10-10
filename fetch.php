<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $responce = [];
    if (($data = @file_get_contents($url)) === false) {
        $error = error_get_last();
        $responce["ok"] = 0;
        $responce["error"] = $error["message"];
    } else {
        $responce["ok"] = 1;
        $responce["data"] = $data;
    }
    echo json_encode($responce);
}
