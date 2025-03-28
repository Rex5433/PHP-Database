<?php
    include 'db_connect.php';

    if (isset($_GET['fetch'])) {
        $sql = "SELECT ArtistID, Name, DateOfBirth, Gender, ContactInfo, AvailabilityStatus FROM Artist"; // Adjust as needed
        $result = mysqli_query($conn, $sql);

        $artists = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $artists[] = $row;
            }
        }

        mysqli_close($conn);
        echo json_encode($artists);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAME - Home</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
</head>
<body class="index-page">
    <header>
        <h1>Forondo Artist Management Excellence (FAME)</h1>
        <nav>
            <a href="artists.php">Artists</a>
            <a href="event_booking.php">Book an Event</a>
            <a href="admin.php">Admin</a>
            <a href="financials.php">Financial Reports</a>
        </nav>
    </header>
    <main>
        <h2>Welcome to FAME</h2>
        <p>Manage artists, book events, and track financials easily.</p>
        <button id="fetchButton">Show Artists</button>

        <table id="artistTable">
            <thead>
                <tr>
                    <th>Artist ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Contact Info</th>
                    <th>Availability Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Artist rows will be dynamically inserted here -->
            </tbody>
        </table>
    </main>
</body>
</html>
