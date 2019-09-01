<?php include 'helpers/Format.php';
session_start();
$username = $_SESSION['username'] ?? null;
$id = $_SESSION['id'] ?? null;
?>
<?php include 'lib/Student.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
  $("form").submit(function() {
    var roll=true;
    $(':radio').each(function () {
      name = $(this).attr('name');
      if(roll && !$(':radio[name="'+name+'"]:checked').length){
        //$('.alert').show();
        alert(name+"Roll Missing!");
        roll = false;
      }
    });
    return roll;
  });
});
</script>
<?php
error_reporting(0);
$fm = new Format();
$student = new Student();
$cur_date = date('Y-m-d');
if($_SERVER['REQUEST_METHOD']=="POST"){
  $attend = $_POST['attend'];
  $insertAttend = $student->insertAttendence($cur_date,$attend);
  if($insertAttend==true){
    echo $insertAttend;
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Student Attendence System</title>
  <link rel="stylesheet" href="additional/bootstrap.min.css">
  <script type="text/javascript" src="additional/bootstrap.min.js"></script>
  <script type="text/javascript" src="additional/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="header text-center mt-2 bg-info my-4" style="padding:15px; color:#fff;">
      <h2>Student Attendence System</h2>
    </div>
    <div class='alert alert-danger' style="display:none;"><strong>Error!</strong>Student Roll missing!</div>
    <div class="card">
      <div class="card-header">
        <h2>
          <a href="add.php" class="btn btn-success"style="float:left; overflow:auto;">Add Student</a>
          <a href="date_view.php" class="btn btn-info" style="float:right;overflow:auto;">View All</a>
        </h2>
      </div>
      <div class="card-body">
        <div class="text-center" style="font-size:18px;">
          <strong>Date : </strong><?php  echo $cur_date; ?>
        </div>
        <form class="mt-2" action="" method="post">
          <table class="table table-striped">
            <tr>
              <th>Roll</th>
              <th>Student name</th>
              <th>Class</th>
              <th>Section</th>
              <th>Attendence</th>
            </tr>
            <?php
            $get_student = $student->getstudent();
            if($get_student){
              while($value = $get_student->fetch_assoc()){
                ?>
                <tr>
                  <td><?= $value['roll']; ?></td>
                  <td><?= $value['name']; ?></td>
                  <td><?= $value['class']; ?></td>
                  <td><?= $value['section']; ?></td>
                  <td>
                    <input type="radio" name="attend[<?= $value['roll']; ?>]" value="present">Present
                    <input type="radio" name="attend[<?= $value['roll']; ?>]" value="absent">Absent
                  </td>
                </tr>
              <?php }} ?>

              <tr>
                <td>
                  <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                </td>
                <td>
                  <a href="logout2.php" class="btn btn-success" >Logout</a>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </body>
  </html>
