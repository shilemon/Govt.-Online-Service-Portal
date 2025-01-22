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
    <title>National ID Information | Bangladesh Government Portal</title>
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

        /* NID Info Container */
        .nid-info-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            opacity: 0;
            animation: fadeIn 1.5s ease-out forwards;
        }

        /* Sections Styling */
        .nid-section {
            background-color: white;
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .nid-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .nid-section h2 {
            color: #003366;  /* Dark Blue */
            font-size: 28px;
            margin-bottom: 15px;
        }

        .nid-section p, .nid-section ul, .nid-section ol {
            font-size: 18px;
            line-height: 1.6;
            color: #555;  /* Light Gray Text */
        }

        .nid-section ul, .nid-section ol {
            margin-left: 20px;
        }

        .nid-section a {
            text-decoration: none;
            font-weight: bold;
            color: #4A90E2;  /* Light Blue */
            transition: color 0.3s ease;
        }

        .nid-section a:hover {
            color: #003366;  /* Dark Blue on hover */
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

        /* About Us Section Styling */
        .about-us-container {
            margin-top: 30px;
        }

        .about-us-button {
            background-color: #003366;  /* Dark Blue */
            color: white;
            padding: 15px;
            font-size: 20px;
            width: 100%;
            text-align: left;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .about-us-button:hover {
            background-color: #4A90E2;  /* Light Blue */
        }

        .about-us-content {
            display: none;
            padding: 15px;
            background-color: #F9F9F9;  /* Very Light Gray */
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
        }

        .about-us-content p {
            font-size: 18px;
            color: #555;  /* Light Gray Text */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 28px;
            }

            .nid-section {
                padding: 20px;
            }

            .nid-section h2 {
                font-size: 24px;
            }

            .nid-info-container {
                margin: 30px 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Include the top bar -->
    <?php include('topbar.php'); ?>

    <div class="header-container">
    <h1 class="header-title" style="color: white;">National ID Information</h1>
    <!-- Back Button -->
        <a href="private.php" class="back-button">Back</a>
    </div>


    <!-- National ID Information -->
    <div class="nid-info-container">
        <section class="nid-section">
            <h2>What is the National ID?</h2>
            <p>The National ID (NID) is a unique identification number assigned to all Bangladeshi citizens. This ID serves as an official identification for various government services, voting, and many other legal purposes. The NID is issued by the <strong>Election Commission of Bangladesh</strong>.</p>
        </section>

        <section class="nid-section">
            <h2>How to Apply for an NID</h2>
            <p>To apply for a National ID in Bangladesh, you must be a Bangladeshi citizen aged 18 years or older. You will need to provide documents such as:</p>
            <ul>
                <li>Birth certificate</li>
                <li>Proof of residence</li>
                <li>Passport-sized photograph</li>
            </ul>
            <p>You can apply for the NID online through the official <strong>Election Commission website</strong> or visit your local NID registration office.</p>
        </section>

        <section class="nid-section">
            <h2>Important Features of the NID</h2>
            <ul>
                <li><strong>Unique Identification:</strong> A single ID for all legal purposes.</li>
                <li><strong>Voting Rights:</strong> Essential for participating in national elections.</li>
                <li><strong>Access to Government Services:</strong> Required for accessing various government services like health, education, and more.</li>
                <li><strong>Banking and Financial Services:</strong> Used for opening bank accounts and other financial transactions.</li>
                <li><strong>Passport Issuance:</strong> Required for obtaining a passport.</li>
            </ul>
        </section>

        <section class="nid-section">
            <h2>Lost or Damaged NID</h2>
            <p>If your NID is lost or damaged, you must report it immediately. You can apply for a replacement or reissue by following the below steps:</p>
            <ol>
                <li>Report the loss to your local police station and obtain a police report.</li>
                <li>Visit the Election Commission’s NID office or apply online for a reissue.</li>
                <li>Provide necessary documents such as your police report and a passport-sized photograph.</li>
            </ol>
            <p>In case of a damaged NID, bring the damaged card along with the required documents for a replacement.</p>
        </section>

        <section class="nid-section">
            <h2>Track NID Status</h2>
            <p>You can track the status of your NID application online through the official <strong>Election Commission Portal</strong>. Simply enter your application number to check the status of your NID card.</p>
            <a href="https://www.ecs.gov.bd" target="_blank">Click here to track your NID application status</a>
        </section>

        <section class="nid-section">
            <h2>Update Your NID Information</h2>
            <p>If you need to update personal details like your address, name, or other information on your NID, you can request an update through the <strong>Election Commission Portal</strong> or visit the NID office.</p>
            <p><strong>Note:</strong> You must provide relevant supporting documents for any update requests.</p>
        </section>

        <!-- About Us Section (Dropdown) -->
        <div class="about-us-container">
            <button class="about-us-button" onclick="toggleAboutUs()">About Us</button>
            <div id="aboutUsContent" class="about-us-content">
                <p>The National ID system in Bangladesh is designed to provide a unique identification number for every citizen to ensure better governance, transparency, and access to government services. The National ID also helps the government keep track of population statistics, voter rolls, and provide services more effectively. Through the Election Commission of Bangladesh, citizens can apply for their NID, update their details, and access various services related to their ID.</p>
            </div>
        </div>
    </div>

    <script>
        window.onload = () => {
            document.querySelector('.nid-info-container').classList.add('fadeIn');
        };

        /* Toggle the About Us section visibility */
        function toggleAboutUs() {
            const content = document.getElementById("aboutUsContent");
            content.style.display = content.style.display === "block" ? "none" : "block";
        }
    </script>
    <footer style="background-color: #000; color: #fff; text-align: center; padding: 20px;">
    <p>&copy; 2025 Bangladesh Government Portal. All rights reserved.</p>
</footer>

</body>
</html>
