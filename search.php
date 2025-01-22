<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "app_users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search query
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']);

    // Search for tax payment details (NID search)
    $stmt_tax = $conn->prepare("
        SELECT tax_type, tax_amount, payment_date, payment_method, bank_name, city_name 
        FROM tax_payments 
        WHERE nid_number = ?
    ");
    $stmt_tax->bind_param("s", $query);
    $stmt_tax->execute();
    $result_tax = $stmt_tax->get_result();

    // Display tax payment results if found
    if ($result_tax->num_rows > 0) {
        echo "<h1>Search Results for NID: $query (Tax Payments)</h1>";
        echo "<table border='1' cellpadding='10'>
                <tr>
                    <th>Tax Type</th>
                    <th>Amount (BDT)</th>
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                    <th>Bank Name</th>
                    <th>City Name</th>
                </tr>";
        while ($row = $result_tax->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['tax_type']) . "</td>
                    <td>" . htmlspecialchars($row['tax_amount']) . "</td>
                    <td>" . htmlspecialchars($row['payment_date']) . "</td>
                    <td>" . htmlspecialchars($row['payment_method']) . "</td>
                    <td>" . htmlspecialchars($row['bank_name'] ?: 'N/A') . "</td>
                    <td>" . htmlspecialchars($row['city_name']) . "</td>
                  </tr>";
        }
        echo "</table>";
    }

    $stmt_tax->close();

    // Search for bill payment details (Account Number search)
    $stmt_bill = $conn->prepare("
        SELECT account_number, amount, district, date 
        FROM bill_payments 
        WHERE account_number = ?
    ");
    $stmt_bill->bind_param("s", $query);
    $stmt_bill->execute();
    $result_bill = $stmt_bill->get_result();

    // Display bill payment results if found
    if ($result_bill->num_rows > 0) {
        echo "<h1>Search Results for Account Number: $query (Bill Payments)</h1>";
        echo "<table border='1' cellpadding='10'>
                <tr>
                    <th>Account Number</th>
                    <th>Amount (BDT)</th>
                    <th>District</th>
                    <th>Date</th>
                </tr>";
        while ($row = $result_bill->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['account_number']) . "</td>
                    <td>" . htmlspecialchars($row['amount']) . "</td>
                    <td>" . htmlspecialchars($row['district']) . "</td>
                    <td>" . htmlspecialchars($row['date']) . "</td>
                  </tr>";
        }
        echo "</table>";
    }

    $stmt_bill->close();

    // If neither records are found
    if ($result_tax->num_rows == 0 && $result_bill->num_rows == 0) {
        echo "<p>No records found for query: $query</p>";
    }
} else {
    echo "<p>No search query provided.</p>";
}

$conn->close();
?>
