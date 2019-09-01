<?php
session_start();
include_once 'lib/Database.php';
$message = $_SESSION['message'] ?? null;
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Result details part</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h2>Result sheet of Students</h2>
  <table class="table">
    <thead>
      <tr>
        <th>username</th>
        <th>Total question</th>
        <th>Correct Answer</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "select * from tbl_user";
      $result = $db ->select($query);
      if($result !=false){
        while ($value = mysqli_fetch_array($result)) {

       ?>
      <tr>
        <td><?= $value['user_name']; ?></td>
        <td><?= $value['total_ques']; ?></td>
        <td><?= $value['correct_answer']; ?></td>
      </tr>
    <?php }} ?>
    </tbody>
  </table>
  <div >
      <a href="admin_page.php" class="btn btn-success" style="margin-top:15px;">Back</a>
  </div>
    </div>
  </body>
</html>
