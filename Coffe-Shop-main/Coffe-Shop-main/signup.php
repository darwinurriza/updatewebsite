<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cafe";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert user data into the database
            $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to success page
                header("Location: signup_success.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close connection
            $conn->close();
        }
    }
}
?>
