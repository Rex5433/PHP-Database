<?php
include 'db_connect.php';

$sql = "SELECT ArtistID, Name, ContactInfo, AvailabilityStatus FROM ARTIST"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <link rel="stylesheet" href="artists.css">
</head>
<body class="artists-page">
    <header>
        <h1>FAME - Artist List</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="event_booking.php">Book an Event</a>
            <a href="admin.php">Admin</a>
            <a href="financials.php">Financial Reports</a>
        </nav>
    </header>
    
    <main>
        <h2>List of Artists</h2>
        <table id="artistTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Info</th>
                    <th>Availability Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['ArtistID']); ?></td>
                        <td><?= htmlspecialchars($row['Name']); ?></td>
                        <td><?= htmlspecialchars($row['ContactInfo']); ?></td>
                        <td><?= htmlspecialchars($row['AvailabilityStatus']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>
