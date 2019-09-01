<?php
    include_once 'lib/Database.php';
    $db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
        //$q_id = $_POST['q_id'];
        $answer = $_POST['answer'];
        $ans_id = $_POST['ans_id'];
        $query = "INSERT INTO tbl_answer(answer,ans_id) VALUES('$answer','$ans_id')";
        $InsertRow = $db->insert($query);
        if($InsertRow>0) {
            echo "Data Inserted Successfully to the database";
        }else{
            echo "Something went wrong !";
        }
        header('location:admin_page.php');
}