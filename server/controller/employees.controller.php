<?php
    require "../config.php";
    function getAllEmployees(){
        $con = getDBConnection();
        $result = $con->query("SELECT DISTINCT e.EmployeeID, e.FullName, e.Address, e.Email, e.MobilePhone, e.Position,e. Avatar, d.DepartmentName from employees as e JOIN departments as d ON e.DepartmentID = d.DepartmentID");
        
        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        else{
            return null;
        }
    }
    echo json_encode(getAllEmployees());
?>