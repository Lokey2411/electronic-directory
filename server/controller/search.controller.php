<?php
require "../config.php";
function handleSearch($item)
{
    $employeeQuery = "SELECT DISTINCT e.FullName, e.Email, e.MobilePhone, d.DepartmentName, e.Avatar FROM `employees` AS e INNER JOIN `departments` AS d ON e.DepartmentID = d.DepartmentID WHERE e.`FullName` LIKE '%$item%' or e.`Email` LIKE '%$item%' or e.`MobilePhone` LIKE '%$item%' or d.DepartmentName LIKE '%$item%' ORDER BY `EmployeeID` ASC";
    $employeeResult = queryCommand($employeeQuery);
    $departmentQuery = "SELECT DISTINCT d.DepartmentName, d.Address, d.Email, d.Phone, d.Website, d.Logo, p.DepartmentName as ParentDepartmentName FROM `departments` AS d INNER JOIN `departments` AS p ON d.ParentDepartmentID = p.DepartmentID WHERE d.`DepartmentName` LIKE '%$item%' ORDER BY d.`DepartmentID` ASC";
    $departmentResult = queryCommand($departmentQuery);
    $result = ["employees" => $employeeResult->fetch_all(), "departments" => $departmentResult->fetch_all()];
    return json_encode($result);
}

$item = isset($_GET['item']) ? $_GET['item'] : '';
echo handleSearch($item);
// navigate(BASE_URL . '?controller=Pages&action=Search&item=' . $item);