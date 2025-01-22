<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .history-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: black;
        }

        .history-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            color: black;
        }

        .history-item:last-child {
            border-bottom: none;
        }

        .history-item strong {
            display: inline-block;
            width: 150px;
            color: black;
        }

        .no-history {
            text-align: center;
            color: black;
            font-style: italic;
        }
    </style>
</head>
<body>

    <?php include('topbar.php'); ?>

    <!-- Vaccination History Section -->
    <div class="history-container">
        <h1>Your Vaccination History</h1>
        <?php
        // Check for cookies
        if (isset($_COOKIE['vaccination_history'])) {
            $vaccinationHistory = json_decode($_COOKIE['vaccination_history'], true);
            if (!empty($vaccinationHistory)) {
                foreach ($vaccinationHistory as $record) {
                    echo "<div class='history-item'>";
                    echo "<p><strong>Dose Name:</strong> " . htmlspecialchars($record['dose_name']) . "</p>";
                    echo "<p><strong>Date:</strong> " . htmlspecialchars($record['date']) . "</p>";
                    echo "<p><strong>Disease:</strong> " . htmlspecialchars($record['disease']) . "</p>";
                    echo "<p><strong>Next Vaccination Date:</strong> " . htmlspecialchars($record['next_date']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p class='no-history'>No vaccination history available.</p>";
            }
        } else {
            echo "<p class='no-history'>No vaccination history available in cookies.</p>";
        }
        ?>
    </div>

    <!-- Bill Payment History Section -->
    <div class="history-container">
        <h2>Your Bill Payment History</h2>
        <?php
        if (isset($_SESSION['bill_history']) && !empty($_SESSION['bill_history'])) {
            foreach ($_SESSION['bill_history'] as $record) {
                echo "<div class='history-item'>";
                echo "<p><strong>Account Number:</strong> " . htmlspecialchars($record['account_number']) . "</p>";
                echo "<p><strong>Amount:</strong> " . htmlspecialchars($record['amount']) . " BDT</p>";
                echo "<p><strong>District:</strong> " . htmlspecialchars($record['district']) . "</p>";
                echo "<p><strong>Date:</strong> " . htmlspecialchars($record['date']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-history'>No bill payment history available.</p>";
        }

        // Check for the last payment cookie and display it if available
        if (isset($_COOKIE['last_payment'])) {
            $last_payment = json_decode($_COOKIE['last_payment'], true);
            echo "<div class='history-item'>";
            echo "<h3>Last Payment (from Cookie):</h3>";
            echo "<p><strong>Account Number:</strong> " . htmlspecialchars($last_payment['account_number']) . "</p>";
            echo "<p><strong>Amount:</strong> " . htmlspecialchars($last_payment['amount']) . " BDT</p>";
            echo "<p><strong>District:</strong> " . htmlspecialchars($last_payment['district']) . "</p>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($last_payment['date']) . "</p>";
            echo "</div>";
        } else {
            echo "<p class='no-history'>No last payment found in cookies.</p>";
        }
        ?>
    </div>

    <!-- Medical Insurance History Section -->
    <div class="history-container">
        <h2>Your Medical Insurance History</h2>
        <?php
        // Retrieve insurance history from the cookie if available
        if (isset($_COOKIE['insurance_history'])) {
            $insurance_history = json_decode($_COOKIE['insurance_history'], true);
            foreach ($insurance_history as $record) {
                echo "<div class='history-item'>";
                echo "<p><strong>Receipt ID:</strong> " . htmlspecialchars($record['receipt_id']) . "</p>";
                echo "<p><strong>Insurance Type:</strong> " . htmlspecialchars($record['insurance_type']) . "</p>";
                echo "<p><strong>Amount:</strong> " . htmlspecialchars($record['amount']) . " BDT</p>";
                echo "<p><strong>Start Date:</strong> " . htmlspecialchars($record['start_date']) . "</p>";
                echo "<p><strong>Duration:</strong> " . htmlspecialchars($record['duration']) . " years</p>";
                echo "<p><strong>Date of Application:</strong> " . htmlspecialchars($record['date']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-history'>No insurance history available.</p>";
        }
        ?>
    </div>

    <!-- Tax Payment History Section -->
    <div class="history-container">
        <h2>Your Tax Payment History</h2>
        <?php
        if (isset($_SESSION['tax_history']) && !empty($_SESSION['tax_history'])) {
            foreach ($_SESSION['tax_history'] as $record) {
                echo "<div class='history-item'>";
                echo "<p><strong>Receipt ID:</strong> " . htmlspecialchars($record['receipt_id']) . "</p>";
                echo "<p><strong>Tax Amount:</strong> " . htmlspecialchars($record['tax_amount']) . " BDT</p>";
                echo "<p><strong>Payment Date:</strong> " . htmlspecialchars($record['payment_date']) . "</p>";
                echo "<p><strong>Payment Method:</strong> " . htmlspecialchars($record['payment_method']) . "</p>";
                echo "<p><strong>Date of Submission:</strong> " . htmlspecialchars($record['date']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-history'>No tax payment history available.</p>";
        }
        ?>
    </div>

    <div class="history-container">
    <h1>Your Marriage Certificate Applications</h1>
    <?php
    // Retrieve marriage history from the cookie
    if (isset($_COOKIE['marriage_history'])) {
        $marriageHistory = json_decode($_COOKIE['marriage_history'], true);

        if (!empty($marriageHistory)) {
            foreach ($marriageHistory as $record) {
                echo "<div class='history-item'>";
                echo "<p><strong>Partner's Name:</strong> " . htmlspecialchars($record['partner_name']) . "</p>";
                echo "<p><strong>Date of Marriage:</strong> " . htmlspecialchars($record['marriage_date']) . "</p>";
                echo "<p><strong>Your National ID:</strong> " . htmlspecialchars($record['national_id_1']) . "</p>";
                echo "<p><strong>Partner's National ID:</strong> " . htmlspecialchars($record['national_id_2']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-history'>No marriage certificate history available.</p>";
        }
    } else {
        echo "<p class='no-history'>No marriage certificate history available.</p>";
    }
    ?>
</div>
<div class="history-container">
<h1>Your Birth Certificate Applications</h1>
<?php
// Retrieve birth certificate history from the cookie
if (isset($_COOKIE['birth_history'])) {
    $birthHistory = json_decode($_COOKIE['birth_history'], true);

    if (!empty($birthHistory)) {
        foreach ($birthHistory as $record) {
            echo "<div class='history-item'>";
            echo "<p><strong>Full Name:</strong> " . htmlspecialchars($record['full_name']) . "</p>";
            echo "<p><strong>Address:</strong> " . htmlspecialchars($record['address']) . "</p>";
            echo "<p><strong>Parent's National ID:</strong> " . htmlspecialchars($record['parent_id']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-history'>No birth certificate history available.</p>";
    }
} else {
    echo "<p class='no-history'>No birth certificate history available.</p>";
}
?>
</div>

</body>
</html>
