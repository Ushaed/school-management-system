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
<title>Teacher login</title>

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

<div class="container" style="margin-top:35px;">

    <?php if(isset($message)):?>
                <div class="alert alert-info">
                    <?php echo "$message"; ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="card-header text-center">Admin Login Form </h4>
                    <br>
                </div>
                <div class="panel-body mt-5 ">
                    <form action="admin_auth.php" method="post">
                        <div class="form-group">
                            <label for="user "> Username: </label>
                            <input type="text" name="name" id="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pass "> Password: </label>
                            <input type="text" name="password" id="pass" class="form-control">
                        </div>
                        <button class="btn btn-success d-block m-auto" type="submit"> SignIn </button>
                    </form>
                </div>

            </div>
        </div>

        </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>
