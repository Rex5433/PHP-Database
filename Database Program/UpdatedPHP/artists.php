<?php
include '../php/db_connect.php';

$sql = "SELECT ArtistID, Name, ContactInfo FROM ARTIST";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
</head>
<body>
    <h1>Artist List</h1>
    <table border="1">
        <tr>
            <th>ID</th><th>Name</th><th>Contact</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['ArtistID']; ?></td>
                <td><?= $row['Name']; ?></td>
                <td><?= $row['ContactInfo']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
