<?php
session_start();
unset($_SESSION['name'] ,$_SESSION['id']);
header('location:index.php');
 