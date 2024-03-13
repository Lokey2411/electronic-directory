<?php
require CLIENT . '/View/Navbar.php';
require CLIENT . '/View/Banner.php';

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
  );">Danh sách Đơn vị</div>
        <table class="table table-hover table-dark" id="js-department-table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên phòng ban</th>
                    <th scope="col">Mã Phòng ban</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Website</th>
                    <th scope="col">Phòng ban trực thuộc</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- pagination -->
        <ul id="js-pagination" class="pagination"></ul>

        <script>
        function pagination(startIndex, pageSize, data) {
            let html = "";
            const endIndex = Math.min(startIndex + pageSize, data.length);
            for (let i = startIndex; i < endIndex; i++) {
                const user = data[i];
                const index = i;
                html += `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${user.DepartmentName}</td>
                                    <td>${user.DepartmentID}</td>
                                    <td>${user.Address}</td>
                                    <td>${user.Email}</td>
                                    <td>${user.Phone}</td>
                                    <td><a href="https://${user.Website}">${user.Website}</a></td>
                                    <td>${user.ParentDepartmentName}</td>
                                </tr>
                                `;
                document.querySelector('#js-department-table tbody').innerHTML = html;
            }
        }
        fetch("<?= BASE_URL ?>" + 'server/controller/departments.controller.php')
            .then(res => res.json())
            .then(data => {
                console.log(data);
                const departmentTable = document.querySelector('#js-department-table tbody');
                data.forEach((user, index) => {
                    departmentTable.innerHTML += `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${user.DepartmentName}</td>
                                    <td>${user.DepartmentID}</td>
                                    <td>${user.Address}</td>
                                    <td>${user.Email}</td>
                                    <td>${user.Phone}</td>
                                    <td><a href="https://${user.Website}">${user.Website}</a></td>
                                    <td>${user.ParentDepartmentName}</td>
                                </tr>
                                `;
                    let pageSize = 5;
                    let currentPage = 1;
                    pagination(0, pageSize, data);
                    let totalPage = Math.ceil(data.length / pageSize);
                    let startIndex = (currentPage - 1) * pageSize;
                    let paginationHtml = "";
                    for (let i = 0; i < totalPage; i++) {
                        paginationHtml +=
                            `<li class="page-item" data-page="${i}" data-pagesize="${pageSize}"><a class="page-link" href="#">${i + 1}</a></li>`;
                    }
                    const paginationElement = document.querySelector('#js-pagination');
                    paginationElement.innerHTML = paginationHtml;
                    // event click button phân trang

                    paginationElement.querySelectorAll('.page-item').forEach(item => item.addEventListener(
                        'click',
                        function() {
                            const page = this.getAttribute('data-page');
                            const pageSize = this.getAttribute('data-pagesize');
                            pagination(page * pageSize, parseInt(pageSize), data, );
                        }));
                })

            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>