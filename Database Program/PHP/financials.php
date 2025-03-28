<?php
include 'db_connect.php';

if (isset($_GET["fetch_finance"])) {
    $query = "SELECT * FROM FINANCE";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['TransactionID']}</td>
                <td>{$row['ContractID']}</td>
                <td>{$row['Earning']}</td>
                <td>{$row['TaxDeduction']}</td>
                <td>{$row['FinalPayment']}</td>
                <td>
                    <button class='editBtn' data-id='{$row['TransactionID']}' data-contract_id='{$row['ContractID']}'
                    data-earning='{$row['Earning']}' data-tax_deduction='{$row['TaxDeduction']}'
                    data-final_payment='{$row['FinalPayment']}'>Edit</button>
                    <button class='deleteBtn' data-id='{$row['TransactionID']}'>Delete</button>
                </td>
            </tr>";
    }
    exit;
}

if (isset($_POST["add_finance"])) {
    $contractID = $_POST["contract_id"];
    $earning = $_POST["earning"];
    $taxDeduction = $_POST["tax_deduction"];
    $finalPayment = $_POST["final_payment"];

    $conn->query("SET FOREIGN_KEY_CHECKS = 0");

    $sql = "INSERT INTO FINANCE (ContractID, Earning, TaxDeduction, FinalPayment) 
            VALUES ('$contractID', '$earning', '$taxDeduction', '$finalPayment')";

    if ($conn->query($sql) === TRUE) {
        echo "Finance record added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->query("SET FOREIGN_KEY_CHECKS = 1");

    exit;
}

if (isset($_POST["edit_finance"])) {
    $transactionID = $_POST["transaction_id"];
    $contractID = $_POST["contract_id"];
    $earning = $_POST["earning"];
    $taxDeduction = $_POST["tax_deduction"];
    $finalPayment = $_POST["final_payment"];

    $conn->query("SET FOREIGN_KEY_CHECKS = 0");

    $sql = "UPDATE FINANCE SET 
            ContractID='$contractID', Earning='$earning', 
            TaxDeduction='$taxDeduction', FinalPayment='$finalPayment' 
            WHERE TransactionID='$transactionID'";

    if ($conn->query($sql) === TRUE) {
        echo "Finance record updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->query("SET FOREIGN_KEY_CHECKS = 1");

    exit;
}

if (isset($_POST["delete_finance"])) {
    $transactionID = $_POST["transaction_id"];

    $conn->query("SET FOREIGN_KEY_CHECKS = 0");

    $sql = "DELETE FROM FINANCE WHERE TransactionID='$transactionID'";

    if ($conn->query($sql) === TRUE) {
        echo "Finance record deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->query("SET FOREIGN_KEY_CHECKS = 1");

    exit;
}

$conn->close();
?>
