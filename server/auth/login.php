<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        require "../config.php";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = queryCommand("SELECT * from users where username = $username and password = $password");
        $num = mysqli_num_rows($result){
            
        }
    }
?>