<?php
require_once "../config.php";

function insertEmployee()
{
    $requestUrl = BASE_URL . "?controller=Admin&action=TableUserList";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $phoneNumberIsValid = strlen(preg_replace("/[^\d]/", "", $phoneNumber)) == 10 || strlen(preg_replace("/[^\d]/", "", $phoneNumber)) == 11;
    $isValid = $phoneNumberIsValid;
    if (!$isValid) {
        if (!$phoneNumberIsValid) {
            navigate($requestUrl . "&error=Số điện thoại không hợp lệ");
        }
        return;
    }
    $sql = "INSERT INTO employees (FullName, Email, Address, MobilePhone, Position, DepartmentID) VALUES ('$name', '$email', '$address', '$phoneNumber', '$position', $department);";
    $result = queryCommand($sql);
    if ($result) {
        header("Location: $requestUrl&message=Thêm thành công");
    } else {
        header("Location: $requestUrl&error=Thêm thất bại");
    }
}
function insertDepartment()
{
    $requestUrl = BASE_URL . "?controller=Admin&action=TableUserList";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $website = $_POST['website'];
    $department = $_POST['department'];
    $phoneNumberIsValid = strlen(preg_replace("/[^\d]/", "", $phoneNumber)) == 10 || strlen(preg_replace("/[^\d]/", "", $phoneNumber)) == 11;
    $isValid = $phoneNumberIsValid;
    if (!$isValid) {
        if (!$phoneNumberIsValid) {
            navigate($requestUrl . "&error=Số điện thoại không hợp lệ");
        }
        return;
    }
    $sql = "SELECT * FROM departments WHERE DepartmentName = '$name'";
    $result = queryCommand($sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO departments (DepartmentName, Email, Address, Phone, Website, ParentDepartmentID) VALUES ('$name', '$email', '$address', '$phoneNumber', '$website', $department)";
        $result = queryCommand($sql);
        if ($result) {
            header("Location: $requestUrl&message=Thêm thành công");
        } else {
            header("Location: $requestUrl&error=Lỗi truy vấn, thêm thất bại");
        }
    } else
        navigate($requestUrl . "&error=Thêm thất bại, phòng ban $name đã tồn tại");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // handle some post request\
    session_start();
    if (isset($_SESSION["Role"]) && $_SESSION["Role"] == "Admin") {
        $action = $_GET['action'];
        switch ($action) {
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
} else {
    if (isset($_GET['id'])) {
        // handle get user information
        getUserInformation();
    }
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'getAllUsers':
                echo json_encode(getAllEmployees());
                break;
            case 'deleteEmployee':
                $requestUrl = BASE_URL . "?controller=Admin&action=TableUserList";
                $id = $_GET['id'];
                echo $id;
                $result = queryCommand("DELETE FROM users WHERE EmployeeID = $id");
                if (
                    queryCommand("
                DELETE FROM employees WHERE EmployeeID = $id")
                ) {
                    header("Location: $requestUrl&message=Delete%20Successfully");
                } else {
                    header("Location: $requestUrl&error=Delete%2");
                }
                break;
            case 'getAllDepartments':
                echo json_encode(getAllDepartments());
                break;
            case 'deleteDepartment':
                $requestUrl = BASE_URL . "?controller=Admin&action=TableUserList";
                $id = $_GET['id'];
                // delete department and employees
                // delete employees first then department
                // delete users then delete employees
                $sql = [
                    "UPDATE employees SET DepartmentID = 0 WHERE DepartmentID = $id",
                    "UPDATE departments SET ParentDepartmentID = 0  WHERE ParentDepartmentID = $id",
                    "DELETE FROM departments WHERE DepartmentID = $id",
                ];
                $result = "";
                foreach ($sql as $query) {
                    $result = queryCommand($query);
                    if (!$result) {
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