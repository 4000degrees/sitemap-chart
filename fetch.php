<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $responce = [];
    $context = stream_context_create(
        array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
    );
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
