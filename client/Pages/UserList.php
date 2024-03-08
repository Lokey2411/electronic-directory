<?php
require '../View/Navbar.php';
require '../View/Banner.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Vị trí</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>02258252552</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="1">Larry the Bird</td>
                    <td>trưởng khoa</td>
                    <td>@twitter</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
</body>

</html>