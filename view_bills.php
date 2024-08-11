<?php
session_start();

if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header("Location: index.php");
    exit();
}

include 'backend/connection.php';


   $CustomerID = $_SESSION['CustomerID'];

   $query = "SELECT * FROM Bills WHERE CustomerID='$CustomerID'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) 
    {
        $row = mysqli_fetch_assoc($result);
            $amount= $row['Amount'];
            $customerID = $row['CustomerID'];
            $billingDate= $row['BillingDate'];
            $dueDate = $row['DueDate'];
            $status = $row['Status'];


    }else{
      $_SESSION['status'] = "Error getting bills";
			header("Location: error.php");
    }

    $query = "SELECT * FROM Meters WHERE CustomerID='$CustomerID'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) 
    {
        $row = mysqli_fetch_assoc($result);
            $meterID= $row['MeterID'];
            $meterNumber= $row['MeterNumber'];


    }else{
      $_SESSION['status'] = "Error getting Meters";
			header("Location: error.php");
    }

    $query = "SELECT * FROM Readings WHERE MeterID='$meterID'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) 
    {
        $row = mysqli_fetch_assoc($result);
            $currentReading= $row['CurrentReading'];
            $previousReading= $row['PreviousReading'];
            $unitsConsumed= $row['UnitsConsumed'];

    }

    else{
      $_SESSION['status'] = "Error getting Readings";
			header("Location: error.php");
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bills</title>
    <!--things u need in every page-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="script.js" defer></script>
    
    <?php
    include 'includes/nav.php';

    ?>

</head>
<body>

    <h2 class="welcome" >Here are your Bill, <?php echo $_SESSION['name']; ?>!</h2>
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Details</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Customer ID :</td>
      <td><?php echo $customerID; ?></td>
      
    </tr>
    
    <tr>
      <th scope="row">2</th>
      <td>Meter Number: </td>
      <td><?php echo $meterNumber; ?> </td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Billing Date: </td>
      <td><?php echo $billingDate; ?> </td>
      
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Due Date: </td>
      <td> <?php echo $dueDate; ?></td>
      
    </tr>
    
    <tr>
      <th scope="row">5</th>
      <td>Previous Reading: </td>
      <td><?php echo $previousReading; ?> </td>
      
    </tr>

    <tr>
      <th scope="row">6</th>
      <td>Current Reading: </td>
      <td><?php echo $currentReading; ?> </td>
      
    </tr>

    <tr>
      <th scope="row">7</th>
      <td>Units Consumed: </td>
      <td><?php echo $unitsConsumed; ?> </td>
      
    </tr>

    <tr>
      <th scope="row">8</th>
      <td>Amount: </td>
      <td>R<?php echo $amount; ?> </td>
      
    </tr>

    <tr>
      <th scope="row">9</th>
      <td>Status: </td>
      <td><?php echo $status; ?> </td>
      
    </tr>
   
  </tbody>
</table>


  <a href="pay.php">
  <button class="btnPay" type="button">Pay</button></a>






    <!--last thing u need-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


   

  </body>

  <?php
    include 'includes/footer.php';

    ?>
</html>
