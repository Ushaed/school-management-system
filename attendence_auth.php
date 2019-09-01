<?php
    include_once 'lib/Database.php';
    include_once 'lib/Session.php';
    Session::init();
    $db = new Database();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $password =$_POST['password'];
        $query = "select * from tbl_teacher WHERE name ='$name' AND password ='$password'";
        $result = $db ->select($query);
        if($result !=false){
            $value = mysqli_fetch_array($result);
            $row = mysqli_num_rows($result);
            if($row>0){
                    Session::set("login",true);
                    Session::set("name",$value['name']);
                    Session::set("id",$value['id']);
                    header("Location:attendence.php"); // THIS LINE TRIGGERS A REDIRECT IF THE USER_TYPE IS ADMIN
                } 
                }
                else{
                    header("Location:attendencefirst.php");

    }
}
