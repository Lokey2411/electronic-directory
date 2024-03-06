<?php
require "HighlightedList.php";
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
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
  </nav>
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
  <div class="news&events">
  <div class="h1 text-center text-white px-5 py-3 mt-2 rounded bgGradient">Tin tức & sự kiện</div>
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <img src="https://www.tlu.edu.vn/Portals/0/Thumbnails/web1.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
          <li class="list-group-item"><a href="NewsAndEvents.php" class="text-decoration-none">Xem thêm &raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- contact -->
  
  <!-- footer -->
  <div class="footer">
    <div class="footer-top pt-2 mt-5" style="background-color: blue;">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h3 class="text-white">© ĐẠI HỌC THỦY LỢI</h3>
          </div>
          <div class="col-md-4">
            <div class="social-icons text-end">
              <a href="https://www.facebook.com/daihocthuyloi1959/?fref=ts"><i class="bi bi-facebook text-white"></i></a>
              <a href="https://twitter.com/Daihocthuyloihn"><i class="bi bi-twitter text-white"></i></a>
              <a href="https://www.youtube.com/user/daihocthuyloi"><i class="bi bi-youtube text-white"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-main" style="background-color: #001373;">
      <div class="container">
        <div class="row pt-3">
          <div class="col-md-4 mt-3">
            <a href="#"><img class="w-100 h-70" src="https://www.tlu.edu.vn/portals/0/images/upload/TLU-map.png" alt="tlu-map" /></a>
          </div>
          <div class="col-md-8">
            <div class="footer-widget text-white">
              <h4>Đại học Thủy Lợi</h4>
              <p>Địa chỉ: 175 Tây Sơn, Đống Đa, Hà Nội</p>
              <p>Điện thoại: (024) 38522201 - Fax: (024) 35633351</p>
              <p>Email: phonghcth@tlu.edu.vn</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>