<?php
session_start();
include 'connection.php';


   $CustomerID = $_SESSION['CustomerID'];
   $names = $_SESSION['name'];
   $profile_img = $_SESSION['profile_img'];
   $msg = $_POST['message'];
   $receiver = 1111;

   
        $sql = "INSERT  INTO query(messages,receiver,CustomerID,names,profile) values('$msg','$receiver','$CustomerID', '$names', '$profile_img')";
		
		if($conn->query($sql)===TRUE){
            header("Location: ../chat.php");	
			 
		}else{
			$_SESSION['status'] = "Error Inserting Message";
			header("Location: ../error.php");			
		}
	

    ?>