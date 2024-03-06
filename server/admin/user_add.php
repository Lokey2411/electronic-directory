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
                                <a class="nav-link" aria-current="page" href="dashboard.php">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Quản lý danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Quản lý tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="users.php">Quản lý người dùng</a>
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
                        <h3 class="text-center text-primary">THÊM MỚI TÀI KHOẢN NGƯỜI DÙNG</h3>
                        <?php if (isset($_GET['error'])) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['error'] ?>
                            </div>
                        <?php endif ?>
                        <form action="user_add_process.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên người dùng</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password1" name="password1">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="password2" name="password2">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
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