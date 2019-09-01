<?php
    include_once 'lib/Database.php';
    $db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $query = "INSERT INTO tbl_teacher(name,password) VALUES('$name','$password')";
        $InsertRow = $db->insert($query);
        if($InsertRow>0) {
            echo "Data Inserted Successfully to the database";
            header('location:index.php');
        }else{
            echo "Something went wrong !";
        }
        //header('location:onlinefirst.php');
}