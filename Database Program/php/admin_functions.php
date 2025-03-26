<?php
include 'db_connect.php';

if (isset($_POST['add_artist'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO ARTIST (Name, ContactInfo, AvailabilityStatus, Gender, DateOfBirth) VALUES ('$name', '$contact', 'Available', 'M', '2000-01-01')";
    if ($conn->query($sql) === TRUE) {
        echo "Artist added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
