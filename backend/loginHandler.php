<?php
session_start();

include 'connection.php';


// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    if(strcmp($userType,"Customer") == 0)
    {
    // Query to check if the user exists
    $query = "SELECT * FROM users WHERE Username='$username' AND Password='$password' AND UserType='$userType'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        
        $userID =  $row['UserID'];
        // Username and password are correct
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = $userID;

        $query = "SELECT * FROM customers WHERE UserID='$userID'";
        $result = $conn->query($query);
    
        if ($result->num_rows >= 1) 
        {

            //getting from database and setting to a variable
            $row = mysqli_fetch_assoc($result);
            $name = $row['FirstName'];
            $surname = $row['LastName'];
            $phone = $row['ContactNumber'];
            $address = $row['Address'];
            $id = $row['CustomerID'];
            $profile_img = $row['profile_img'];

            //putting customer into a session
        
            $_SESSION['name'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            $_SESSION['CustomerID'] = $id;
            $_SESSION['profile_img'] = $profile_img;
            
        }
        
        header("Location: ../welcome.php"); // Redirect to welcome page
    } else {
        // Username or password is incorrect
        $_SESSION['status'] = "Invalid username or password.";
        header("Location: ../error.php");
        }
    }else if(strcmp($userType,"Admin") == 0)
    {
       
        $query = "SELECT * FROM users WHERE Username='$username' AND Password='$password' AND UserType='$userType'";
        $result = $conn->query($query);
    
        if ($result->num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $userID =  $row['UserID'];
            // Username and password are correct
            $_SESSION['username'] = $username;
            $_SESSION['userID'] = $userID;

            header("Location: ../admin/adminDashboard.php");
        }

    }
}

$conn->close();
?>
