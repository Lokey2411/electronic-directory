<?php
    require_once "../config.php";
    function getUserInformation(){
        $id = $_GET['id'];
            $result = queryCommand("SELECT * from employees where EmployeeID = $id");
            if($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                header('Content-Type: application/json');
                echo json_encode($user);
            }
    }
    function getAllEmployees(){
                    
    }
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
            getUserInformation();
        }
        else {
            // handle get all user
            if(isset($_GET['action']) && $_GET['action'] == "getAllUsers") {
                $result = queryCommand("SELECT DISTINCT e.EmployeeID, e.FullName, e.Address, e.Email, e.MobilePhone, e.Position, e.Avatar, d.DepartmentName from employees as e JOIN departments as d ON e.DepartmentID = d.DepartmentID");}
                if($result->num_rows > 0) {
                    $users = array();
                    while($row = $result->fetch_assoc()) {
                        $users[] = $row;
                    }
                    header('Content-Type: application/json');
                    echo json_encode($users);
            }
            else{
                
                echo "[]";
            }
        }
    }
?>