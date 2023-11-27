<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

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

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, check password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Successful login, redirect to the landing page
            header("Location: landing_page.html");
            exit();
        }
    }

    // Close connection
    $conn->close();

    // If the control reaches here, login failed, redirect to login page
    header("Location: login.html");
    exit();
}
?>
