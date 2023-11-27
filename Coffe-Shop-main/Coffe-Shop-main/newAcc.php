<?php
require "includes/connection.php";

session_start();

if (isset($_POST['submit'])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Basic validation
    if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
    } else {
        // Check if passwords match
        if ($password != $confirmPassword) {
            echo "Passwords do not match.";
        } else {
            // Hash the password (use a strong hashing algorithm in production)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')";

            if ($connection->query($sql) === TRUE) {
                // Redirect to success page
                header("Location: signup_success.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }

            
        }
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoffeeShop Signup</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
  <div class="signup-container">
    <span class="coffee-icon">☕</span>
    <h2>Coffee Shop Sign Up</h2>
    <form action="newAcc.php" method="POST" onsubmit="return validateForm()">
      <label for="fullname">Full Name:</label>
      <input type="text" id="fullname" name="fullname" >

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" >

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" >

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" >

      <button type="submit" name="submit">Sign Up</button>
    </form>

    <button onclick="redirectToHomepage()">Already have an account?</button>
  </div>

  <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;

      if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
      }

      return true;
    }

    function redirectToHomepage() {
      window.location.href = "login.html";
    }
  </script>
</body>
</html>
