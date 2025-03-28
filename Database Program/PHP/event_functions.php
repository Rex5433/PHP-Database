<?php
include 'db_connect.php';

if (isset($_GET["fetch_events"])) {
    $query = "SELECT * FROM EVENT";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['EventID']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Date']}</td>
                <td>{$row['VenueID']}</td>
                <td>{$row['OrganizerID']}</td>
                <td>
                    <button class='editBtn' data-id='{$row['EventID']}' data-name='{$row['Name']}' 
                    data-date='{$row['Date']}' data-venue='{$row['VenueID']}' 
                    data-organizer='{$row['OrganizerID']}'>Edit</button>
                    <button class='deleteBtn' data-id='{$row['EventID']}'>Delete</button>
                </td>
            </tr>";
    }
    exit;
}

if (isset($_POST["book_event"])) {
    $eventName = $_POST["event"];
    $eventDate = $_POST["date"];
    $venueID = $_POST["venue"];
    $organizerID = $_POST["organizer"];

    $sql = "INSERT INTO EVENT (Name, Date, VenueID, OrganizerID) VALUES ('$eventName', '$eventDate', '$venueID', '$organizerID')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Event booked successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    exit;
}

if (isset($_POST["edit_event"])) {
    $eventID = $_POST["event_id"];
    $eventName = $_POST["event"];
    $eventDate = $_POST["date"];
    $venueID = $_POST["venue"];
    $organizerID = $_POST["organizer"];

    $sql = "UPDATE EVENT SET Name='$eventName', Date='$eventDate', VenueID='$venueID', OrganizerID='$organizerID' WHERE EventID='$eventID'";

    if ($conn->query($sql) === TRUE) {
        echo "Event updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    exit;
}

if (isset($_POST["delete_event"])) {
    $eventID = $_POST["event_id"];

    $sql = "DELETE FROM EVENT WHERE EventID='$eventID'";

    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    exit;
}

$conn->close();
?>
