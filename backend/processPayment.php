<?php
session_start();
include 'connection.php';


$CustomerID = $_SESSION['CustomerID'];

$query = "UPDATE Bills SET Amount =0, Status = 'Paid'
WHERE CustomerID='$CustomerID'";
 $result = $conn->query($query);

 if($result===TRUE) 
        {

     
		}else{
			$_SESSION['status'] = "Error with changing bill";
			header("Location: ../error.php");			
		}
		$conn->close();
    

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
  title: "Congratulatins!!",
  text: "Payment Successful!!.",
  icon: "success"
}).then((result)=>{
    if(result.isConfirmed)
    {
        window.location.replace("../view_bills.php");
    }
});
</script>


</body>
</html>