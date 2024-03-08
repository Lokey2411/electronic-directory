<?php
    require_once "../config.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // handle some post request\
        $type = $_POST['type'];
        $action = $_POST['action'];
        if($type!=="departments"){
            
        }
    }
    else{
        if(isset($_GET['id'])) {
            // handle get user information
            $id = $_GET['id'];
            $result = queryCommand("SELECT * from employees where EmployeeID = $id");
            if($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                header('Content-Type: application/json');
                echo json_encode($user);
            }
        }
        else {
            // handle get all user
            $result = queryCommand("SELECT * from employees");
            if($result->num_rows > 0) {
                $users = array();
                while($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
                header('Content-Type: application/json');
                echo json_encode($users);
            }
        }
    }
?>