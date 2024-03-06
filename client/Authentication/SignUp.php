<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SignUp.css">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <img src="https://www.tlu.edu.vn/Portals/0/2021/Th%C3%A1ng%203/baner-webthumb.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Đăng ký</h5>
                        <form action="#">
                            <div class="form-group">
                                <label for="username">Tên tài khoản</label>
                                <input type="text" class="form-control" id="username" placeholder="Nhập tên tài khoản">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="employee_code">Mã nhân viên</label>
                                <input type="text" class="form-control" id="employee_code" placeholder="Nhập mã nhân viên">
                            </div>
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>