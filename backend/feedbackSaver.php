<?php
session_start();
include 'connection.php';


   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $message = $_POST['message'];
   $CustomerID = $_SESSION['CustomerID']; 
   $profile_img = $_SESSION['profile_img']; 


   
        $sql = "INSERT  INTO feedback(name,email,number,message,CustomerID,profile) values('$name','$email','$phone','$message','$CustomerID', '$profile_img')";
		
		if($conn->query($sql)===TRUE){

            ?>
            <!DOCTYPE html>
<html>
<head>
    <title>Payment successful</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Payment successful</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
Swal.fire({
  title: "GOOD JOB!!",
  text: "Feedback Submitted!!.",
  icon: "success"
}).then((result)=>{
    if(result.isConfirmed)
    {
        window.location.replace("../feedback.php");
    }
});
</script>


</body>
</html>

<?php
			 
		}else{
			$_SESSION['status'] = "Error Saving feedback";
			header("Location: error.php");			
		}

    $conn->close();
    ?>