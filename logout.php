<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please log in before logging out! Redirecting you to the home page.'); window.location='index.html';</script>";
    exit;
}

$_SESSION = array();
session_destroy();

echo "<script>alert('You have successfully logged out. Redirecting you to the home page.'); window.location='index.html';</script>";
exit;
?>
