<?php
require_once('databaseConnection.php');

session_start();

if (isset($_SESSION['email'])) {
    echo "<script>alert('You are already logged in. Redirecting you to the home page.'); window.location='index.html';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {

            $_SESSION['email'] = $email;

            echo "<script>alert('You have logged in. Redirecting you to the home page.'); window.location='index.html';</script>";
            exit;
        } else {
            echo "<script>alert('Invalid email or password. Redirecting you to the login page.'); window.location='form.html';</script>";
            exit;
        }
    } else {
        echo "Error: " . $conn->error;
    }
    
    $conn->close();
}
