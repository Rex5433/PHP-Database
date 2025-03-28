<?php
include 'db_connect.php';

if (isset($_GET['fetch_artists'])) {
    $sql = "SELECT * FROM ARTIST";
    $result = $conn->query($sql);
    $output = "";
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
                        <td>{$row['ArtistID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['ContactInfo']}</td>
                        <td>{$row['AvailabilityStatus']}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['DateOfBirth']}</td>
                        <td>
                            <button class='editBtn' 
                                data-id='{$row['ArtistID']}'
                                data-name='{$row['Name']}'
                                data-contact='{$row['ContactInfo']}'
                                data-availability='{$row['AvailabilityStatus']}'
                                data-gender='{$row['Gender']}'
                                data-dob='{$row['DateOfBirth']}'>
                                Edit
                            </button>
                            <button class='deleteBtn' data-id='{$row['ArtistID']}'>Delete</button>
                        </td>
                    </tr>";
    }
    echo $output;
    exit;
}

if (isset($_POST['add_artist'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $availability = $_POST['availability'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $sql = "INSERT INTO ARTIST (Name, ContactInfo, AvailabilityStatus, Gender, DateOfBirth) 
            VALUES ('$name', '$contact', '$availability', '$gender', '$dob')";
    
    echo $conn->query($sql) ? "Artist added successfully!" : "Error: " . $conn->error;
    exit;
}

if (isset($_POST['edit_artist'])) {
    $id = $_POST['artist_id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $availability = $_POST['availability'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $sql = "UPDATE ARTIST 
            SET Name='$name', ContactInfo='$contact', AvailabilityStatus='$availability', Gender='$gender', DateOfBirth='$dob'
            WHERE ArtistID='$id'";
    
    echo $conn->query($sql) ? "Artist updated successfully!" : "Error: " . $conn->error;
    exit;
}

if (isset($_POST['delete_artist'])) {
    $id = $_POST['artist_id'];

    $sql = "DELETE FROM ARTIST WHERE ArtistID='$id'";
    
    echo $conn->query($sql) ? "Artist deleted successfully!" : "Error: " . $conn->error;
    exit;
}

$conn->close();
?>
