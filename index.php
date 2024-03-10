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
$path = $rootPath."/client/$controller/$action.php";
if(!file_exists($path)){
    die("404 NOT FOUND");
    exit(0);
}
else{
    include $path;
}
// header("Location: client/");
?>

<script>
fetch("<?=BASE_URL.'/server/controller/employees.controller.php'?>").then(res => res.json())
    .then(data => {
        const user = data.find(user => user.EmployeeID == <?=$_SESSION["EmployeeID"]?>);
        console.log(user);
        document.getElementById("js-avatar").src = "assets/uploads/images/" + user.Avatar;
    })
</script>