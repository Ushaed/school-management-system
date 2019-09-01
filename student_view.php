<?php include 'helpers/Format.php'; ?>
<?php include 'lib/Student.php'; ?>
<?php
//error_reporting(0);
$fm = new Format();
$student = new Student();
$dt =$_GET['dt'];
if($_SERVER['REQUEST_METHOD']=="POST"){
  $attend = $_POST['attend'];
  $att_update = $student->updateAttendence($dt,$attend);
  if($att_update==true){
    echo $att_update;
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
    <div class="header text-center mt-2 bg-info my-4" style="padding:10px; color:#fff;">
      <h2>Student Attendence System</h2>
    </div>
    <div class="card">
      <div class="card-header">
        <h2>
          <a href="date_view.php" class="btn btn-info" style="float:left;overflow:auto;">Back</a>
        </h2>
      </div>
      <div class="card-body">
        <div class="text-center" style="font-size:18px;">
          <strong>Date : </strong><?php  echo $dt; ?>
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
            $get_student = $student->getAllData($dt);
            if($get_student){
              while($value = $get_student->fetch_assoc()){
                ?>
                <tr>
                  <td><?= $value['roll']; ?></td>
                  <td><?= $value['name']; ?></td>
                  <td><?= $value['class']; ?></td>
                  <td><?= $value['section']; ?></td>
                  <td>
                    <input type="radio" name="attend[<?= $value['roll']; ?>]" value="present" <?php if($value['attend']=="present"){echo "checked";} ?>>Present
                    <input type="radio" name="attend[<?= $value['roll']; ?>]" value="absent" <?php if($value['attend']=="absent"){echo "checked";} ?>>Absent
                  </td>
                </tr>
              <?php }} ?>


                <tr>
                  <!-- <td>
                    <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                  </td> -->
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </body>
    </html>
