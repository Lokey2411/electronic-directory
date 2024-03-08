<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        require "../config.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = queryCommand("SELECT * from users where username = '$username' and password ='$password'");
        $num = mysqli_num_rows($result);
        if($num>0){
            $user = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION["EmployeeID"] = $user["EmployeeID"];
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["Role"] = $user["Role"];
            echo json_encode(array('status' => 'success'));
            navigate(BASE_URL."");
        }
        else{
            // echo BASE_URL."/?controller=Authentication&action=LoginUser";
            header("location:".BASE_URL."/?controller=Authentication&action=LoginUser&error=Sai tên đăng nhập hoặc mật khẩu");
        }
    }
?>