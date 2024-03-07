<?php
// require __DIR__ . '/server/config.php';
// createTables();
include "server/config.php";
include "server/route/index.php";
// $url = $_SERVER["REQUEST_URI"];
// echo $url;
$controller = isset($_GET["controller"])?$_GET["controller"]:"";
$action = isset($_GET["action"])?$_GET["action"]:"index";
// echo $rootPath."/client/$controller/$action.php";
include $rootPath."/client/$controller/$action.php";
// header("Location: client/");
?>