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
    <title>Medical Insurance</title>
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
        }

        .header-container h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .header-container p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        /* Back Button */
        .back-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #17a673;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #1cc88a;
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
        .form-container input[type="date"]:hover,
        .form-container select:hover {
            border-color: #1cc88a;
            box-shadow: 0 0 5px rgba(28, 200, 138, 0.7);
        }
    </style>
</head>
<body>

    <?php include('topbar.php'); ?>

    <button class="back-button" onclick="window.location.href='health.php'">Back</button>

    <div class="header-container">
        <h1 style="color: white;">Welcome to the Medical Insurance Portal</h1>
        <p style="color: white;">Here you can apply for medical insurance and receive a receipt for your application. The insurance will cover medical expenses in case of unforeseen circumstances. Simply fill in the form below, and once submitted, you will receive a receipt that will be stored in your history.</p>
    </div>

    <div class="form-container">
        <h2 style="color: white;">Apply for Medical Insurance</h2>
        <form action="submit_insurance.php" method="POST">
        <label for="insurance_type" style="color: white;">Insurance Type:</label>
        <select name="insurance_type" id="insurance_type" required>
                <option value="Basic">Basic Plan</option>
                <option value="Premium">Premium Plan</option>
            </select>

            <label for="amount" style="color: white;">Coverage Amount (BDT):</label>
            <input type="number" name="amount" id="amount" required>

            <label for="start_date" style="color: white;">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>

            <label for="duration" style="color: white;">Duration (in years):</label>
            <input type="number" name="duration" id="duration" required>

            <input type="submit" value="Apply for Insurance">
        </form>
    </div>

</body>
</html>
