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
                    $result = queryCommand("SELECT DISTINCT e.EmployeeID, e.FullName, e.Address, e.Email, e.MobilePhone, e.Position, d.DepartmentName from employees as e JOIN departments as d ON e.DepartmentID = d.DepartmentID");
                if($result->num_rows > 0) {
                    $users = array();
                    while($row = $result->fetch_assoc()) {
                        $users[] = $row;
                    }
                    header('Content-Type: application/json');
                    echo json_encode($users);
                }
                else {
                    echo "[]";
                }
    }
    function getAllDepartments(){
        $sql = "SELECT d.DepartmentID, d.DepartmentName, d.Address, d.Email, d.Phone,d.Website, p.DepartmentName as ParentDepartmentName FROM departments as d join departments as p on d.DepartmentID = p.DepartmentID;";
        $result = queryCommand($sql);
        if($result->num_rows > 0) {
            $users = array();
            while($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            header('Content-Type: application/json');
            echo json_encode($users);
        }
        else {
            echo "[]";
        }
    }
    function insertEmployee(){
            $requestUrl = BASE_URL."?controller=Admin&action=TableUserList";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phoneNumber = $_POST['phoneNumber'];
            $position = $_POST['position'];
            $department = $_POST['department'];
            $sql = "INSERT INTO employees (FullName, Email, Address, MobilePhone, Position, DepartmentID) VALUES ('$name', '$email', '$address', '$phoneNumber', '$position', $department)";
            $result = queryCommand($sql);
            if($result){
                header("Location: $requestUrl&message=Thêm thành công");
            }
            else {
                header("Location: $requestUrl&error=Thêm thất bại");
            }
    }
    function insertDepartment(){
        $requestUrl = BASE_URL."?controller=Admin&action=TableUserList";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];
        $website = $_POST['website'];
        $department = $_POST['department'];
        $sql = "INSERT INTO departments (DepartmentName, Email, Address, Phone, Website, ParentDepartmentID) VALUES ('$name', '$email', '$address', '$phoneNumber', '$website', $department)";
        $result = queryCommand($sql);
        if($result){
            header("Location: $requestUrl&message=Thêm thành công");
        }
        else {
            header("Location: $requestUrl&error=Thêm thất bại");
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // handle some post request\
        session_start();
        if(isset($_SESSION["Role"])&&$_SESSION["Role"] == "Admin") {
            $action = $_GET['action'];
            switch($action) {
                case "insertEmployee":
                    insertEmployee();
                    break;
                case "insertDepartment":
                    insertDepartment();
                    break;
                default:
                    break;
            }
        }
    }
    else{
        if(isset($_GET['id'])) {
            // handle get user information
            getUserInformation();
        }
        if(isset($_GET['action'])) {
            switch($_GET['action']) {
                case 'getAllUsers':
                    getAllEmployees();
                    break;
                case 'deleteEmployee':
                $requestUrl = BASE_URL."?controller=Admin&action=TableUserList";
                $id = $_GET['id'];
                echo $id;
                $result = queryCommand("DELETE FROM users WHERE EmployeeID = $id");
                if(queryCommand("
                DELETE FROM employees WHERE EmployeeID = $id")){
                    header("Location: $requestUrl&message=Delete%20Successfully");
                }
                else {
                    header("Location: $requestUrl&error=Delete%2");
                }
                break;
                case 'getAllDepartments':
                    getAllDepartments();
                    break;
                case 'deleteDepartment':
                $requestUrl = BASE_URL."?controller=Admin&action=TableUserList";
                $id = $_GET['id'];
                // delete department and employees
                // delete employees first then department
                // delete users then delete employees
                $sql = [
                    "DELETE FROM users WHERE EmployeeID IN (SELECT EmployeeID FROM employees WHERE DepartmentID = $id)",
                    "DELETE FROM employees WHERE DepartmentID = $id",
                    "UPDATE departments SET ParentDepartmentID = 1  WHERE ParentDepartmentID = $id",//delete childs
                    "DELETE FROM departments WHERE DepartmentID = $id",
                ];
                $result = "";
                foreach($sql as $query) {
                    $result = queryCommand($query);
                    if(!$result) {
                        header("Location: $requestUrl&error=Delete%failed");
                        break;
                    }
                }
                header("Location: $requestUrl&message=Delete%20Successfully");
                default:
                // echo "[]";
                break;
            }
        }
        // handle get all user
    }
?>