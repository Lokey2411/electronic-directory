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
                        <h3>John Doe</h3>
                        <form id="edit-user-form" method="post" action=<?=isset($_GET['id'])?
                            BASE_URL.'server/controller/user.controller.php?id='.$_GET['id']:
                            BASE_URL.'server/controller/user.controller.php'?> enctype="multipart/form-data">
                            <?php include_once CLIENT.'/NoticeAuthentication/getError.php' ?>
                            <label for="avatar">Chỉnh sửa ảnh đại diện:</label>
                            <input type="file" name="avatar" id="js-upload-image" />
                            <div class="form-group">
                                <label for="name">Họ tên:</label>
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
    const isGetData = <?= isset($_GET['id']) ? true : false; ?>;
    const responseLink = isGetData ?
        "<?=BASE_URL.'server/controller/admin.controller.php?id='.$_GET['id'] ?>" :
        "<?=BASE_URL.'server/controller/user.controller.php'?>";
    console.log(responseLink);
    fetch(responseLink).then(res => res.json()).then(data => {
        // console.log("<?=UPLOAD?>" + "/" + data.avatar);
        console.log(data);
        document.getElementById("js-image-preview").src = "<?=BASE_URL?>assets/uploads/images/" + data
            .Avatar;
        document.getElementById("name").value = data.FullName;
        document.getElementById("email").value = data.Email;
        document.getElementById("phone").value = data.MobilePhone;
    }).catch(console.log);
    </script>


</body>

</html>