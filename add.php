<?php include 'helpers/Format.php'; ?>
<?php include 'lib/Student.php'; ?>
<?php
$fm = new Format();
$student = new Student();
if($_SERVER['REQUEST_METHOD']=="POST"){
$roll = $_POST['roll'];
$name = $_POST['name'];
$class = $_POST['class'];
$section = $_POST['section'];
$insertData = $student->insertStudent($roll,$name,$class,$section );
if($insertData==true){
echo $insertData;
header('location:attendence.php');
}
}
?>
<?php

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
          <a href="add.php" class="btn btn-success"style="float:left; overflow:auto;">Add Student</a>
          <a href="attendence.php" class="btn btn-info" style="float:right;overflow:auto;">Back</a>
        </h2>
      </div>
      <div class="card-body">
        <form class="mt-2" action="" method="post">


          <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter Student Roll">
          </div>
          <div class="form-group">
            <label for="name">Student name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Student name">
          </div>
          <div class="form-group">
            <label for="class">Student Class</label>
            <input type="text" class="form-control" id="class" name="class" placeholder="Student class">
          </div>
          <div class="form-group">
            <label for="section">Student Section</label>
            <input type="text" class="form-control" id="section" name="section" placeholder="Student section">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>

        </form>
      </div>
    </div>
  </div>
</body>
</html>
