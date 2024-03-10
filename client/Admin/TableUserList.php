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
    <style>
    .model {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .form-group.col-md-6 {
        /* margin: 0 8px; */
        margin-right: 6px;
    }

    .p-6 {
        padding: 24px;
    }

    .form-row {
        display: flex;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <?php
        echo Navbar();
        ?>
        <main class="mt-3 w-100">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <h3 class="text-center text-primary">DANH SÁCH NHÂN VIÊN</h3>
                        <?php include_once CLIENT."/NoticeAuthentication/GetError.php"?>
                        <button type="button" id="js-add-employee" class="btn btn-primary">Thêm mới</button>
                        <table class="table w-100 mw-100" id="js-employee-table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã nhân viên</th>
                                    <th scope="col">Họ và tên</th>
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
                            <ul class="pagination" id="js-pagination">
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <h3 class="text-center text-primary text-uppercase">Danh sách phòng ban</h3>
                        <button type="button" id="js-add-department" class="btn btn-primary">Thêm mới</button>
                        <table class="table w-100 mw-100" id="js-department-table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã Phòng ban</th>
                                    <th scope="col">Tên phòng ban</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Phòng ban trực thuộc</th>
                                    <th scope="col" colspan="4" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="js-pagination">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="js-employee-modal" class="fixed-top fixed-bottom model d-flex justify-content-center d-none
            align-items-center">
                <div class="bg-white rounded-3 p-6 w-50 h-50">
                    <form class="w-100"
                        action="<?=BASE_URL.'server/controller/admin.controller.php?action=insertEmployee'?>"
                        method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập họ và tên">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="position">Vị trí</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    placeholder="Nhập vị trí">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Phòng ban</label>
                                <select type="text" class="form-control" id="department" name="department"
                                    placeholder="Nhập phòng ban" class="form-select">
                                    <option value="">--Chọn phòng ban--</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                        <button type="button" class="btn btn-secondary" id="js-close-employee-modal">Đóng</button>
                    </form>


                </div>
            </div>
            <!-- Department Modal -->
            <div id="js-department-modal" class="fixed-top fixed-bottom model d-flex justify-content-center d-none
            align-items-center">
                <div class="bg-white rounded-3 p-6 w-50 h-50">
                    <form class="w-100"
                        action="<?=BASE_URL.'server/controller/admin.controller.php?action=insertDepartment'?>"
                        method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Tên phòng ban</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập tên phòng ban">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    placeholder="Nhập vị trí">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Phòng ban trực thuộc</label>
                                <select type="text" class="form-control " id="parent-department" name="department"
                                    placeholder="Nhập phòng ban" class="form-select">
                                    <option value="">--Chọn phòng ban trực thuộc--</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                        <button type="button" class="btn btn-secondary" id="js-close-department-modal">Đóng</button>
                    </form>


                </div>
            </div>
        </main>
        <footer>

        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script id="fetch-users">
    fetch("<?=BASE_URL?>" + 'server/controller/admin.controller.php?action=getAllUsers').then(res => res.json())
        .then(data => {
            console.log(data);
            const employeeTable = document.querySelector('#js-employee-table tbody');
            pagination(0, 10, data, "js-employee-table tbody");
            let pageSize = 10;
            let currentPage = 1;
            let totalPage = Math.ceil(data.length / pageSize);
            let startIndex = (currentPage - 1) * pageSize;
            let paginationHtml = "";
            for (let i = 0; i < totalPage; i++) {
                paginationHtml +=
                    `<li class="page-item" data-page="${i}" data-pagesize="${pageSize}"><a class="page-link" href="#">${i+1}</a></li>`;
            }
            const paginationElement = document.querySelector('#js-pagination');
            paginationElement.innerHTML = paginationHtml;
            // event click button phân trang

            paginationElement.querySelectorAll('.page-item').forEach(item => item.addEventListener('click',
                function() {
                    const page = this.getAttribute('data-page');
                    const pageSize = this.getAttribute('data-pagesize');
                    pagination(page * pageSize, parseInt(pageSize, 10), data, "js-employee-table tbody");
                }));
        })
        .catch(console.log)
    </script>
    <script id="fetch-departments">
    fetch("<?=BASE_URL?>" + 'server/controller/admin.controller.php?action=getAllDepartments').then(res => res.json())
        .then(data => {
            console.log(data);
            const departmentSelect = document.querySelector('#department');
            const parentDepartmentSelect = document.querySelector('#parent-department');
            data.forEach(item => {
                departmentSelect.innerHTML +=
                    `<option value="${item.DepartmentID}">${item.DepartmentName}</option>`;
                parentDepartmentSelect.innerHTML +=
                    `<option value="${item.DepartmentID}">${item.DepartmentName}</option>`
            })
            const employeeTable = document.querySelector('#js-department-table tbody');
            pagination(0, 10, data, "js-department-table tbody");
            let pageSize = 10;
            let currentPage = 1;
            let totalPage = Math.ceil(data.length / pageSize);
            let startIndex = (currentPage - 1) * pageSize;
            let paginationHtml = "";
            for (let i = 0; i < totalPage; i++) {
                paginationHtml +=
                    `<li class="page-item" data-page="${i}" data-pagesize="${pageSize}"><a class="page-link" href="#">${i+1}</a></li>`;
            }
            const paginationElement = document.querySelector('#js-pagination');
            paginationElement.innerHTML = paginationHtml;
            // event click button phân trang

            paginationElement.querySelectorAll('.page-item').forEach(item => item.addEventListener('click',
                function() {
                    const page = this.getAttribute('data-page');
                    const pageSize = this.getAttribute('data-pagesize');
                    pagination(page * pageSize, parseInt(pageSize, 10), data, "js-departmennt-table tbody");
                }));
        })
        .catch(console.log)
    </script>
    <script>
    function createInput(name, placeholder, type = "text") {
        const input = document.createElement('input');
        input.type = type;
        input.name = name;
        input.placeholder = placeholder;
        return input;
    }
    const toggleModal = (modal) => {
        modal.classList.toggle("d-none");
    }

    function pagination(startIndex, pageSize, data, table) {
        let html = "";
        const endIndex = Math.min(startIndex + pageSize, data.length);
        for (let i = startIndex; i < endIndex; i++) {
            const item = data[i];
            html += `<tr> 
                    <th scope="row">${i+1}</th>`
            Object.keys(item).forEach(
                key => {
                    html += `<td>${item[key]}</td>`
                }
            )
            html += `
                <td><a href=<?=BASE_URL.'?controller=Pages&action=UserInformation&id='?>${item.DepartmentID}><i class="fa-solid fa-eye fs-5 d-flex justify-content-center"></i></a></td>
                                    <td><a href=<?=BASE_URL.'server/controller/admin.controller.php?action=deleteDepartment&id='?>${item.DepartmentID}><i class="fa-solid fa-trash fs-5 d-flex justify-content-center "></i></a></td>

            </tr>`;
        }
        document.querySelector('#' + table).innerHTML = html;
    }
    document.getElementById('js-add-employee').addEventListener('click', function() {
        const modal = document.getElementById('js-employee-modal');
        toggleModal(modal);
    });
    document.getElementById('js-close-employee-modal').addEventListener('click', function() {
        const modal = document.getElementById('js-employee-modal');
        if (modal) {
            toggleModal(modal);
        }
    });
    document.getElementById('js-add-department').addEventListener('click', function() {
        const modal = document.getElementById('js-department-modal');
        toggleModal(modal);
    })
    document.getElementById('js-close-department-modal').addEventListener('click', function() {
        const modal = document.getElementById('js-department-modal');
        if (modal) {
            toggleModal(modal);
        }
    })
    </script>

</html>