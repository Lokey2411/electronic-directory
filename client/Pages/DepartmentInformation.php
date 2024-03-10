<?php
    session_start();
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card user-info">
                    <div class="text-center">
                        <img src="" alt="User Avatar" class="rounded img-thumbnail " id="js-image-preview">
                    </div>
                    <div class="card-body">
                        <h3 id="js-preview-name"></h3>
                        <form id="edit-user-form" method="post" action=<?=isset($_GET['id'])?
                            BASE_URL.'server/controller/departments.controller.php?id='.$_GET['id']:
                            BASE_URL.'server/controller/departments.controller.php'?> enctype="multipart/form-data">
                            <?php include_once CLIENT.'/NoticeAuthentication/getError.php' ?>
                            <label for="logo">Chỉnh sửa ảnh đại diện:</label>
                            <input type="file" name="logo" id="js-upload-image" />
                            <div class="form-group">
                                <label for="name">Tên:</label>
                                <input type="text" class="form-control" id="name" value="<?=$_SESSION['username']?>"
                                    name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="johndoe@example.com"
                                    name="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="phone" value="+1234567890" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" value="+1234567890" name="address">
                            </div>
                            <div class="form-group">
                                <label for="website">Website:</label>
                                <input type="tel" class="form-control" id="website" value="+1234567890"
                                    name="website" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="parent">Phòng ban trực thuộc</label>
                                <select type="text" class="form-control " id="parent-department" name="parent"
                                    placeholder="Nhập phòng ban" class="form-select">
                                    <option value="">--Chọn phòng ban trực thuộc--</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-1">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    fetch("<?=BASE_URL?>" + 'server/controller/admin.controller.php?action=getAllDepartments').then(res => res.json())
        .then(data => {
            console.log(data);
            const parentDepartmentSelect = document.querySelector('#parent-department');
            data.forEach(item => {
                parentDepartmentSelect.innerHTML +=
                    `<option value="${item.DepartmentID}">${item.DepartmentName}</option>`
            })
        }).catch(console.log);
    const responseLink = "<?=BASE_URL.'server/controller/departments.controller.php'?>";
    console.log(responseLink);

    fetch(responseLink).then(res => res.json()).then(data => {
        // console.log("<?=UPLOAD?>" + "/" + data.avatar);
        console.log(data);
        const department = data.find(department => department.DepartmentID ==
            <?=isset($_GET['id']) ? $_GET['id'] : 0?>);
        document.getElementById("js-image-preview").src = "<?=BASE_URL?>assets/uploads/images/" + department
            .Logo;
        document.getElementById("js-preview-name").innerText = department.DepartmentName;
        document.getElementById("name").value = department.DepartmentName;
        document.getElementById("email").value = department.Email;
        document.getElementById("phone").value = department.Phone;
        document.getElementById("address").value = department.Address;
        document.getElementById("website").value = department.Website;
        document.getElementById("parent-department").value = department.ParentDepartmentID;
    }).catch(console.log);
    </script>


</body>

</html>