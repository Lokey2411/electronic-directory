<?php
if($_SERVER["REQUEST_URI"]=='/client')
include "../server/config.php";
require CLIENT."/Pages/HighlightedList.php";
require CLIENT."/View/Navbar.php";
require CLIENT."/View/Banner.php";
require CLIENT."/View/Footer.php";
require CLIENT."/Pages/Introduce.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="View/Footer.css">
    <title>Document</title>
</head>

<body>
    <?php
  echo Navbar();
  ?>
    <!-- banner -->
    <?php
  echo Banner();
  ?>
    <!-- HighlightedList -->
    <div>
        <div class="h1 text-center text-white px-5 py-3 rounded bgGradient" style="background-image: linear-gradient(
    to right,
    red,
    orange,
    rgb(224, 224, 14),
    green,
    blue,
    indigo,
    violet
  );">Giới thiệu</div>
        <?php
    echo Introduce();
    ?>
    </div>
    <!-- footer -->
    <?php
  echo Footer();
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    fetch("<?=BASE_URL.'server/controller/employees.controller.php'?>").then(res => res.json()).then(data => {
        console.log(data);
        document.getElementById("js-num-employees").innerText = data.length;
    });
    fetch("<?=BASE_URL.'server/controller/departments.controller.php'?>").then(res => res.json()).then(data => {
        document.getElementById("js-num-departments").innerText = data.length;
    }).catch(console.log)
    </script>
</body>

</html>