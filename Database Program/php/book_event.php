<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['event'];
    $artistID = $_POST['artist'];
    $eventDate = $_POST['date'];

    $sql = "INSERT INTO EVENT (Name, Date, VenueID, OrganizerID) VALUES ('$eventName', '$eventDate', 1, 1)";
    if ($conn->query($sql) === TRUE) {
        echo "Event booked successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
