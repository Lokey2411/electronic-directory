<?php
require "../config.php";
function getEmployeeByID($id)
{
    $sql = "SELECT * FROM employees where EmployeeID = $id";
    $result = queryCommand($sql);
    $num = $result->num_rows;
    if ($num > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}
if (isset($_GET["id"]))
    echo json_encode(getEmployeeByID($_GET["id"]));
else
    echo json_encode(getAllEmployees());