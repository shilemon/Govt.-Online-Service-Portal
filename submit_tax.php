<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "app_users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nid_number = $_POST["nid_number"];
    $city_name = $_POST["city_name"];
    $tax_type = $_POST["tax_type"];
    $tax_amount = $_POST["tax_amount"];
    $payment_date = $_POST["payment_date"];
    $payment_method = $_POST["payment_method"];
    $bank_name = isset($_POST["bank_name"]) ? $_POST["bank_name"] : NULL; 

    $stmt = $conn->prepare("
        INSERT INTO tax_payments (nid_number, city_name, tax_type, tax_amount, payment_date, payment_method, bank_name)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("sssdsss", $nid_number, $city_name, $tax_type, $tax_amount, $payment_date, $payment_method, $bank_name);

    if ($stmt->execute()) {
        // Data inserted successfully
        $_SESSION["success_message"] = "Tax payment submitted successfully.";
        
        // Store the payment details in the session for displaying in history
        $taxPayment = [
            'receipt_id' => $conn->insert_id,  
            'tax_amount' => $tax_amount,
            'payment_date' => $payment_date,
            'payment_method' => $payment_method,
            'date' => date("Y-m-d H:i:s")  
        ];

        // Initialize the tax history in session if it's not set
        if (!isset($_SESSION['tax_history'])) {
            $_SESSION['tax_history'] = [];
        }

        // Add the new payment to the session
        $_SESSION['tax_history'][] = $taxPayment;

        header("Location: history.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
