<?php
require CLIENT.'/View/Navbar.php';
require CLIENT.'/View/Banner.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <?php
    echo Navbar();
    ?>
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
  );">Danh sách giảng viên</div>
        <table class="table table-hover table-dark" id="js-employee-table">
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
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <script>
        fetch("<?=BASE_URL?>" + 'server/controller/employees.controller.php?action=getAllUsers').then(res => res.json())
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
                                </tr>
                                `;
                })
            })
        </script>
</body>

</html>