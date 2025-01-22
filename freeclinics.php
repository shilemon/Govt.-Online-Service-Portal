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
    <title>Free Clinics | Government Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Free Clinics Page Specific Styling */
        .clinic-container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .clinic-container h1 {
            text-align: center;
            color: #007BFF;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .clinic-container p {
            text-align: center;
            color: #555;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .clinic-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .clinic-item {
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: left;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .clinic-item:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .clinic-item h3 {
            color: #007BFF;
            margin-bottom: 10px;
        }

        .clinic-item p {
            color: #333;
            margin-bottom: 5px;
        }

        .clinic-item .help-number {
            color: #666;
            font-weight: bold;
        }

        /* Back Button Styling */
        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Include the top bar -->
    <?php include('topbar.php'); ?>

    <div class="clinic-container">
        <!-- Back Button -->
        <a href="health.php" class="back-button">Back</a>

        <h1>Government Hospitals & Free Clinics</h1>
        <p>Here is a list of government hospitals offering free medical services. For any queries or emergencies, feel free to contact their help numbers.</p>

        <!-- List of Clinics -->
        <div class="clinic-list">
            <!-- Example Hospital 1 -->
            <div class="clinic-item">
                <h3>Dhaka Government Hospital</h3>
                <p>Address: Secretariat Rd, Dhaka 1000</p>
                <p>Specialty: General Medicine, Pediatrics</p>
                <p class="help-number">Help Number: +1 800 123 4567</p>
            </div>

            <!-- Example Hospital 2 -->
            <div class="clinic-item">
                <h3>Chittagong Medical</h3>
                <p>Address: 57 K.B. Fazlul Kader Rd, Chittagong 4203</p>
                <p>Specialty: Orthopedics, Maternity Care</p>
                <p class="help-number">Help Number: +1 800 234 5678</p>
            </div>

            <!-- Example Hospital 3 -->
            <div class="clinic-item">
                <h3>Sir Salimullah Medical</h3>
                <p>Address: Mitford Road, Babubazar, Old Dhaka</p>
                <p>Specialty: Cardiology, Emergency Services</p>
                <p class="help-number">Help Number: +1 800 345 6789</p>
            </div>

            <!-- Example Hospital 4 -->
            <div class="clinic-item">
                <h3>Sher-E-Bangla Medical College</h3>
                <p>Address: 101 Metro Avenue, Barisal</p>
                <p>Specialty: Cancer Care, Advanced Diagnostics</p>
                <p class="help-number">Help Number: +1 800 456 7890</p>
            </div>

            <!-- Example Hospital 5 -->
            <div class="clinic-item">
                <h3>Rajshahi Medical</h3>
                <p>Address: Medical College Road
                Laxmipur, Rajpara, Rajshahi-6100</p>
                <p>Specialty: Cancer Care, Advanced Diagnostics</p>
                <p class="help-number">Help Number: 0721-772150</p>
            </div>

            <!-- Example Hospital 6 -->
            <div class="clinic-item">
                <h3>Army Medical College Chattogram</h3>
                <p>Address: Army Medical College Chattogram, Chattogram Cantonment. </p>
                <p>Specialty: Cancer Care, Advanced Diagnostics</p>
                <p class="help-number">Help Number: 0721-772150</p>
            </div>
        </div>
    </div>
    <footer style="background-color: #000; color: #fff; text-align: center; padding: 20px;">
    <p>&copy; 2025 Bangladesh Government Portal. All rights reserved.</p>
</footer>

</body>
</html>
