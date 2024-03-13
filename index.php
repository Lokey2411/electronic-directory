<?php
// require __DIR__ . '/server/config.php';
// createTables();
include "server/config.php";
include "server/route/index.php";
// $url = $_SERVER["REQUEST_URI"];
// echo $url;
$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
$action = isset($_GET["action"]) ? $_GET["action"] : "index";
// echo $rootPath."/client/$controller/$action.php";
$path = $rootPath . "/client/$controller/$action.php";
if (!file_exists($path)) {
    die("404 NOT FOUND");
} else {
    include $path;
}
// header("Location: client/");
?>



<script>
    function updateAvatar(avatar, imageElement = document.getElementById("js-preview-image")) {
        fetch("assets/uploads/images/" + avatar).then(res => {
            if (res.ok) {
                imageElement.src = "assets/uploads/images/" + avatar;
            }
        })
    }
    fetch("<?= BASE_URL . 'server/controller/employees.controller.php?id=' . $_SESSION["EmployeeID"] ?>").then(res => res
        .json())
        .then(data => {
            const user = data;
            console.log(user);
            updateAvatar(user.Avatar, document.getElementById("js-avatar"));
        })
</script>