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
    <title>Tax Payment</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4e73df, #1cc88a);
            color: white;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        .header-container {
            text-align: center;
            padding: 50px 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-bottom: 3px solid #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .header-container h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .header-container p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        /* Back Button Style */
        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ff4d4d;
            color: white;
            font-size: 1.2em;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #e60000;
        }

        /* Form Section */
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            animation: fadeIn 2s ease;
        }

        .form-container h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 1.1em;
            margin-bottom: 10px;
            display: block;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            background-color: #fff;
            color: #333;
        }

        .form-container input[type="submit"] {
            background-color: #1cc88a;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #17a673;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hover effects */
        .form-container input[type="text"]:hover,
        .form-container input[type="number"]:hover,
        .form-container select:hover {
            border-color: #1cc88a;
            box-shadow: 0 0 5px rgba(28, 200, 138, 0.7);
        }
    </style>
</head>
<body>

    <?php include('topbar.php'); ?>

    <div class="header-container">
        <!-- Back Button -->
        <button class="back-button" onclick="window.location.href='private.php';">Back</button>

        <h1 style="color: white;">Welcome to the Tax Payment Portal</h1>
        <p style="color: white;">Here you can submit your taxes to the government. Once you submit the form, a receipt will be generated and stored in your history.</p>

    </div>

    <div class="form-container">
        <h2 style="color: white;">Submit Your Taxes</h2>
        <form id="taxForm" method="POST">
            <label for="tax_type" style="color: white;">Tax Type:</label>
            <select name="tax_type" id="tax_type" required>
                <option value="Income Tax">Income Tax</option>
                <option value="Value Added Tax (VAT)">Value Added Tax (VAT)</option>
                <option value="Customs Duty">Customs Duty</option>
                <option value="Property Tax">Property Tax</option>
                <option value="Withholding Tax">Withholding Tax</option>
            </select>

            <label for="tax_amount" style="color: white;">Tax Amount (BDT):</label>
            <input type="number" name="tax_amount" id="tax_amount" required>

            <label for="payment_date" style="color: white;">Payment Date:</label>
            <input type="date" name="payment_date" id="payment_date" required>

            <label for="payment_method" style="color: white;">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="Bank">Bank</option>
                <option value="Online">Online Payment</option>
            </select>

            <!-- Bank selection if Bank is selected -->
            <label for="bank_name" style="color: white;">Bank Name (Only if Bank is selected):</label>
            <select name="bank_name" id="bank_name" style="display:none;">
                <option value="Sonali Bank">Sonali Bank</option>
                <option value="EBL Bank">Eastern Bank Limited</option>
                <option value="DBBL">Dutch-Bangla Bank</option>
                <option value="BRAC Bank">BRAC Bank</option>
                <option value="Standard Chartered">Standard Chartered</option>
            </select>

            <!-- New fields for City and National ID -->
            <label for="city_name" style="color: white;">City Name:</label>
            <input type="text" name="city_name" id="city_name" required>

            <label for="nid_number" style="color: white;">National ID Number:</label>
            <input type="text" name="nid_number" id="nid_number" required>

            <input type="submit" value="Submit Tax Payment">
        </form>
    </div>

    <script>
        // Show or hide bank selection based on payment method
        document.getElementById('payment_method').addEventListener('change', function() {
            var bankSelect = document.getElementById('bank_name');
            if (this.value === 'Bank') {
                bankSelect.style.display = 'block'; 
            } else {
                bankSelect.style.display = 'none';   
            }
        });

        // Submit  AJAX
        document.getElementById('taxForm').addEventListener('submit', function(event) {
            event.preventDefault();  

            var formData = new FormData(this);  

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'submit_tax.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert('Tax payment submitted successfully!');
                } else {
                    alert('Error submitting tax payment.');
                }
            };
            xhr.send(formData);
        });
    </script>

</body>
</html>
