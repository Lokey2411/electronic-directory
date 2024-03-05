<?php
function Navbar()
{
  return '<!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img class="w-75 h-75" src="https://www.tlu.edu.vn/Portals/_default/skins/tluvie/images/logo.png" alt="" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Liên hệ</a>
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
          <li class="nav-item"><a class="nav-link" href="./Authentication/LoginUser.php">Đăng Nhập</a></li>
          <li class="nav-item"><a class="nav-link" href="./Authentication/SignUp.php">Đăng ký</a></li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">
            Search
          </button>
        </form>
      </div>
    </div>
  </nav>';
}
