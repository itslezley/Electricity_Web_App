<?php
include 'backend/connection.php';


$email = $_POST['email'];
   
$query = "SELECT UserID FROM users WHERE Username='$email'";
    $result = $conn->query($query);

    $row = $result->fetch_row(); 

    $userId = $row[0];

    $sql = "SELECT ContactNumber FROM customers WHERE UserID='$userId'";
    $found = $conn->query($sql);

    $row = $result->fetch_row(); 

    if ($result->num_rows == 1) 
    {

        $Answer = $row[0];

        $_SESSION['Answer'] = $Answer;
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgoteen Password</title>
	
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/email.css">
  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

  

</head>
<body>

<div class="container">


<main id="content" role="main" class="w-full  max-w-md mx-auto p-6">
    
    <div class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300" id ="mail">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Security Question</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Please confirm your number
            <a class="text-blue-600 decoration-2 hover:underline font-medium" href="index.php">
              Login here
            </a>
          </p>
        </div>

        <div class="mt-5">
          <form action="backend/checkAnswer.php" method="POST">
            <div class="grid gap-y-4">
              <div>
                <label for="email" class="block text-sm font-bold ml-1 mb-2 dark:text-white">Answer</label>
                <div class="relative">
                  <input type="text" id="email" name="answer" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" required aria-describedby="email-error">
                </div>
                <p class="hidden text-xs text-red-600 mt-2" id="email-error"></p>
              </div>
              <button type="submit" id="email" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Reset password</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>

</div>

  
</html>
</body>