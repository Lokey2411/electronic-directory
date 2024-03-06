<?php
require '../View/Navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <?php
        echo Navbar();
        ?>
        <main class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <h3 class="text-center text-primary">DANH SÁCH TÀI KHOẢN NGƯỜI DÙNG CHỜ DUYỆT</h3>
                        <?php if (isset($_GET['message'])) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['message'] ?>
                            </div>
                        <?php endif; ?>
                        <a href="user_add.php" class="btn btn-primary">Thêm mới</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên đăng nhập</th>
                                    <th scope="col">Mã nhân viên</th>
                                    <th scope="col" colspan="4" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td><i class="fa-solid fa-check fs-5 d-flex justify-content-center "></i></td>
                                    <td><i class="fa-solid fa-trash fs-5 d-flex justify-content-center "></i></td>
                                    
                                </tr>
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