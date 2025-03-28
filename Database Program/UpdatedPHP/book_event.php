<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_event'])) {
    $eventName = $_POST['Name'];
    $eventDate = $_POST['Date'];

    $venueID = 1;
    $organizerID = 1;

    $sql = "INSERT INTO EVENT (Name, Date, VenueID, OrganizerID) 
            VALUES ('$eventName', '$eventDate', $venueID, $organizerID)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Event booked successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_event'])) {
    $eventID = $_POST['EventID'];
    $eventName = $_POST['Name'];
    $eventDate = $_POST['Date'];

    if (!empty($eventID) && !empty($eventName) && !empty($eventDate)) {

        $sql = "UPDATE EVENT SET Name = '$eventName', Date = '$eventDate' WHERE EventID = $eventID";
        
        if ($conn->query($sql) === TRUE) {
            echo "Event updated successfully!";
        } else {
            echo "Error: " . $conn->error; 
        }
    } else {
        echo "All fields are required to edit the event.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_event'])) {
    $eventID = $_POST['EventID'];

    if (!empty($eventID)) {
        $sql = "DELETE FROM EVENT WHERE EventID = $eventID";
        
        if ($conn->query($sql) === TRUE) {
            echo "Event deleted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Event ID is required to delete the event.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_event'])) {
    $eventID = $_POST['EventID'];
    $eventName = $_POST['Name'];
    $eventDate = $_POST['Date'];

    if (!empty($eventID) && !empty($eventName) && !empty($eventDate)) {
        $stmt = $conn->prepare("UPDATE EVENT SET Name = ?, Date = ? WHERE EventID = ?");
        $stmt->bind_param("ssi", $eventName, $eventDate, $eventID);

        if ($stmt->execute()) {
            echo "Event updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required to edit the event.";
    }
}

$sql = "SELECT EventID, Name AS EventName, Date AS EventDate FROM EVENT";
$result = $conn->query($sql);

$events = []; 

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
} else {
    $events = []; 
}

$conn->close();
?>
