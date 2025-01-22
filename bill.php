<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "app_users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = htmlspecialchars($_POST['account_number']);
    $amount = htmlspecialchars($_POST['amount']);
    $district = htmlspecialchars($_POST['district']);
    $date = date("Y-m-d H:i:s");

    // Save bill payment record to the database
    $stmt = $conn->prepare("INSERT INTO bill_payments (account_number, amount, district, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $account_number, $amount, $district, $date);
    
    if ($stmt->execute()) {
        // Set a cookie for the last payment
        setcookie('last_payment', json_encode([
            'account_number' => $account_number,
            'amount' => $amount,
            'district' => $district,
            'date' => $date,
        ]), time() + 3600, "/"); // Cookie expires in 1 hour

        // Redirect to history page with a success message
        header("Location: history.php?payment_success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Electric Bill</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #1D2B64, #F8C301);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            margin: 0;
            padding: 0;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .bill-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            transform: translateY(-30px);
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bill-container h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            color: #1D2B64;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        label:hover {
            color: #F8C301;
        }

        input, select {
            padding: 14px;
            margin-bottom: 20px;
            border: 2px solid #1D2B64;
            border-radius: 8px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        input:focus, select:focus {
            border-color: #F8C301;
            box-shadow: 0 0 10px rgba(248, 195, 1, 0.6);
            outline: none;
        }

        button {
            background-color: #F8C301;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #1D2B64;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(2px);
        }

        .description {
            background-color: #fff;
            margin: 40px auto;
            padding: 20px;
            border-radius: 15px;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .description h2 {
            color: #1D2B64;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .description p {
            font-size: 1rem;
            color: #333;
            line-height: 1.5;
        }

        .back-button {
            position: fixed;
            top: 100px;  /* Increased to move it further down */
            right: 20px;
            background-color: #F8C301;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #1D2B64;
        }
    </style>
</head>
<body>
    <?php include('topbar.php'); ?>

    <div class="bill-container">
        <h1>Pay Your Electric Bill</h1>
        <form method="POST">
            <label for="account_number">Electric Account Number:</label>
            <input type="text" id="account_number" name="account_number" required>

            <label for="amount">Amount (in BDT):</label>
            <input type="number" id="amount" name="amount" required>

            <label for="district">Select District:</label>
            <select id="district" name="district" required>
                <option value="" disabled selected>Choose a district</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Khulna">Khulna</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Barisal">Barisal</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Mymensingh">Mymensingh</option>
            </select>

            <button type="submit">Pay Now</button>
        </form>
    </div>

    <!-- Description about Bangladesh Power Development Board -->
    <div class="description">
        <h2>About Bangladesh Power Development Board (BPDB)</h2>
        <p>The Bangladesh Power Development Board (BPDB) is the state-owned utility company responsible for the generation, transmission, and distribution of electricity in Bangladesh. It plays a key role in ensuring the provision of reliable and affordable electricity to meet the growing demand of the country's households, industries, and businesses.</p>
        <p>BPDB is committed to improving the power infrastructure in Bangladesh, expanding its reach, and ensuring a sustainable and environmentally friendly energy future for the country.</p>
    </div>

    <!-- Back button -->
    <a href="private.php"><button class="back-button">Back</button></a>

</body>
</html>
