<?php
function getAllDepartments(){
    $conn = mysqli_connect('localhost', 'root', '0123456789', 'electronic_phonebook');
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM Departments";

    $result = mysqli_query($conn, $sql);

    $Departments = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $Departments[] = $row;
        }
    }

    mysqli_close($conn);
    return $Departments;
}

function getAllEmployees(){
    $conn = mysqli_connect('localhost', 'root', '0123456789', 'electronic_phonebook');
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM Employees";

    $result = mysqli_query($conn, $sql);

    $Employees = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $Employees[] = $row;
        }
    }

    mysqli_close($conn);
    return $Employees;
}

function getAllUsers(){
    $conn = mysqli_connect('localhost', 'root', '0123456789', 'electronic_phonebook');
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM Users";

    $result = mysqli_query($conn, $sql);

    $Users = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $Users[] = $row;
        }
    }

    mysqli_close($conn);
    return $Users;
}