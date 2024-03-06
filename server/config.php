<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "electronic_phonebook";

    // Tạo kết nối
    $con = mysqli_connect($host, $user, $password);

    // Kiểm tra kết nối
    if (!$con) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Cố gắng tạo cơ sở dữ liệu
    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    if (mysqli_query($con, $sql)) {
        echo "CreateDB successfully";
    } else {
        echo "Error creating database: " . mysqli_error($con);
    }

    // Chọn cơ sở dữ liệu
    mysqli_select_db($con, $db);
    function getConnection(){
        global $con;
        return $con;
    }
    function queryCommand($sql){
        // excute sql 
        global $con;
        $result = mysqli_query($con,$sql);
        if(!$result){
            die("Something went wrong when run query: ". $sql. ": " . mysqli_error($con));
        }
        return $result;
    }
    function createTables(){
        // create tables if not exists
        queryCommand("create table if not exists Departments(
            `DepartmentID` INT NOT NULL AUTO_INCREMENT ,
            `DepartmentName` VARCHAR(255) NOT NULL ,
            `Address` VARCHAR(255) NOT NULL ,
            `Email` VARCHAR(255) NOT NULL ,
            `Phone` VARCHAR(255) NOT NULL , 
            `Logo` VARCHAR(255) NULL , 
            `Website` VARCHAR(255) NULL , 
            `ParentDepartmentID` INT NOT NULL , 
            PRIMARY KEY (`DepartmentID`),
            FOREIGN KEY (`ParentDepartmentID`) REFERENCES Departments(`DepartmentID`)
            ) ENGINE = InnoDB;");
            queryCommand("create table if not exists Employees(
            `EmployeeID` INT NOT NULL AUTO_INCREMENT ,
            `FullName` VARCHAR(255) NOT NULL , `Address` VARCHAR(255) NOT NULL , 
            `Email` VARCHAR(255) NOT NULL , 
            `MobilePhone` VARCHAR(255) NOT NULL , 
            `Position` VARCHAR(255) NOT NULL , 
            `Avatar` VARCHAR(255) NULL,
            `DepartmentID` INT NOT NULL ,
            PRIMARY KEY (`EmployeeID`),
            FOREIGN KEY (`DepartmentID`) REFERENCES Departments(`DepartmentID`)
            )
            ENGINE = InnoDB;
        ");
        queryCommand("create table if not exists Users
            (
            `username` VARCHAR(255) NOT NULL , 
            `Password` VARCHAR(255) NOT NULL , 
            `Role` VARCHAR(255) NOT NULL , 
            `EmployeeID` INT NOT NULL , 
            PRIMARY KEY (`username`),
            FOREIGN KEY (`EmployeeID`) REFERENCES Employees(`EmployeeID`)
            )
        ");          
    }
?>