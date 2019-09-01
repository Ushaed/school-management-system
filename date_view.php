<?php include 'helpers/Format.php'; ?>
<?php include 'lib/Student.php'; ?>

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
          <a href="attendence.php" class="btn btn-info" style="float:right;overflow:auto;">Take Attendence</a>
        </h2>
      </div>
      <div class="card-body">

        <form class="mt-2" action="" method="post">
          <table class="table table-striped">
            <tr>
              <th>Serial</th>
              <th>Attendence Date</th>
              <th>Action</th>
            </tr>
            <?php
            $student = new Student();
            $get_date = $student->getDateList();
            if($get_date){
              $i = 0;
              while($value = $get_date->fetch_assoc()){
                $i++;
                ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $value['att_time']; ?></td>
                  <td>
                    <a class="btn btn-primary" href="student_view.php?dt=<?= $value['att_time']; ?>">View</a>
                  </td>
                </tr>
              <?php }} ?>

              <tr>
                <td>
                  <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </body>
  </html>
