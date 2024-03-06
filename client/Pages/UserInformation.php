<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card user-info">
                    <div class="text-center">
                        <img src="https://images.unsplash.com/photo-1682687218608-5e2522b04673?q=80&w=1675&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="User Avatar" class="rounded img-thumbnail ">
                    </div>
                    <div class="card-body">
                        <h3>John Doe</h3>
                        <form id="edit-user-form">
                            <div class="form-group">
                                <label for="name">Họ tên:</label>
                                <input type="text" class="form-control" id="name" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="johndoe@example.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="tel" class="form-control" id="phone" value="+1234567890">
                            </div>
                            <div class="form-group">
                                <label for="country">Quốc gia:</label>
                                <select class="form-control" id="country">
                                    <option value="VN">Việt Nam</option>
                                    <option value="US">Hoa Kỳ</option>
                                    <option value="UK">Vương quốc Anh</option>
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
</body>

</html>