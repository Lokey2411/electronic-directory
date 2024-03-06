<?php
//Lấy thông tin từ FORM user_add.php gửi sang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    //Kiểm tra dữ liệu
    if (empty($username) || empty($email) || empty($password1) || empty($password2)) {
        echo "Vui lòng nhập đầy đủ thông tin";
    }
    if ($password1 != $password2) {
        echo "Mật khẩu không trùng khớp";
    }

    //Mã hóa mật khẩu
    $password1 = password_hash($password1, PASSWORD_DEFAULT);

    //Lưu vào <CSDL></CSDL>
    $conn = mysqli_connect('localhost', 'root', '0123456789', 'electronic_phonebook');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result) > 0) {
        header('Location: user_add.php?error=Lỗi ' . $username . ' hoặc ' . $email . ' đã tồn tại.');
    } else {
        $sql_insert = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password1')";
        if (mysqli_query($conn, $sql_insert) === TRUE) {
            header('Location: users.php?message=Thêm người dùng thành công');
        }
    }
    mysqli_close($conn);
}
