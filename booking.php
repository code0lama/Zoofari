<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "zoofari";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $guide = $_POST['guide'] == '1' ? 1 : 0;
    $selected_people = $conn->real_escape_string($_POST['selected_people']);
    $booking_date = $conn->real_escape_string($_POST['booking_date']);

    $sql = "INSERT INTO booking (name, phone, guide, selected_people , booking_date) VALUES ('$name', '$phone', '$guide', '$selected_people', '$booking_date' )";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('You have successfully booked a package. Press ok to recieve your ticket!'); window.location='ticket.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
