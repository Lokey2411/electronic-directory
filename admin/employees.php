<?php
require_once '../function.php';
$employees = getAllEmployees();
// echo '<pre>';
// print_r($employees);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Electronic Phonebook</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../client/index.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Quản lý danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Quản lý tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="employees.php">Quản lý nhân viên</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <a href="profile.php" class="text-decoration-none text-success">Tài khoản:</a>
                        <a href="logout.php" class="btn btn-danger">Thoát</a>
                    </div>
                </div>
            </nav>
        </header>
        <main class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <h3 class="text-center text-primary">DANH SÁCH DANH BẠ NHÂN VIÊN</h3>
                        <?php if (isset($_GET['message'])) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['message'] ?>
                            </div>
                        <?php endif; ?>
                        <a href="employee_add.php" class="btn btn-primary">Thêm mới</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Thư điện tử</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Vị trí công tác</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Đơn vị trực thuộc</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                <?php foreach ($employees as $key => $employees) : ?>
                                    <tr>
                                        <th scope="row"><?php echo ++$i; ?></th>
                                        <td><?php echo $employees['FullName']; ?></td>
                                        <td><?= $employees['Address']; ?></td>
                                        <td><?= $employees['Email']; ?></td>
                                        <td><?= $employees['MobilePhone']; ?></td>
                                        <td><?= $employees['Position']; ?></td>
                                        <td><?= $employees['Avatar']; ?></td>
                                        <td><?= $employees['DepartmentID']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </main>
        <footer>

        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>