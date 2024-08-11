<?php
session_start();

$Answer = $_SESSION['Answer'] ;

$userAnswer = $_POST['answer'];

if(strcmp($userAnswer,$Answer) == 0)
{
    header("Location: ../newPassword.php");

}else {
        // Username or password is incorrect
        $_SESSION['status'] = "Wrong Security Answer.";
        header("Location: ../error.php");
        }
   