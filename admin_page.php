<?php
session_start();
include_once 'lib/Database.php';
$message = $_SESSION['message'] ?? null;
?>
<!-- <?php
if(isset($_SESSION['email'],$_SESSION['id'])){
    $_SESSION['message'] = "You have to logout first";
    header('location:dashboardexam.php');
    exit();
}
?> -->
<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
<!--
 font-family: 'Montserrat', sans-serif;
font-family: 'Open Sans', sans-serif;
-->

</head>
<body>

<div class="container">
    <table>
      <tr>
        <td>
          <div >
              <a href="index.php" class="btn btn-success" style="margin-top:15px;">Back</a>
          </div>
        </td>
        <td>
          <div >
              <a href="result_details.php" class="btn btn-info" style="margin-top:15px; margin-left:10px;">Student result details</a>
          </div>
        </td>
      </tr>
    </table>
    <h1 class="text-center"> For one submission of question table , 4 times submit ans table </h1><br>
    <?php if(isset($message)):?>
                <div class="alert alert-info">
                    <?php echo "$message"; ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="card-header text-center">Question table </h4>
                    <br>
                </div>
                <div class="panel-body">
                    <form action="que.php" method="post">
                        <!-- <div class="form-group">
                            <label for="user "> Q_id: </label>
                            <input type="text" name="q_id" id="user" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label for="question "> Question: </label>
                            <input type="text" name="question" id="question" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ans_id "> Ans_id: </label>
                            <input type="text" name="ans_id" id="ans_id" class="form-control">
                        </div>
                        <button class="btn btn-success d-block m-auto" type="submit"> Que Submit </button>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="text-center"> Answer Table </h4>
                <br>
                </div>
                <div  class="panel-body">
                <form action="ans.php" method="post">
                        <!-- <div class="form-group">
                            <label for="a_id"> A_id: </label>
                            <input type="text" name="a_id" id="a_id" class="form-control">
                        </div> -->
                        <div class="form-group">
                            <label for="answer">Answer: </label>
                            <input type="text" name="answer" id="answer" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ans_id "> Ans_id: </label>
                            <input type="text" name="ans_id" id="ans_id" class="form-control">
                        </div>
                    <button class="btn btn-info d-block m-auto" type="submit"> Ans Submit </button>
                    <div class="duplicate"> </div>
                </form>
                </div>

            </div>
        </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>
