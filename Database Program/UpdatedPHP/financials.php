<?php
include 'db_connect.php';

// --- ADD NEW REPORT ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_report'])) {
    $contractID = $_POST['contract_id'];
    $earning = $_POST['earning'];

    // Check if the ContractID exists in the CONTRACT table
    $checkContract = $conn->prepare("SELECT COUNT(*) FROM CONTRACT WHERE ContractID = ?");
    $checkContract->bind_param("i", $contractID);
    $checkContract->execute();
    $checkContract->bind_result($contractExists);
    $checkContract->fetch();
    $checkContract->close();

    if ($contractExists > 0) {
        // Insert into FINANCE if the ContractID exists
        $stmt = $conn->prepare("INSERT INTO FINANCE (ContractID, Earning) VALUES (?, ?)");
        $stmt->bind_param("id", $contractID, $earning);

        if ($stmt->execute()) {
            $message = "Financial report added successfully!";
        } else {
            $message = "Error adding report: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "Error: ContractID does not exist!";
    }
}

// --- FETCH ALL REPORTS ---
$sql = "SELECT TransactionID, ContractID, Earning FROM FINANCE";
$result = $conn->query($sql);

$reports = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Reports</title>
</head>
<body>
    <h1>Manage Financial Reports</h1>

    <?php if (isset($message)) { ?>
        <p><strong><?= $message; ?></strong></p>
    <?php } ?>

    <!-- Add New Report -->
    <h2>Add New Financial Report</h2>
    <form action="financials.php" method="POST">
        <label>Contract ID:</label>
        <input type="number" name="contract_id" required><br>

        <label>Earning:</label>
        <input type="number" step="0.01" name="earning" required><br>

        <button type="submit" name="add_report">Add Report</button>
    </form>

    <!-- Existing Reports -->
    <h2>Existing Financial Reports</h2>
    <table border="1">
        <tr>
            <th>Transaction ID</th>
            <th>Contract ID</th>
            <th>Earning</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($reports as $report) { ?>
            <tr>
                <td><?= $report['TransactionID']; ?></td>
                <td><?= $report['ContractID']; ?></td>
                <td><?= $report['Earning']; ?></td>
                <td>
                    <!-- Edit -->
                    <form action="financials.php" method="POST" style="display:inline;">
                        <input type="hidden" name="transaction_id" value="<?= $report['TransactionID']; ?>">
                        <input type="number" name="contract_id" value="<?= $report['ContractID']; ?>" required>
                        <input type="number" step="0.01" name="earning" value="<?= $report['Earning']; ?>" required>
                        <button type="submit" name="edit_report">Update</button>
                    </form>

                    <!-- Delete -->
                    <form action="financials.php" method="POST" style="display:inline;">
                        <input type="hidden" name="transaction_id" value="<?= $report['TransactionID']; ?>">
                        <button type="submit" name="delete_report" onclick="return confirm('Are you sure you want to delete this report?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
