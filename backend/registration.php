<?php
session_start();
include 'connection.php';


   $username = $_POST['username'];
   $password = $_POST['password'];
   $userType = $_POST['userType'];

   if(strlen($password) == 8 )
   {
        $sql = "INSERT  INTO users(username,password,userType) values('$username','$password','$userType')";
		
		if($conn->query($sql)===TRUE){
			 
		}else{
			$_SESSION['status'] = "Error creating logins";
			header("Location: ../error.php");			
		}
	}else{
		$_SESSION['status'] = "Error after checking password";
			header("Location: ../error.php");
	}
	
//inserting a customer if its a customer
	if(strcmp($userType,"Customer") == 0)
	{


		$sql = "SELECT * FROM users WHERE username ='$username'";
		$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
    $userID= $row['UserID'];

	 
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$address = $_POST['Address'];
	$meter = $_POST['meter_number'];
	$phone = $_POST['phone_number'];

	$sql = "INSERT  INTO Customers(UserID,FirstName,address,LastName,ContactNumber) 
	values('$userID','$name','$address','$surname','$phone')";
		
	if($conn->query($sql)===TRUE){

	}else{
		$_SESSION['status'] = "Error adding user";
			header("Location: ../error.php");			
	}



	$sql = "SELECT * FROM customers WHERE UserID ='$userID'";
		$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
    $customerID= $row['CustomerID'];

	$sql = "INSERT  INTO meters(MeterNumber,CustomerID) 
	values('$meter','$customerID')";

if($conn->query($sql)===TRUE){
	header("Location: ../index.php");	
}else{
	$_SESSION['status'] = "Error adding users bills";
	header("Location: ../error.php");			
}
	}
		$conn->close();
    

?>