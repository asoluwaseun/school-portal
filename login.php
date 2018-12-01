<?php session_start();
    if(isset($_POST['matricNo']) && isset($_POST['password'])){
    $matricNo = $_POST['matricNo'];
    $pwd = sha1($_POST['password']);

    if($pwd != "" && $matricNo!= ""){
	$con = mysqli_connect("localhost","root","","portal");
	$us = mysqli_query($con, "SELECT password FROM studentsinfo WHERE matricNo = '$matricNo'");
    $u=mysqli_fetch_array($us);
	$pwdget= $u['password'];

    if($pwd == $pwdget){
    $_SESSION['matricNo'] = $_POST['matricNo'];

   echo "<script> window.open('dashboard.php','_self');</script>";
    }

    else{
        echo "<script> window.open('index.php','_self');</script>";
    }
        }

    else{
        echo "<script> window.open('index.php','_self');</script>";
    }
    }
    else{
   echo "<script> window.open('index.php','_self');</script>";
    }







?>