<?php
session_start();

if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <!--things u need in every page-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    
   <!-- Navbar -->
   <?php
    include 'includes/nav.php';

    ?>

</head>
<body>
    <h2 class="welcome" >Welcome, <?php echo $_SESSION['name'] ;   echo $_SESSION['surname']; ?>!</h2>
    

    <!--slideshow-->
    <div class="slideshow">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/elec_1.jpeg" class="d-block w-100" alt="..." height="400">
    </div>
    <div class="carousel-item">
      <img src="images/elec_2.jpg" class="d-block w-100" alt="..." height="400">
    </div>
    <div class="carousel-item">
      <img src="images/elec_3.jpg" class="d-block w-100" alt="..." height="400">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>



   
    <!--last thing u need-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

<?php
    include 'includes/footer.php';

    ?>

</html>
