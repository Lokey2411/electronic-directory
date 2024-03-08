<?php
function Navbar()
{
  session_start();
  $isLoggedin = isset($_SESSION["Role"]);
  $isAdmin = $isLoggedin && $_SESSION["Role"] == "Admin";
  $authItem = $isLoggedin ? '<li class="nav-item"><a class="nav-link" href='.BASE_URL.'/server/auth/logout.php>Đăng xuất</a></li>' :'<li class="nav-item"><a class="nav-link" href='.BASE_URL.'?controller=Authentication&action=LoginUser>Đăng Nhập</a></li>
  <li class="nav-item"><a class="nav-link" href='.BASE_URL.'?controller=Authentication&action=SignUp>Đăng ký</a></li>';
  $adminItem = $isAdmin?'<li class="nav-item"><a class="nav-link" href='.BASE_URL.'?controller=Admin&action=TableUserList>Admin</a></li> <li class="nav-item"><a class="nav-link" href="?controller=Pages&action=UserInformation">Thông tin</a></li>':"";
  return '<!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" style="width:25%" href='.BASE_URL.'><img class="w-100 h-50" src="https://www.tlu.edu.vn/Portals/_default/skins/tluvie/images/logo.png" alt="" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-6 ">
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
              <li><a class="dropdown-item" href='.BASE_URL.'?controller=Pages&action=UserList>Danh bạ đơn vị</a></li>
              <li><a class="dropdown-item" href="#">Danh bạ giảng viên</a></li>
            </ul>
          </li>'.$authItem.$adminItem.'
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