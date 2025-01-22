<?php
session_start();
$token = "";
$token2 = "";
if (isset($_SESSION["uname"])) {
    //echo "Hello, you are now logged in" . "<br>";
    $token = "signout.php";
    $token2 = "Sign Out";
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Bangladesh Government Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Include the top bar -->
    <?php include('topbar.php'); ?>

    <div class="header-container">
    <h1 class="header-title">Welcome To Bangladesh Government Service Portal, 
    <?php echo isset($_SESSION["name"]) ? htmlspecialchars($_SESSION["name"]) : "Guest"; ?>!
</h1>

        <p style="color: black;">The Bangladesh Government Service Portal serves as a one-stop platform for citizens to access a wide range of government services online. Our goal is to streamline the delivery of essential services, enhance transparency, and improve efficiency. From applying for national identification cards to accessing social welfare benefits, the portal makes it easy for you to interact with various government departments without needing to visit offices in person.

Here, you can:

Apply for National ID: Secure your unique identification number to access government services.
Track Service Requests: Stay updated on the status of your applications and requests.
Access Public Services: Apply for passports, driving licenses, and other important certificates.
Learn About Government Schemes: Discover and apply for various schemes and benefits provided by the government.
Update Personal Information: Easily update your personal details across government records.
We are committed to making government services more accessible, efficient, and transparent for every citizen of Bangladesh.
    </div>

</p>

    <!-- Grid Layout for Sections -->
<div class="grid-container">
    <!-- National ID Section -->
    <div class="grid-item">
        <img src="image/nid.jpg" alt="National ID">
        <h3>National ID Information</h3>
        <p>View and manage your National ID details for official use.</p>
        <a href="nid.php">Learn More</a>
    </div>

    <!-- Pay Taxes Section -->
    <div class="grid-item">
        <img src="image/tax.png" alt="Pay Taxes">
        <h3>Pay Taxes</h3>
        <p>Access and pay your taxes securely through the government portal.</p>
        <a href="taxes.php">Learn More</a>
    </div>

    <!-- Education Section -->
    <div class="grid-item">
        <img src="image/edu.png" alt="Education">
        <h3>Education Resources</h3>
        <p>Access educational programs, scholarships, and resources for Bangladesh students.</p>
        <a href="education.php">Learn More</a>
    </div>

    <!-- Health Section -->
    <div class="grid-item">
        <img src="image/health.png" alt="Health">
        <h3>Health Services</h3>
        <p>Discover health services, vaccination programs, and medical assistance in Bangladesh.</p>
        <a href="health.php">Learn More</a>
    </div>

    <!-- Laws and Legal Issues Section -->
    <div class="grid-item">
        <img src="image/law.png" alt="Laws and Legal Issues">
        <h3>Laws and Legal Support</h3>
        <p>Learn about your legal rights and access legal support services provided by the government.</p>
        <a href="laws.php">Learn More</a>
    </div>

    <!-- Science and Technology Section -->
    <div class="grid-item">
        <img src="image/science.jpg" alt="Science and Technology">
        <h3>Science and Technology</h3>
        <p>Explore advancements in technology, government-funded projects, and innovations in Bangladesh.</p>
        <a href="scitech.php">Learn More</a>
    </div>

    <!-- Online Government Services Section -->
    <div class="grid-item">
        <img src="image/online.jpg" alt="Online Services">
        <h3>Online Services</h3>
        <p>Access various government services online for ease of use and efficiency.</p>
        <a href="onlineservices.php">Learn More</a>
    </div>

    <!-- Request Certificates (Birth, Marriage, and Death) -->
    <div class="grid-item">
        <img src="image/certificates.jpg" alt="Request Certificates">
        <h3>Request Certificates (Birth, Marriage, and Death)</h3>
        <p>Access Request Certificates (Birth, Marriage, and Death).</p>
        <a href="certificates.php">Learn More</a>
    </div>  

    <!-- Pay Bills -->
    <div class="grid-item">
        <img src="image/bill.jpg" alt="Pay Bills">
        <h3>Bangladesh Power Development Board</h3>
        <p>Pay Your Bills Here</p>
        <a href="bill.php">Learn More</a>
    </div>  

    <!-- Complaints Section -->
    <div class="grid-item">
        <img src="image/complaint.png" alt="Complaints">
        <h3>File Complaints</h3>
        <p>File complaints regarding government services or facilities.</p>
        <a href="complaints.php">Learn More</a>
    </div>
</div>

<style>
    /* Grid Container */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: auto;
    }

    /* Grid Item */
    .grid-item {
        background: linear-gradient(135deg, #4e73df, #1cc88a);
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        overflow: hidden;
    }

    /* Hover Effects */
    .grid-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    /* Grid Item Image */
    .grid-item img {
        max-width: 100%;
        border-radius: 10px;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    /* Hover Image Effect */
    .grid-item:hover img {
        transform: scale(1.1);
    }

    /* Title */
    .grid-item h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
        font-weight: bold;
    }

    /* Description */
    .grid-item p {
        font-size: 1.1em;
        margin-bottom: 15px;
    }

    /* Link Style */
    .grid-item a {
        font-size: 1.1em;
        color: #fff;
        text-decoration: none;
        background-color:rgb(4, 6, 76);
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Hover Link Effect */
    .grid-item a:hover {
        background-color:rgb(4, 6, 76);
    }
</style>


    <script>
        /* Fade-in Animation for Main Sections */
        window.onload = () => {
            document.querySelector('.grid-container').classList.add('fadeIn');
        };
    </script>
    
<footer>
        <p>&copy; 2025 Bangladesh Government Portal. All rights reserved</p>
    </footer>

</body>
</html>
