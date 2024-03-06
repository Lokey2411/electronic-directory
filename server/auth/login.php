<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        require "../config.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = queryCommand("SELECT * from users where username = $username and password = $password");
        $num = mysqli_num_rows($result)
        if($num>0){
            $user = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $username;
            header("location: ../client/home.php?username={$user['username']}&email={$user['email']}&age={$user['age']}");
        }
    }
?>