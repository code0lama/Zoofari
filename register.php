<?php
require_once('databaseConnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    
   
    $check_email_sql = "SELECT * FROM users WHERE email='$email'";
    $check_email_result = $conn->query($check_email_sql);
    
    if ($check_email_result->num_rows > 0) {
       
        echo "<script>alert('Email already exists. Please choose a different email.'); window.location='form.html';</script>";
        exit;
    } else {
    
        $insert_sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        
        if ($conn->query($insert_sql) === TRUE) {
            echo "<script>alert('You have successfully registered. Redirecting you to the login page.'); window.location='form.html';</script>";
            exit;
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
}
?>

