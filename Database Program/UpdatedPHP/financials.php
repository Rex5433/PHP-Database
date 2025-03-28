<?php
include 'db_connect.php';

$sql = "SELECT * FROM FINANCE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Reports</title>
    <link rel="stylesheet" href="financials.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>Forondo Artist Management Excellence (FAME)</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="artists.php">Artists</a>
            <a href="event_booking.php">Book an Event</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>

    <main>
        <h2>Financial Reports</h2>

        <h2>Add/Edit Finance Record</h2>
        <form id="financeForm">
            <input type="hidden" id="transaction_id" name="transaction_id">

            <label for="contract_id">Contract ID:</label>
            <input type="number" id="contract_id" name="contract_id" placeholder="Enter contract ID" required>

            <label for="earning">Earnings:</label>
            <input type="number" step="0.01" id="earning" name="earning" placeholder="Enter earnings" required>

            <label for="tax_deduction">Tax Deduction:</label>
            <input type="number" step="0.01" id="tax_deduction" name="tax_deduction" placeholder="Enter tax deduction" required>

            <label for="final_payment">Final Payment:</label>
            <input type="number" step="0.01" id="final_payment" name="final_payment" placeholder="Enter final payment" required>

            <button type="submit" name="add_finance" class="add-btn">Add Finance Record</button>
            <button type="submit" name="edit_finance" class="edit-btn">Edit Finance Record</button>
        </form>

        <h2>Finance Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Contract ID</th>
                    <th>Earnings</th>
                    <th>Tax Deduction</th>
                    <th>Final Payment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="financeTable"></tbody>
        </table>
    </main>

    <script>
        $(document).ready(function() {
            loadFinance();

            $("#financeForm button").click(function(e) {
                e.preventDefault();
                let action = $(this).attr("name");
                let formData = $("#financeForm").serialize() + "&" + action + "=true";

                $.post("financials_functions.php", formData, function(response) {
                    alert(response);
                    loadFinance();
                    $("#financeForm")[0].reset();
                    $("#transaction_id").val("");
                });
            });

            $(document).on("click", ".editBtn", function() {
                let finance = $(this).data();
                $("#transaction_id").val(finance.id);
                $("#contract_id").val(finance.contract_id);
                $("#earning").val(finance.earning);
                $("#tax_deduction").val(finance.tax_deduction);
                $("#final_payment").val(finance.final_payment);
            });

            $(document).on("click", ".deleteBtn", function() {
                if (!confirm("Are you sure?")) return;
                let transactionId = $(this).data("id");

                $.post("financials_functions.php", { delete_finance: true, transaction_id: transactionId }, function(response) {
                    alert(response);
                    loadFinance();
                });
            });

            function loadFinance() {
                $.get("financials_functions.php", { fetch_finance: true }, function(data) {
                    $("#financeTable").html(data);
                });
            }
        });
    </script>
</body>
</html>
