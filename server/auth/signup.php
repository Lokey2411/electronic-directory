<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){  
    include '../config.php';
    $response = BASE_URL.'/?controller=Authentication&action=SignUp';
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $employeeId = $_POST['employeeId'];
        $role = isset($_POST['Role'])?$_POST['Role']:'User';
        $result = queryCommand("SELECT * FROM employees WHERE EmployeeID = '$employeeId' ");
        $num = mysqli_num_rows($result);
        if($num>0){ 
            $result = queryCommand("SELECT * FROM users WHERE username = '$username' or EmployeeID = '$employeeId' ");
            $num = mysqli_num_rows($result);
            if($num>0){
                navigate($response.'&error=Tên đăng nhập đã tồn tại hoặc nhân viên đã tồn tại tài khoản');
            }
            else{  
                $result = queryCommand("INSERT INTO users(username, Password, Role, EmployeeID) VALUES('$username', '$password', '$role', $employeeId)");
                if($result){
                    navigate($response.'&message=Tạo tài khoản thành công');
                }
                else{
                    navigate($response.'&error=Có lỗi khi tạo tài khoản');
                }
            }
        }
        }
        else{
            navigate($response.'&error=Nhân viên không tồn tại');
        }
    }
    else{
        header("Location: $response?error=Vui lòng nhập đầy đủ thông tin");
    }