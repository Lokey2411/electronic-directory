<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "electronic-phonebook";
    $con = mysqli_connect($host, $user, $password, $db) or die("Something went wrong". mysqli_connect_error());
    function queryCommand($sql){
        // excute sql 
        global $con;
        $result = mysqli_query($con,$sql);
        return $result;
    }
    function createTables(){
        // create tables if not exists
        queryCommand("create table if not exists");
    }
    createTables();
?>