<?php

session_start();
include 'backend/connection.php';


$CustomerID = $_SESSION['CustomerID'];

$query = "SELECT * FROM query WHERE CustomerID='$CustomerID' OR receiver='$CustomerID'";
    $result = $conn->query($query);



?>


<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <!--things u need in every page-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/chatbot.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    
    <!-- Navbar -->
    <?php
    include 'includes/nav.php';

    ?>

</head>
<body>

<body>



<div class="centreChat">
  
<div class="bodyMessage">
  <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    
      if($row['receiver'] ==$CustomerID)
      {
   
?>

<div class="container darker">
  <img src="/images/user.png" alt="Avatar" class="right" style="width:100%;">
  <p><?php echo $row['messages'];?></p>
  <span class="time-left"><?php echo $row['date'];?> </span>
</div>

<?php
      }else{
      ?>

<div class="container" id="reciver">
  <img src="/images/admin.png" alt="Avatar" style="width:100%;">
  <p><?php echo $row['messages'];?></p>
  <span class="time-right"> <?php echo $row['date'];?> </span>
</div>


<?php
      }
}

}else{
?>

<h2 class="welcome">
  Start chat with Admin.
</h2>

<?php } ?> 


</div>

<form action="/backend/sendMessage.php" method="POST">
<div class="mb-2">
  <input type="text" name="message" class="form-control" id="exampleFormControlInput1" placeholder="type here.....">
  <button type="submit" class="btn" id="btnSend">Send</button>
</div> 
</form>


</div>

  <script src="javascript/chat.js"></script>

</body>
<?php
    include 'includes/footer.php';

    ?>
</html>
