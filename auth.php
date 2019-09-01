<?php
    include_once 'lib/Database.php';
    include_once 'lib/Session.php';
    Session::init();
    $db = new Database();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = "select * from tbl_users WHERE username ='$username' AND password ='$password'";
        $result = $db ->select($query);
        if($result !=false){
            $value = mysqli_fetch_array($result);
            $userType = $value['role'];
            $row = mysqli_num_rows($result);
            if($row>0){

                if($userType == 'admin'){
                    Session::set("login",true);
                    Session::set("username",$value['username']);
                    Session::set("id",$value['id']);
                    header("Location:admin_page.php"); // This line triggers a redirect if the user_type is admin
                } elseif($userType == 'user') {
                    Session::set("login",true);
                    Session::set("username",$value['username']);
                    Session::set("id",$value['id']);
                    header('location:dashboardexam.php'); // This line triggers for other user_types
                }else{
                    echo "User not found";  
                }
               
            // }else{
            // echo "User not found";
            // header('location:onlinefirst.php');
        }

    }
}
