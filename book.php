<?php
include('config.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Please login to book a flight.";
    exit;
}

$flight_id = $_GET['flight_id'];
$user_id = $_SESSION['user_id'];

// Fetch flight details
$sql = "SELECT * FROM flights WHERE id='$flight_id'";
$result = $conn->query($sql);
$flight = $result->fetch_assoc();

if ($flight['seats_available'] > 0) {
    // Book the flight
    $reservation_date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO reservations (user_id, flight_id, reservation_date) VALUES ('$user_id', '$flight_id', '$reservation_date')";
    if ($conn->query($sql) === TRUE) {
        // Reduce the number of available seats
        $new_seat_count = $flight['seats_available'] - 1;
        $sql = "UPDATE flights SET seats_available='$new_seat_count' WHERE id='$flight_id'";
        $conn->query($sql);
        echo "Flight booked successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No seats available for this flight.";
}
?>
