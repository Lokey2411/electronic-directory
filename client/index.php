<?php
require "./Pages/HighlightedList.php";
require "./View/Navbar.php";
require "./View/Footer.php";
require "./View/Banner.php";
require "./View/News&Events.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="styles.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <title>Electronic Phonebook</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <!-- navbar -->
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img class="w-75 h-75" src="https://www.tlu.edu.vn/Portals/_default/skins/tluvie/images/logo.png" alt="" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tin tức & sự kiện</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Danh sách danh bạ
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="NewsAndEvents.php">Danh bạ đơn vị</a></li>
              <li><a class="dropdown-item" href="#">Danh bạ giảng viên</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liên hệ</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">
            Search
          </button>
        </form>
      </div>
    </div>
  </nav> -->
  <?php
  echo Navbar();
  ?>
  <!-- banner -->
  <div class="Banner">
    <img src="https://www.tlu.edu.vn/Portals/0/Thumbnails/web1.jpg" class="img-fluid rounded inline-block w-100 h-75" alt="..." />
  </div>
  <!-- HighlightedList -->
  <div>
    <div class="h1 text-center text-white px-5 py-3 rounded bgGradient">Danh sách nổi bật</div>
    <?php
    echo HighlightedList();
    ?>
  </div>
  <!-- news&events -->
  <?php 
  echo NewsAndEvents();
  ?>
  <!-- contact -->
  
  <!-- footer -->
  <?php
  echo Footer();
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>