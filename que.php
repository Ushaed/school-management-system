<?php
    include_once 'lib/Database.php';
    $db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
        //$q_id = $_POST['q_id'];
        $question = $_POST['question'];
        $ans_id = $_POST['ans_id'];
        $query = "INSERT INTO tbl_question(question,ans_id) VALUES('$question','$ans_id')";
        $InsertRow = $db->insert($query);
        if($InsertRow>0) {
            echo "Data Inserted Successfully to the database";
        }else{
            echo "Something went wrong !";
        }
        header('location:admin_page.php');
}