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
<style type="text/css">
	.animateuse{
			animation: leelaanimate 0.5s infinite;
		}

@keyframes leelaanimate{
			0% { color: red },
			10% { color: yellow },
			20%{ color: blue }
			40% {color: green },
			50% { color: pink }
			60% { color: orange },
			80% {  color: black },
			100% {  color: brown }
		}
</style>
</head>
<body>

<div class="container">
    <h1 class="text-center text-success text-uppercase animateuse"> <?php echo $username; ?> Dashboard</h1><br>
    
    <br><br><br><br>
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	
            <?php
                if(isset($_POST['submit'])){
                    if(!empty($_POST['quizcheck'])){
                        $count = count($_POST['quizcheck']);
                        
                        $right_answer =0;
                        $i=1;
                        $selected = $_POST['quizcheck'];
            
                        //print_r ($selected);
                        $query = "select * from tbl_question";
                        $que = $db ->select($query);
                        if($que){
                        while($result = $que->fetch_assoc()){
                            $checked = $result['ans_id'] ==  $selected[$i];
                            if($checked){
                                $right_answer ++;
                            }
                            $i++;
                    }
                    
            
                }
                }
                
            }
            ?>
            <tr>
		      	<td>
		      		Questions Attempted
                  </td>
                <td>
                    <?php  echo $count." questions";?>
                </td>
        </tr>
            <tr>
    			<td>
    				Your right answer
    			</td>
    			<td colspan="2">
                <?php  echo $right_answer." answer is right";?>
	          </td>
            </tr>
            <?php 
            $query = "INSERT INTO tbl_user(user_name,total_ques,correct_answer) VALUES('$username','6','$right_answer')";
            $InsertRow = $db->insert($query);
                // if($InsertRow>0) {
                //     //echo "";
                // }else{
                //     echo "";
                // }
                ?>
            </table>
         <div>
             <a href="dashboardexam.php" class="btn btn-dark">Back To Question page</a>
         </div>
</div>

</body>
</html>
<!-- 
    if(isset($_POST['submit'])){
        if(!empty($_POST['quizcheck'])){
            $count = count($_POST['quizcheck']);
            echo "You attempt out of five : ".$count." questions";
            $right_answer =0;
            $i=1;
            $selected = $_POST['quizcheck'];

            print_r ($selected);
            $query = "select * from tbl_question";
            $que = $db ->select($query);
            if($que){
            while($result = $que->fetch_assoc()){
                $checked = $result['ans_id'] ==  $selected[$i];
                if($checked){
                    $right_answer ++;
                }
                $i++;
        }
        echo "your ".$right_answer." answer is right";

    }

    }
    $query = "INSERT INTO tbl_user(user_name,total_ques,correct_answer) VALUES('$username','5','$right_answer')";
    $InsertRow = $db->insert($query);
        // if($InsertRow>0) {
        //     //echo "";
        // }else{
        //     echo "";
        // }
}
?> -->