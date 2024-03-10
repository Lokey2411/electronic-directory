<?php
    require_once '../config.php';
    // Hàm lấy danh sách bộ phận
    function getDepartments(){
        global $con;
        $sql = "SELECT d.*, p.DepartmentName as ParentDepartmentName FROM departments as d join departments as p on d.DepartmentID = p.DepartmentID;";
        $result = $con->query($sql);
        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        else{
            return null;
        }
    }
    echo json_encode(getDepartments());
?>