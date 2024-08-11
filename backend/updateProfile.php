<?php
session_start();
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phone = $_POST['contactNumber'];
    $Addr = $_POST['address'];
   

    $profile_img = $_FILES["profile_img"]["name"];
    $tempname = $_FILES["profile_img"]["tmp_name"];
    $folder = "../images/profiles/" . $profile_img;
 
    if (move_uploaded_file($tempname, $folder)) 
    {
        $_SESSION['profile_img']= $profile_img ;

    } else {
        $_SESSION['status'] = "Error Inserting profile Picture";
			header("Location: ../error.php");		
    }


$CustomerID = $_SESSION['CustomerID'];

$query = "UPDATE Customers SET Address = '$Addr', ContactNumber = '$phone' , profile_img = '$profile_img'
WHERE CustomerID='$CustomerID'";
 $result = $conn->query($query);

 if($result===TRUE) 
        {

             $_SESSION['phone']=$phone;
             $_SESSION['address']=$Addr;
           

     
		}else{
			$_SESSION['status'] = "Error updating profile";
			header("Location: ../error.php");			
		}
    }
        
		$conn->close();
    

?>


<!DOCTYPE html>
<html>
<head>
    <title>Successful</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Successful</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
Swal.fire({
  title: "Congratulatins!!",
  text: "Profile Updated.",
  icon: "success"
}).then((result)=>{
    if(result.isConfirmed)
    {
        window.location.replace("../profile.php");
    }
});
</script>


</body>
</html>