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
    <title>Science & Technology | Bangladesh Government Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
body {
    font-family: Arial, sans-serif;
    background-color: #eaf2f8; 
    margin: 0;
    padding: 0;
    color: #333; 
}

.header {
    background: linear-gradient(to right, #7ec8e3, #5ab1d0); 
    color: white;
    padding: 30px 0;
    margin-bottom: 30px;
    position: relative;
    text-align: center;
}

.header h1 {
    font-size: 36px;
    font-weight: bold;
}

/* Back Button Styling */
.back-btn {
    position: absolute;
    top: 50%;
    right: 30px;
    transform: translateY(-50%);
    padding: 10px 20px;
    background-color: #5ab1d0; /* Cool blue color */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.back-btn:hover {
    background-color: #4b97bb; /* Slightly darker blue on hover */
}

/* Dropdown Styling */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff; /* White background */
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
    z-index: 1;
    border-radius: 5px;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    color: #333; /* Dark text for contrast */
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f4f7fb; /* Light hover effect */
}

/* Grid Layout */
.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    padding: 20px;
}

.grid-item {
    background-color: #ffffff; /* White background for content */
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.grid-item:hover {
    transform: scale(1.05);
    box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
}

.grid-item img {
    max-width: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
}

/* Animation for content fade-in */
.fadeIn {
    opacity: 0;
    animation: fadeInAnimation 1s forwards;
}

@keyframes fadeInAnimation {
    to {
        opacity: 1;
    }
}

/* Footer section with subtle shading */
footer {
    background-color: #ffffff;
    color: #333;
    padding: 20px;
    text-align: center;
    box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <h1>Science & Technology - Bangladesh Government Portal</h1>
        <!-- Back Button -->
        <button class="back-btn" onclick="window.location.href='private.php';">Back</button>
    </div>

    <!-- About Us Dropdown -->
    <div class="dropdown">
        <h3>About Us</h3>
        <div class="dropdown-content">
        <a href="#">Our Mission</a>
            <a href="#">Our Vision</a>
            <a href="#">Team</a>
            <a href="#">Contact Us</a>
        </div>
    </div>

    <!-- Grid for Recent Science & Technology Activities -->
    <div class="grid-container fadeIn">
        <!-- Activity 1: Smart City Development -->
        <div class="grid-item">
            <img src="image/smart.jpg" alt="Smart City">
            <h3>Smart City Development</h3>
            <p>Bangladesh has been actively working on building smart cities to modernize infrastructure, improve the quality of life, and bring technology into the daily lives of citizens.</p>
        </div>

        <!-- Activity 2: National ICT Policy -->
        <div class="grid-item">
            <img src="image/ict.png" alt="ICT Policy">
            <h3>National ICT Policy</h3>
            <p>The government has introduced several reforms to make Bangladesh a global leader in information and communication technology by 2041, including national policies and strategies for ICT development.</p>
        </div>

        <!-- Activity 3: AI and Automation Initiatives -->
        <div class="grid-item">
            <img src="image/ai.jpg" alt="AI and Automation">
            <h3>AI and Automation Initiatives</h3>
            <p>Bangladesh is embracing artificial intelligence (AI) and automation to drive productivity in various sectors such as agriculture, healthcare, and transportation.</p>
        </div>
    </div>

    <!-- Recent Top Events in Science and Technology -->
    <div class="container">
        <h2 style="text-align: center; margin-top: 50px;">Recent Top Science & Technology Events</h2>
        <div class="grid-container fadeIn">
            <!-- Event 1: Bangladesh Digital Innovation Summit -->
            <div class="grid-item">
                <img src="image/digital.jpg" alt="Digital Innovation Summit">
                <h3>Bangladesh Digital Innovation Summit 2024</h3>
                <p>This event focuses on fostering digital transformation across industries in Bangladesh, bringing together technology leaders and innovators from around the world.</p>
            </div>

            <!-- Event 2: ICT Expo Bangladesh 2024 -->
            <div class="grid-item">
                <img src="image/expo.jpg" alt="ICT Expo">
                <h3>ICT Expo Bangladesh 2024</h3>
                <p>The annual ICT Expo showcases the latest technologies and innovations, with a focus on the impact of digital technology in transforming businesses and society.</p>
            </div>

            <!-- Event 3: Launch of 5G Technology in Bangladesh -->
            <div class="grid-item">
                <img src="image/5g.jpg" alt="5G Technology Launch">
                <h3>Launch of 5G Technology in Bangladesh</h3>
                <p>Bangladesh launched its first 5G network, marking a major milestone in improving connectivity and accelerating technological advancement in the country.</p>
            </div>
        </div>
    </div>

    <!-- Top Inventions -->
    <div class="container">
        <h2 style="text-align: center; margin-top: 50px;">Top Inventions from Bangladesh</h2>
        <div class="grid-container fadeIn">
            <!-- Invention 1: Solar-Powered Desalination Plant -->
            <div class="grid-item">
                <img src="image/solor.png" alt="Solar Desalination Plant">
                <h3>Solar-Powered Desalination Plant</h3>
                <p>A Bangladeshi innovation that uses solar energy to convert seawater into potable water, addressing water scarcity issues in coastal areas.</p>
            </div>

            <!-- Invention 2: Bangladesh's First Electric Car -->
            <div class="grid-item">
                <img src="image/car.png" alt="Electric Car">
                <h3>Bangladesh's First Electric Car</h3>
                <p>This invention represents Bangladesh's commitment to reducing carbon emissions by introducing electric vehicles into the transportation sector.</p>
            </div>

            <!-- Invention 3: Bangladesh Smart Farming Technology -->
            <div class="grid-item">
                <img src="image/farming.jpg" alt="Smart Farming">
                <h3>Smart Farming Technology</h3>
                <p>This technology leverages IoT and AI to optimize farming processes, increase crop yields, and improve the livelihood of farmers.</p>
            </div>
        </div>
        <h6>The Science & Technology Portal of Bangladesh is an initiative by the government to highlight and promote the nation’s achievements in the field of science, technology, and innovation. This platform serves as a comprehensive resource for exploring the latest developments and government-led initiatives that are transforming the country's science and technology landscape.

In alignment with the government's vision to establish Bangladesh as a knowledge-based economy, the portal features key projects, policies, and technological breakthroughs that are shaping the future. It serves as a hub for citizens, businesses, and innovators to stay informed about ongoing efforts in digital transformation, scientific research, ICT development, and sustainable innovation.

Key highlights of the portal include:

Smart City Development: Aiming to revolutionize urban life through modern infrastructure and technology integration.
National ICT Policy: Driving Bangladesh toward becoming a global leader in information technology by 2041.
Artificial Intelligence and Automation: Pioneering efforts to introduce AI-driven solutions across agriculture, healthcare, and industry.
Inventions and Innovations: Showcasing home-grown inventions, such as the first solar-powered desalination plant, electric vehicles, and smart farming technologies.
This portal is an essential tool for both the public and private sectors to connect, collaborate, and accelerate progress in the fields of science and technology in Bangladesh.</h6>
    </div>

    <script>
        window.onload = () => {
            document.querySelector('.fadeIn').classList.add('fadeIn');
        };
    </script>
    <footer style="background-color: #000; color: #fff; text-align: center; padding: 20px;">
    <p>&copy; 2025 Bangladesh Government Portal. All rights reserved.</p>
</footer>

</body>

</html>
