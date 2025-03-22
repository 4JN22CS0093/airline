<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Reservation System</title>
</head>
<body>
    <h1>Welcome to Airline Reservation System</h1>
    <form action="search_flights.php" method="get">
        <label for="origin">Origin:</label>
        <input type="text" name="origin" required>
        <br>
        <label for="destination">Destination:</label>
        <input type="text" name="destination" required>
        <br>
        <label for="date">Departure Date:</label>
        <input type="date" name="date" required>
        <br>
        <button type="submit">Search Flights</button>
    </form>
    <br>
    <a href="login.php">Login</a> | <a href="register.php">Register</a>
</body>
</html>
