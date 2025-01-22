<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}

// Handle Marriage Certificate Application
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["partner_name"])) {
    $partnerName = htmlspecialchars($_POST["partner_name"]);
    $marriageDate = htmlspecialchars($_POST["marriage_date"]);
    $nationalId1 = htmlspecialchars($_POST["national_id_1"]);
    $nationalId2 = htmlspecialchars($_POST["national_id_2"]);

    // Create a new record for the cookie
    $newRecord = [
        "partner_name" => $partnerName,
        "marriage_date" => $marriageDate,
        "national_id_1" => $nationalId1,
        "national_id_2" => $nationalId2,
    ];

    // Retrieve existing data from the cookie
    $marriageHistory = [];
    if (isset($_COOKIE['marriage_history'])) {
        $marriageHistory = json_decode($_COOKIE['marriage_history'], true);
    }

    // Add the new record
    $marriageHistory[] = $newRecord;

    // Save back to the cookie
    setcookie("marriage_history", json_encode($marriageHistory), time() + (86400 * 30), "/"); // 30 days
    header("Location: history.php"); // Redirect to history page
    exit();
}

// Handle Birth Certificate Application
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["full_name"])) {
    $fullName = htmlspecialchars($_POST["full_name"]);
    $birthDate = htmlspecialchars($_POST["birth_date"]);
    $parentId = htmlspecialchars($_POST["parent_id"]);
    $address = htmlspecialchars($_POST["address"]);

    // Create a new record for the cookie
    $newRecord = [
        "full_name" => $fullName,
        "birth_date" => $birthDate,
        "parent_id" => $parentId,
        "address" => $address,
    ];

    // Retrieve existing data from the cookie
    $birthHistory = [];
    if (isset($_COOKIE['birth_history'])) {
        $birthHistory = json_decode($_COOKIE['birth_history'], true);
    }

    // Add the new record
    $birthHistory[] = $newRecord;

    // Save back to the cookie
    setcookie("birth_history", json_encode($birthHistory), time() + (86400 * 30), "/"); // 30 days
    header("Location: history.php"); // Redirect to history page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates Information | Bangladesh Government Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F4F7;  /* Soft Gray */
            color: #333;  /* Dark Gray Text */
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        .header-container {
            background-color: #003366;  /* Dark Blue */
            color: white;
            text-align: center;
            padding: 30px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .header-title {
            font-size: 36px;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .back-button {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #ffffff;
            color: #003366;
            border: 2px solid #003366;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: #003366;
            color: white;
        }

        /* Certificates Info Container */
        .certificates-info-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            opacity: 0;
            animation: fadeIn 1.5s ease-out forwards;
        }

        /* Sections Styling */
        .certificate-section {
            background-color: white;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .certificate-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .certificate-section h2 {
            color: #003366;  /* Dark Blue */
            font-size: 28px;
            margin-bottom: 15px;
        }

        .certificate-section p, .certificate-section ul, .certificate-section ol {
            font-size: 18px;
            line-height: 1.6;
            color: #555;  /* Light Gray Text */
        }

        .certificate-section ul, .certificate-section ol {
            margin-left: 20px;
        }

        .certificate-section a {
            text-decoration: none;
            font-weight: bold;
            color: #4A90E2;  /* Light Blue */
            transition: color 0.3s ease;
        }

        .certificate-section a:hover {
            color: #003366;  /* Dark Blue on hover */
        }

        /* Form Styling */
        .certificate-form {
            background-color: #F9FAFB;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }

        .certificate-form input, .certificate-form select, .certificate-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .certificate-form button {
            background-color: #003366;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .certificate-form button:hover {
            background-color: #004b87;
        }

        /* Animation for Sections */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 28px;
            }

            .certificate-section {
                padding: 20px;
            }

            .certificate-section h2 {
                font-size: 24px;
            }

            .certificates-info-container {
                margin: 30px 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Include the top bar -->
    <?php include('topbar.php'); ?>

    <div class="header-container">
        <h1 class style="color: white;"="header-title">Certificates Information</h1>
        <!-- Back Button -->
        <a href="private.php" class="back-button">Back</a>
    </div>

    <p class="intro-text">Here you can find all the important details related to obtaining Birth, Marriage, and Death Certificates from the government.</p>

    <!-- Certificates Information -->
    <div class="certificates-info-container">
        <!-- Birth Certificate Section -->
        <section class="certificate-section">
            <h2 style="color: black;">Birth Certificate</h2>
            <p>The birth certificate is an official document issued by the government that records the birth of a child...</p>
            <div class="certificate-form">
                <h3 style="color: black;">Apply for Birth Certificate</h3>
                <form action="certificates.php" method="POST">
                    <label for="full_name" style="color: black;">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" required>

                    <label for="birth_date" style="color: black;">Date of Birth:</label>
                    <input type="date" id="birth_date" name="birth_date" required>

                    <label for="parent_id" style="color: black;">Parent's National ID:</label>
                    <input type="text" id="parent_id" name="parent_id" required>

                    <label for="address" style="color: black;">Address:</label>
                    <textarea id="address" name="address" rows="3" required></textarea>

                    <button type="submit">Submit Application</button>
                </form>
            </div>
        </section>

        <!-- Marriage Certificate Section -->
        <section class="certificate-section">
            <h2>Marriage Certificate</h2>
            <p>The marriage certificate is an official document that proves the legal union of a couple...</p>
            <div class="certificate-form">
                <h3 style="color: black;">Apply for Marriage Certificate</h3>
                <form action="certificates.php" method="POST">
                    <label for="partner_name" style="color: black;">Partner's Full Name:</label>
                    <input type="text" id="partner_name" name="partner_name" required>

                    <label for="marriage_date" style="color: black;">Date of Marriage:</label>
                    <input type="date" id="marriage_date" name="marriage_date" required>

                    <label for="national_id_1" style="color: black;">Your National ID:</label>
                    <input type="text" id="national_id_1" name="national_id_1" required>

                    <label for="national_id_2" style="color: black;">Partner's National ID:</label>
                    <input type="text" id="national_id_2" name="national_id_2" required>

                    <button type="submit">Submit Application</button>
                </form>
            </div>
        </section>

        <!-- Death Certificate Section -->
        <section class="certificate-section">
            <h2>Death Certificate</h2>
            <p>A death certificate is a legal document issued by the government that confirms the death of an individual...</p>
            <div class="certificate-form">
                <h3 style="color: black;">Apply for Death Certificate</h3>
                <form action="submit_application.php" method="POST">
                    <label for="deceased_name" style="color: black;">Deceased's Full Name:</label>
                    <input type="text" id="deceased_name" name="deceased_name" required>

                    <label for="relationship" style="color: black;">Your Relationship with the Deceased:</label>
                    <input type="text" id="relationship" name="relationship" required>

                    <label for="death_date" style="color: black;">Date of Death:</label>
                    <input type="date" id="death_date" name="death_date" required>

                    <label for="death_notification" style="color: black;">Death Notification:</label>
                    <input type="file" id="death_notification" name="death_notification" accept="image/*,.pdf" required>

                    <button type="submit">Submit Application</button>
                </form>
            </div>
        </section>
    </div>

    <script>
        /* Fade-in Animation for Main Sections */
        window.onload = () => {
            document.querySelector('.certificates-info-container').classList.add('fadeIn');
        };
    </script>
</body>
</html>
