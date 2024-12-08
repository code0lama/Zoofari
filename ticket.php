<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Ticket</title>
    <link href="css/ticketing.css" rel="stylesheet" >
    
</head>
<body>
    <div class="main">
    <h1>Here's your ticket: </h1>
    <div class="ticket">
        
        <?php
       
        $servername = "localhost";
        $username = "root"; 
        $password = "";
        $dbname = "zoofari";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM booking ORDER BY bookingID DESC LIMIT 1"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>Name: " . $row["name"]. "</p>";
            echo "<p>Phone Number: " . $row["phone"]. "</p>";
            echo "<p>Guide Needed: " . ($row["guide"] ? "Yes" : "No") . "</p>";
            echo "<p>Number of People: " . $row["selected_people"]. "</p>";
            echo "<p>Booking Date: " . $row["booking_date"] . "</p>";
        } else {
            echo "No booking found.";
        }

        $conn->close();
        ?>
    </div>
    </div>
</body>
</html>
