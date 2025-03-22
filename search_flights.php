<?php
include('config.php');

$origin = $_GET['origin'];
$destination = $_GET['destination'];
$date = $_GET['date'];

// Search for flights
$sql = "SELECT * FROM flights WHERE origin='$origin' AND destination='$destination' AND DATE(departure_time) = '$date' AND seats_available > 0";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Available Flights</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Flight Name</th><th>Departure Time</th><th>Seats Available</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['flight_name'] . "</td><td>" . $row['departure_time'] . "</td><td>" . $row['seats_available'] . "</td>
                  <td><a href='book.php?flight_id=" . $row['id'] . "'>Book Now</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No flights available for the selected route and date.";
    }
    ?>
</body>
</html>
