<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bangladesh Emergency Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #008CBA;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        header .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ff4c4c;
            color: white;
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        header .back-button:hover {
            background-color: #ff1e1e;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            color: #008CBA;
        }
        .service-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
        }
        .service-card h3 {
            margin-top: 0;
        }
        .emergency-contact {
            color: #ff4c4c;
            font-weight: bold;
            font-size: 1.2em;
        }
        footer {
            background-color: #008CBA;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .important-info {
            background-color: #fffd6f;
            border-left: 5px solid #ff4c4c;
            padding: 15px;
            margin-top: 20px;
        }
        .info-card {
            padding: 15px;
            background-color: #ffffff;
            border-radius: 8px;
            margin-top: 10px;
        }
        .contact-links a {
            color: #008CBA;
            text-decoration: none;
            font-size: 1.1em;
        }
        .contact-links a:hover {
            text-decoration: underline;
        }
        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            display: none;
        }
        .scroll-to-top:hover {
            background-color: #005f8a;
        }
    </style>
</head>
<body>
    <header>
        <button class="back-button" onclick="navigateBack()">Back</button>
        <h1>Bangladesh Government Emergency Services</h1>
        <p>Providing immediate help during critical situations</p>
    </header>

    <div class="container">
        <h2>Emergency Contacts</h2>

        <div class="service-card">
            <h3>Medical Emergency</h3>
            <p>If you are experiencing a medical emergency, please contact the Bangladesh Ambulance Service immediately.</p>
            <p class="emergency-contact">Ambulance Number: 16263</p>
        </div>

        <div class="service-card">
            <h3>Fire Emergency</h3>
            <p>In case of fire-related emergencies, call the Fire Service and Civil Defense for assistance.</p>
            <p class="emergency-contact">Fire Service Number: 199</p>
        </div>

        <div class="service-card">
            <h3>Police Emergency</h3>
            <p>For any police-related emergency or criminal activity, contact the Bangladesh Police.</p>
            <p class="emergency-contact">Police Helpline: 999</p>
        </div>

        <div class="service-card">
            <h3>Disaster Relief</h3>
            <p>In the event of a natural disaster or major accident, the government offers relief services. Please stay tuned to local broadcasts for the latest updates.</p>
            <p class="emergency-contact">Disaster Management: 1090</p>
        </div>

        <div class="important-info">
            <h3>Important Information</h3>
            <p>Stay calm, and ensure your safety first. Always keep emergency contact numbers handy, and follow the advice of local authorities in crisis situations.</p>
        </div>

        <div class="info-card">
            <h3>Additional Resources</h3>
            <p>For information on hospitals, shelters, and other services, please visit the following links:</p>
            <div class="contact-links">
                <ul>
                    <li><a href="https://www.dghs.gov.bd/index.php/en/" target="_blank">Directorate General of Health Services (DGHS)</a></li>
                    <li><a href="https://www.fire.gov.bd/" target="_blank">Fire Service and Civil Defense</a></li>
                    <li><a href="https://www.police.gov.bd/" target="_blank">Bangladesh Police</a></li>
                    <li><a href="https://www.ddm.gov.bd/" target="_blank">Disaster Management</a></li>
                </ul>
            </div>
        </div>

    </div>

    <button class="scroll-to-top" id="scrollToTopButton">&#8679;</button>

    <footer>
        <p>&copy; 2025 Bangladesh Government - Emergency Services</p>
    </footer>

    <script>
        function navigateBack() {
            if (confirm('Are you sure you want to go back to the Health page?')) {
                window.location.href = 'health.php';
            }
        }

        const scrollToTopButton = document.getElementById('scrollToTopButton');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                scrollToTopButton.style.display = 'flex';
            } else {
                scrollToTopButton.style.display = 'none';
            }
        });

        scrollToTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
