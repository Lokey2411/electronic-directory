<?php
    require "../config.php";
    function getAllEmployees(){
        $con = getDBConnection();
        $result = $con->query("SELECT * FROM employees");
        
        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        else{
            return null;
        }
    }
    echo json_encode(getAllEmployees());
?>