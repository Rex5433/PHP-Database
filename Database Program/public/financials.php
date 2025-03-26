<?php
include '../php/db_connect.php';

$sql = "SELECT PaymentID, ArtistID, Amount, PaymentStatus FROM PAYMENT";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Reports</title>
</head>
<body>
    <h1>Financial Reports</h1>
    <table border="1">
        <tr>
            <th>Payment ID</th><th>Artist ID</th><th>Amount</th><th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['PaymentID']; ?></td>
                <td><?= $row['ArtistID']; ?></td>
                <td><?= $row['Amount']; ?></td>
                <td><?= $row['PaymentStatus']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
