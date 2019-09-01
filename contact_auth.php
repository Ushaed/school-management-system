<?php
 include_once 'lib/Database.php';
 include_once 'lib/Session.php';
 include_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
 include_once 'vendor/autoload.php';
 Session::init();
 $db = new Database();
 if($_SERVER['REQUEST_METHOD']=='POST'){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];
     $query = "INSERT INTO contact(name,email,phone,subject,message) VALUES('$name','$email','$phone','$subject','$message')";
     $InsertRow = $db->insert($query);
        if($InsertRow>0) {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        try {
          //Server settings
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = '1237f575ff4650';                 // SMTP username
          $mail->Password = '5ac57955b9ce40';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 465;                                    // TCP port to connect to
          //Recipients
          $mail->setFrom('ahmmedafzal4@gmail.com', 'ahmed afzal');
          $mail->addAddress($email, $name);     // Add a recipient
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Account Created As'.$subject.'</br>';
          $mail->Body    = 'Dear '.$name.',</br>'.'<br>';
          $mail->Body   .= $message ;
          $mail->send();
        } catch (Exception $e) {

        }
        header('location:contact.php');
        }else{
            echo "Something went wrong !";
        }
 }