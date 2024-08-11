<?php

session_start();

$status = $_SESSION['status'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
Swal.fire({
  title: "An Error has occurred",
  text: "<?php echo $status; ?> !!.",
  icon: "error"
}).then((result)=>{
    if(result.isConfirmed)
    {
        window.location.replace("index.php");
    }
});
</script>


</body>
</html>