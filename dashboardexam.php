<?php
session_start();
$username = $_SESSION['username'] ?? null;
$id = $_SESSION['id'] ?? null;
include_once 'lib/Database.php';
$db = new Database();
?>
<?php
if(!isset($_SESSION['username'],$_SESSION['id'])){
    $_SESSION['message'] = "You have to login first";
    header('location:onlinefirst.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <title>Online exam</title>
</head>
<body>
<div class="container">
    <h1 class="text-center text-primary">Welcome to Online Exam Page</h1>
    <div class="alert alert-info">
        you are logged in as, <?php echo $username; ?>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="text-center">Welcome <?php echo $username; ?> you have to choose one out of four checkbox</h4>
    </div>
    <form action="check.php" method="post">
    <?php
    for($i=1;$i<10;$i++){
      $query = "select * from tbl_question where q_id=$i";
      $que = $db ->select($query);
      if($que){
          while($result = $que->fetch_assoc()){
      ?>
       <div class="panel panel-default">
            <div class="panel-heading">
                <span><?php echo $i.'. '.$result['question']; ?></span>
            </div>
            <?php
                $query = "select * from tbl_answer where ans_id=$i";
                $ans = $db ->select($query);
                if($ans){
                while($result = $ans->fetch_assoc()){
                    
            ?>
                <div class="panel-body">
                    <input type="radio" name="quizcheck[<?php echo $result['ans_id']; ?>]" value="<?php echo $result['a_id'];?>">
                    <?php echo $result['answer']; ?>
                </div>
                <?php }}?>
    <?php }} ?>
 <?php } ?>
 <br>
 <br>
        <input type="submit" name="submit" Value="Ans Submit Here" class="btn btn-success">
    </form>
    </div>
    </div>
    <a href="logout.php?logout=<?php echo $id; ?>" class="btn btn-danger">Logout</a>
   </div>  
</body>
</html>