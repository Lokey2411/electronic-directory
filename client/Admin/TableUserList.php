<?php
require CLIENT.'/View/Navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <h3 class="text-center text-primary">DANH SÁCH NHÂN VIÊN</h3>
                        <?php if (isset($_GET['message'])) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_GET['message'] ?>
                        </div>
                        <?php endif; ?>
                        <a href="user_add.php" class="btn btn-primary">Thêm mới</a>
                        <table class="table" id="js-employee-table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Mã nhân viên</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Vị trí</th>
                                    <th scope="col">Phòng ban</th>
                                    <th scope="col" colspan="4" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    fetch("<?=BASE_URL?>" + 'server/controller/admin.controller.php?action=getAllUsers').then(res => res.json())
        .then(data => {
            console.log(data);
            const employeeTable = document.querySelector('#js-employee-table tbody');
            data.forEach((user, index) => {
                employeeTable.innerHTML += `<tr>
                                    <th scope="row">${index+1}</th>
                                    <td>${user.FullName}</td>
                                    <td>${user.EmployeeID}</td>
                                    <td>${user.Address}</td>
                                    <td>${user.Email}</td>
                                    <td>${user.MobilePhone}</td>
                                    <td>${user.Position}</td>
                                    <td>${user.DepartmentName}</td>
                                    <td><a href=<?=BASE_URL.'?controller=Pages&action=UserInformation&id='?>${user.EmployeeID}><i
                                                class="fa-solid fa-eye fs-5 d-flex justify-content-center"></i></a></td>
                                    <td><i class="fa-solid fa-trash fs-5 d-flex justify-content-center "></i></td>

                                </tr>
                                `;
            })
        })
    </script>
</body>

</html>