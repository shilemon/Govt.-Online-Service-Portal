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
    <title>Health Services | Government Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header and Back Button Styling */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #007BFF;
            color: white;
        }

        .header-container h1 {
            font-size: 36px;
            margin: 0;
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

        /* About Us Section Styling */
        .about-us {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .about-us h2 {
            color: #007BFF;
            font-size: 20px;
            margin: 0;
        }

        .about-us:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            background-color: #e6f0ff;
        }

        .about-us-content {
            display: none;
            margin-top: 10px;
            color: #555;
            font-size: 16px;
        }

        .about-us.open .about-us-content {
            display: block;
        }

        /* Health Items Styling */
        .health-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin: 40px 0;
            padding: 0 20px;
        }

        .health-item {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .health-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .health-item img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .health-item:hover img {
            transform: scale(1.1);
        }

        .health-item h3 {
            color: #333;
            font-size: 22px;
            margin: 10px 0;
        }

        .health-item p {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .health-item a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .health-item a:hover {
            color: #0056b3;
        }

        /* Fade-in Animation for Main Sections */
        .health-container {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Include the top bar -->
    <?php include('topbar.php'); ?>

    <div class="health-container">
        <div class="header-container">
        <h1 style="color: black; text-shadow: 2px 2px 5px gray;">Government Health Services</h1>
        <!-- Back Button -->
            <a href="private.php" class="back-button">Back</a>
        </div>

        <p>Welcome to the official health services portal. Here, you can access a wide range of health programs, facilities, and resources offered by the government.</p>

        <!-- About Us Section -->
        <div class="about-us" onclick="toggleAboutUs()">
            <h2>About Us</h2>
            <div class="about-us-content">
                <p style="color: black;">
                    The Government Health Services portal is dedicated to providing citizens with comprehensive and accessible health resources. 
                    Our mission is to ensure the well-being of all individuals through programs and services that address medical, mental, 
                    and preventive health needs. We are committed to transparency, efficiency, and compassion in delivering healthcare to every corner of our nation.
                </p>
            </div>
        </div>

        <!-- Main Sections -->
        <div class="health-grid">
            <!-- Free Clinics -->
            <div class="health-item">
                <img src="image/clinic.png" alt="Free Clinics">
                <h3>Free Clinics</h3>
                <p>Find free clinics in your area for basic medical checkups and treatments.</p>
                <a href="freeclinics.php">Learn More</a>
            </div>

            <!-- Vaccination Programs -->
            <div class="health-item">
                <img src="image/vaccine.jpg" alt="Vaccination Programs">
                <h3>Vaccination Programs</h3>
                <p>Stay updated on the latest government vaccination drives and locations.</p>
                <a href="vaccination.php">Learn More</a>
            </div>

            <!-- Emergency Services -->
            <div class="health-item">
                <img src="image/emrgency.jpg" alt="Emergency Services">
                <h3>Emergency Services</h3>
                <p>Access 24/7 emergency medical services in your region.</p>
                <a href="emergency.php">Learn More</a>
            </div>

            <!-- Mental Health Support -->
            <div class="health-item">
                <img src="image/mental.jpg" alt="Mental Health Support">
                <h3>Mental Health Support</h3>
                <p>Connect with counselors and mental health professionals.</p>
                <a href="mentalhealth.php">Learn More</a>
            </div>

            <!-- Health Insurance -->
            <div class="health-item">
                <img src="image/healthcare.png" alt="Health Insurance">
                <h3>Health Insurance</h3>
                <p>Learn about government-sponsored health insurance schemes.</p>
                <a href="insurance.php">Learn More</a>
            </div>
        </div>
    </div>

    <script>
        function toggleAboutUs() {
            const aboutUsSection = document.querySelector('.about-us');
            aboutUsSection.classList.toggle('open');
        }
    </script>
    <<footer style="background-color: #add8e6; color: #fff; display: flex; justify-content: center; align-items: center; height: 60px;">
    <p style="margin: 0;">&copy; 2025 Bangladesh Government Portal. All rights reserved.</p>
</footer>


</body>
</html>
