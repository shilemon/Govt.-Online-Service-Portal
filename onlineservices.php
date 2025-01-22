<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Services - Bangladesh Government</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }

        .header {
            background-color: #0062A1;
            color: white;
            text-align: center;
            padding: 50px;
            animation: fadeIn 2s ease-in-out;
        }

        .header h1 {
            font-size: 36px;
            margin: 0;
        }

        .header p {
            font-size: 18px;
            margin-top: 10px;
        }

        .services-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 50px 20px;
        }

        .service-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 280px;
            margin: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 20px;
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .service-icon {
            font-size: 50px;
            color: #0062A1;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .service-card:hover .service-icon {
            color: #1cc88a;
        }

        .service-card h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
        }

        .service-card p {
            font-size: 16px;
            color: #555;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
            animation: fadeIn 2s ease-in-out;
        }

        .footer p {
            margin: 10px 0;
        }

        .footer a {
            color: #1cc88a;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Back Button */
        .back-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #0062A1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #1cc88a;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @media (max-width: 768px) {
            .services-container {
                flex-direction: column;
                align-items: center;
            }
        }

    </style>
</head>
<body>

    <!-- Back Button -->
    <button class="back-button" onclick="window.location.href='private.php';">Back</button>

    <!-- Header -->
    <div class="header">
        <h1>Bangladesh Government Online Services</h1>
        <p>Explore the various online services provided by the Bangladesh Government</p>
    </div>

    <!-- Online Services Section -->
    <div class="services-container">
        <!-- Service 1: Birth Registration -->
        <div class="service-card">
            <div class="service-icon">📑</div>
            <h3>Birth Registration</h3>
            <p>Register your child's birth online and receive the official certificate issued by the government.</p>
            <a href="birth_registration.php" class="more-link">Learn More</a>
        </div>

        <!-- Service 2: National ID Card -->
        <div class="service-card">
            <div class="service-icon">💳</div>
            <h3>National ID Card</h3>
            <p>Apply for your National ID card online through the official portal of the Bangladesh Government.</p>
            <a href="national_id.php" class="more-link">Learn More</a>
        </div>

        <!-- Service 3: Passport Services -->
        <div class="service-card">
            <div class="service-icon">📜</div>
            <h3>Passport Services</h3>
            <p>Apply for your passport online and track the status of your application.</p>
            <a href="passport_services.php" class="more-link">Learn More</a>
        </div>

        <!-- Service 4: Land Management -->
        <div class="service-card">
            <div class="service-icon">🏠</div>
            <h3>Land Management</h3>
            <p>Apply for land-related services such as property registration and mutation online.</p>
            <a href="land_management.php" class="more-link">Learn More</a>
        </div>

        <!-- Service 5: Legal Aid Services -->
        <div class="service-card">
            <div class="service-icon">🧑‍⚖️</div>
            <h3>Legal Aid Services</h3>
            <p>Access online legal aid and consultation services for various legal matters in Bangladesh.</p>
            <a href="legal_aid.php" class="more-link">Learn More</a>
        </div>

        <!-- Service 6: Travel Information -->
        <div class="service-card">
            <div class="service-icon">🚢</div>
            <h3>Travel Information</h3>
            <p>Get up-to-date information on visa, travel restrictions, and ferry services provided by the government.</p>
            <a href="travel_info.php" class="more-link">Learn More</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>For more information on other online services, visit the official <a href="https://www.bangladesh.gov.bd/" target="_blank">Bangladesh Government Portal</a>.</p>
        <p>&copy; 2025 Bangladesh Government. All Rights Reserved.</p>
    </div>

</body>
</html>
