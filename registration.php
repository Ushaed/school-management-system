<?php
    include_once 'lib/Database.php';
    $db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = "INSERT INTO tbl_users(username,password) VALUES('$username','$password')";
        $InsertRow = $db->insert($query);
        if($InsertRow>0) {
            echo "Data Inserted Successfully to the database";
        }else{
            echo "Something went wrong !";
        }
        header('location:onlinefirst.php');
}