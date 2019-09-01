<?php
session_start();
unset($_SESSION['username'] ,$_SESSION['id']);
header('location:onlinefirst.php');
 