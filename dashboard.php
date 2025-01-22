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
    <title>Dashboard</title>
    <style>
        /* General body styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #6699CC, #00bfff); /* Gradient background */
            color: #ffffff; /* White text for readability */
            animation: fadeInBackground 1.5s ease-out; /* Background fade-in */
        }

        /* Container styling */
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            animation: fadeInContainer 1s ease-out; /* Container fade-in */
            color: #333; /* Dark text for contrast */
        }

        /* Title styling */
        h1, h3 {
            text-align: center;
            color: #007bff; /* Blue title */
            animation: fadeInTitle 1s ease-out; /* Title fade-in */
        }

        /* Description styling */
        p {
            line-height: 1.6;
            animation: fadeInText 1.2s ease-out; /* Paragraph fade-in */
        }

        /* Links styling */
        a {
            color: #007bff; /* Blue links */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3; /* Darker blue on hover */
        }

        /* Menu styling */
        ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        ul li {
            background: #007bff; /* Blue background */
            padding: 10px 15px;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            animation: bounceIn 1.5s ease infinite alternate; /* Bounce animation */
            cursor: pointer;
        }

        ul li a {
            color: #ffffff; /* White text for links */
            font-size: 16px;
        }

        ul li:hover {
            background: #0056b3; /* Darker blue on hover */
        }

        /* Hidden information sections */
        .feature-info {
            display: none;
            background-color: #f9f9f9;
            padding: 15px;
            margin-top: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .feature-info h4 {
            color: #007bff;
            font-size: 1.3rem;
        }

        /* Animations */
        @keyframes fadeInBackground {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInContainer {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInTitle {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInText {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Include the top bar -->
        <?php include('topbar.php'); ?>

        <!-- Welcome message -->
        <h1 class="header-title">Welcome To Your Dashboard, 
    <?php echo isset($_SESSION["name"]) ? htmlspecialchars($_SESSION["name"]) : "Guest"; ?>!
</h1>

        <!-- Description about the Dashboard -->
        <p>
            The Government Online Service Portal Dashboard serves as a centralized hub where users can seamlessly access and manage various government services and resources. Designed for convenience and efficiency, the dashboard offers a user-friendly interface that caters to both citizens and administrative personnel.
        </p>
        <p>
            <strong>Key Features:</strong>
            <ul>
                <li onclick="showInfo('account-overview')">Personalized account overview</li>
                <li onclick="showInfo('service-access')">Service access and tracking</li>
                <li onclick="showInfo('notifications')">Notifications and alerts</li>
                <li onclick="showInfo('document-management')">Document management</li>
                <li onclick="showInfo('history')">History and records</li>
                <li onclick="showInfo('customer-support')">Customer support</li>
            </ul>
        </p>

        <!-- Hidden Information Sections -->
        <div id="account-overview" class="feature-info">
            <h4>Personalized Account Overview</h4>
            <p>This feature allows you to view and manage your account details, including balances, payment history, and recent activities.</p>
        </div>

        <div id="service-access" class="feature-info">
            <h4>Service Access and Tracking</h4>
            <p>You can track the status of various services, view active requests, and access details related to service providers.</p>
        </div>

        <div id="notifications" class="feature-info">
            <h4>Notifications and Alerts</h4>
            <p>Stay updated with important alerts, notifications about your account, and service-related updates.</p>
        </div>

        <div id="document-management" class="feature-info">
            <h4>Document Management</h4>
            <p>This feature allows you to upload, download, and manage all your documents related to services and account records.</p>
        </div>

        <div id="history" class="feature-info">
            <h4>History and Records</h4>
            <p>View a detailed history of your transactions, service usage, and important account changes.</p>
        </div>

        <div id="customer-support" class="feature-info">
            <h4>Customer Support</h4>
            <p>Get assistance from the customer support team through chat, email, or phone, and resolve any issues you encounter.</p>
        </div>

        <!-- Links to other pages -->
        <h3>Quick Links</h3>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="viewprofile.php">View Profile</a></li>
            <li><a href="editprofile.php">Edit Email</a></li>
            <li><a href="changeprofilephoto.php">Change Profile Photo</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="signout.php">Sign Out</a></li>
        </ul>

        <!-- Additional Links -->
        <h3>Additional Information</h3>
        <p><a href="information.php">Click here to access more information</a></p>
        <h3>History</h3>
        <p><a href="history.php">Click here to view your history</a></p>
    </div>

    <script>
        function showInfo(feature) {
            var allFeatures = document.querySelectorAll('.feature-info');
            allFeatures.forEach(function(featureDiv) {
                featureDiv.style.display = 'none';
            });

            // Show the clicked feature's info
            var featureDiv = document.getElementById(feature);
            if (featureDiv) {
                featureDiv.style.display = 'block';
            }
        }
    </script>
</body>
</html>
