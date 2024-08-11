<?php
session_start();

if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header("Location: index.php");
    exit();
}

            $username = $_SESSION['username']  ;
            $name = $_SESSION['name'] ;
            $surname =  $_SESSION['surname'];
            $phone =  $_SESSION['phone'];
            $address = $_SESSION['address'];
            $id =$_SESSION['CustomerID'] ;
            $profile_img =$_SESSION['profile_img'];

            if($profile_img==null)
            {
                $profile_img = 'noimage.png';
            }

   $CustomerID = $_SESSION['CustomerID'];


?>


<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    
    <!-- Navbar -->
    <?php
    include 'includes/nav.php';

    ?>

</head>
<body>
   
<div class="main">
      <h2>Profile</h2>
      <form action="backend/updateProfile.php" method="POST" enctype="multipart/form-data">  
      <div class="card">
          <div class="card-body">
              <i class="fa fa-pen fa-xs edit"></i>

              <table>
                  <tbody>
                      <tr>
                          <td>Name</td>
                          <td>:</td>
                          <td><input type="text" value="<?php echo $name?>" name="name" readonly></td>
                      </tr>
                      <tr>
                          <td>Surname</td>
                          <td>:</td>
                          <td><input type="text" value="<?php echo $surname?>" name="surname" readonly></td>
                      </tr>
                      <tr>
                          <td>Contact Number</td>
                          <td>:</td>
                          <td><input type="text" value="<?php echo $phone?>" name="contactNumber"></td>
                      </tr>

                      <tr>
                          <td>Username</td>
                          <td>:</td>
                          <td><input type="text" value="<?php echo $username?>" name="Username" readonly></td>
                      </tr>
                      <tr>
                          <td>Address</td>
                          <td>:</td>
                          <td><input type="text" value="<?php echo $address?>" name="address"></td>
                      </tr>
                      
                      <tr>
                          <td>Customer ID</td>
                          <td>:</td>
                          <td><input type="text" value="<?php echo $id?>" name="CustomerID" readonly> </td>
                      </tr>
                      <tr>
                          <td>Customer ID</td>
                          <td>:</td>
                          <td><input type="text" value="<?php echo $id?>" name="CustomerID" readonly> </td>
                      </tr>
                  </tbody>
              </table>
              
          <div class="image">

              <img src="images/profiles/<?php echo $profile_img;?>" alt="Images here" width="150" height="160">
              <input type="file" name="profile_img" placeholder="choose image">
        </div>
          </div>
         
      </div>

      <button class="btnUpdate" type="submit">Update Details</button></a>
      </form>
  </div>


   </body>

   <?php
    include 'includes/footer.php';

    ?>
</html>

