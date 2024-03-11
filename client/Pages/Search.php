<?php
require CLIENT . '/View/Navbar.php';
if (!isset($_GET["item"])) {
    die("404 NOT FOUND");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Tìm kiếm</title>
</head>

<body>
    <?= Navbar() ?>
    <div class="container mt-5">
        <div class="row">
            <div class="">
                <h2 class="text-center text-white px-5 py-3 rounded-3 bgGradient" style="background-image: linear-gradient(
                    to right,
                    red,
                    orange,
                    rgb(224, 224, 14),
                    green,
                    blue,
                    indigo,
                    violet
                );">Nhân viên phù hợp</h2>
                <!-- Mỗi card trong phần này sẽ tượng trưng cho một kết quả tìm kiếm -->
                <div id="js-employee-result">

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="">
                <h2 class="text-center text-white px-5 py-3 rounded-3 bgGradient" style="background-image: linear-gradient(
                    to right,
                    red,
                    orange,
                    rgb(224, 224, 14),
                    green,
                    blue,
                    indigo,
                    violet
                );">
                    Phòng ban phù hợp</h2>
                <!-- Mỗi card trong phần này sẽ tượng trưng cho một kết quả tìm kiếm -->
                <div id="js-department-result"></div>
                <!-- Thêm các card khác tương tự tại đây -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    const item = "<?= $_GET["item"] ?>";
    fetch("<?= BASE_URL ?>" + 'server/controller/search.controller.php?item=' + item).then(res => res
            .json())
        .then(data => {
            const {
                employees,
                departments
            } = data;
            console.log(employees);
            console.log(departments);
            employees.forEach(employee => {
                const employeeResult = document.getElementById("js-employee-result");
                const [
                    FullName,
                    Email,
                    MobilePhone,
                    DepartmentName,
                    Avatar
                ] = employee;
                let htmlCard = `
                 <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="assets/uploads/images/${Avatar}"
                                class="card-img" alt="Avatar của ${FullName}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${FullName}</h5>
                                <p class="card-text"><small class="text-muted">${DepartmentName}</small></p>
                                <p class="card-text">Email: ${Email}</p>
                                <p class="card-text">Số điện thoại:${MobilePhone}</p>
                            </div>
                        </div>
                    </div>
                </div>
                `
                employeeResult.innerHTML += htmlCard;
            });
            departments.forEach(department => {
                const departmentResult = document.getElementById("js-department-result");
                const [
                    DepartmentName,
                    Address,
                    Email, Phone, Website, Logo, ParentDepartmentName
                ] = department;
                let htmlCard = `
                    <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="assets/uploads/images/${Logo}" class="card-img" alt="Logo của ${DepartmentName}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${DepartmentName}</h5>
                                <p class="card-text"><small class="text-muted">${ParentDepartmentName}</small></p>
                                <p class="card-text">Địa chỉ: ${Address}</p>
                                <p class="card-text">Email: ${Email}</p>
                                <p class="card-text">Số điện thoại: ${Phone}</p>
                                <p class="card-text">Website: <a href="https://${Website}">${Website}</a></p>
                            </div>
                        </div>
                    </div>
                </div>`;
                departmentResult.innerHTML += htmlCard;
            })
        })
    </script>
</body>

</html>