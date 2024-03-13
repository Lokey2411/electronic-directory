<?php
require "../config.php";
function handleSearch($item)
{
    $employeeQuery = "SELECT DISTINCT e.EmployeeID, e.FullName, e.Email, e.MobilePhone, e.Position, d.DepartmentName, e.DepartmentID as ParentDepartmentID
    FROM `employees` AS e 
    INNER JOIN `departments` AS d 
    ON e.DepartmentID = d.DepartmentID 
    WHERE e.`FullName` LIKE '%$item%' or 
    e.`Email` LIKE '%$item%' or 
    e.`MobilePhone` LIKE '%$item%' or 
    d.DepartmentName LIKE '%$item%' 
    ORDER BY `EmployeeID` ASC";
    $employeeResult = queryCommand($employeeQuery);
    $departmentQuery = "SELECT DISTINCT d.*, p.DepartmentName as ParentDepartmentName 
    FROM `departments` AS d 
    INNER JOIN `departments` AS p 
    ON d.ParentDepartmentID = p.DepartmentID 
    WHERE d.`DepartmentName` LIKE '%$item%' 
    AND d.`ParentDepartmentID` != 0
    ORDER BY d.`DepartmentID` ASC";
    $departmentResult = queryCommand($departmentQuery);
    while ($employee = $employeeResult->fetch_assoc()) {
        $resultEmployeeAssoc[] = $employee;
    }
    while ($department = $departmentResult->fetch_assoc()) {
        $resultDepartmentAssoc[] = $department;
    }
    $result = [
        "employees" => $resultEmployeeAssoc,
        "departments" => $resultDepartmentAssoc
    ];
    return json_encode($result);
}
$item = isset($_GET['item']) ? $_GET['item'] : '';
echo handleSearch($item);
if (isset($_GET['action']) && $_GET["action"] == "getAll") {

} else {
    // navigate(BASE_URL . '?controller=Pages&action=Search&item=' . $item);
}