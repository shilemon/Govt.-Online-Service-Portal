<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doseName = $_POST["dose_name"];
    $date = $_POST["date"];
    $disease = $_POST["disease"];
    $nextDate = $_POST["next_date"];

    
    if (!isset($_SESSION["vaccination_history"])) {
        $_SESSION["vaccination_history"] = [];
    }

    $_SESSION["vaccination_history"][] = [
        "dose_name" => $doseName,
        "date" => $date,
        "disease" => $disease,
        "next_date" => $nextDate
    ];

    $vaccinationHistory = isset($_SESSION['vaccination_history']) ? json_encode($_SESSION['vaccination_history']) : [];
    setcookie("vaccination_history", $vaccinationHistory, time() + (30 * 24 * 60 * 60), "/"); 

    $receipt = "
        <h2 style='color: black;'>Vaccination Receipt</h2>
        <p><strong style='color: black;'>Dose Name:</strong> $doseName</p>
        <p><strong style='color: black;'>Date:</strong> $date</p>
        <p><strong style='color: black;'>Disease:</strong> $disease</p>
        <p><strong style='color: black;'>Next Vaccination Date:</strong> $nextDate</p>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Programs</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-header h1 {
            margin: 0;
            color: black;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input, .form-container select, .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .receipt-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: black;
        }

        .back-button {
            padding: 10px 20px;
            background: linear-gradient(120deg, #007BFF, #0056b3);
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .back-button:hover {
            background: linear-gradient(120deg, #0056b3, #003c82);
            transform: translateY(-2px);
        }

        .health-container {
            animation: fadeIn 1.5s ease-in-out;
        }
    </style>
</head>
<body>
   
    <?php include('topbar.php'); ?>

    <div class="form-container">
        <div class="form-header">
            <h1>Vaccination Programs</h1>
            <a href="health.php" class="back-button">Back</a>
        </div>
        <form method="POST" action="vaccination.php">
            <label for="dose_name" style="color: black;">Vaccination Dose Name:</label>
            <input type="text" id="dose_name" name="dose_name" required>

            <label for="date" style="color: black;">Date of Vaccination:</label>
            <input type="date" id="date" name="date" required>

            <label for="disease" style="color: black;">Disease:</label>
            <select id="disease" name="disease" required>
                <option value="">Select a disease</option>
                <option value="Polio">Polio</option>
                <option value="Measles">Measles</option>
                <option value="Hepatitis">Hepatitis</option>
                <option value="COVID-19">COVID-19</option>
                <option value="Tetanus">Tetanus</option>
            </select>

            <label for="next_date" style="color: black;">Next Vaccination Date:</label>
            <input type="date" id="next_date" name="next_date" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <?php if (isset($receipt)) { ?>
        <div class="receipt-container">
            <?php echo $receipt; ?>
        </div>
    <?php 
}
 ?>

    <!-- JavaScript functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dateInput = document.getElementById("date");
            const nextDateInput = document.getElementById("next_date");

            nextDateInput.addEventListener("change", function () {
                const dateValue = new Date(dateInput.value);
                const nextDateValue = new Date(nextDateInput.value);

                if (nextDateValue <= dateValue) {
                    alert("Next Vaccination Date must be after the Date of Vaccination.");
                    nextDateInput.value = ""; 
                }
            });
        });
    </script>
</body>
</html>
