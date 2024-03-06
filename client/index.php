<?php
require "./Pages/HighlightedList.php";
require "./View/Navbar.php";
require "./View/Banner.php";
require "./View/Footer.php";
require "./Pages/Introduce.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>