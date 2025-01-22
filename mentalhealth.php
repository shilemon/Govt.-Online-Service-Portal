<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Support Bangladesh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        header {
            background-color: #01796f;
            color: white;
            padding: 1rem;
            text-align: center;
            position: relative;
        }
        .back-btn {
            background-color: #f5f5f5;
            color: #01796f;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            margin-right: 1rem;
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }
        .back-btn:hover {
            background-color: #eef5f7;
            color: #016257;
        }
        .container {
            text-align: center;
            padding: 2rem;
        }
        .container h1 {
            font-size: 2.5rem;
        }
        .container p {
            font-size: 1.2rem;
            margin: 1rem 0;
        }
        .btn {
            background-color: #01796f;
            color: white;
            padding: 0.8rem 1.5rem;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn:hover {
            background-color: #016257;
        }
        .profiles {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        .profile {
            border-radius: 10px;
            overflow: hidden;
            width: 200px;
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .profile img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .profile .name {
            padding: 0.5rem;
            font-weight: bold;
        }
        .additional-info {
            background-color: #eef5f7;
            padding: 2rem;
            margin-top: 2rem;
        }
        .additional-info h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .additional-info ul {
            list-style-type: none;
            padding: 0;
        }
        .additional-info li {
            margin: 0.5rem 0;
            font-size: 1.1rem;
        }
        .resources {
            text-align: center;
            margin: 2rem 0;
        }
        .resources a {
            margin: 0.5rem;
            padding: 0.7rem 1.2rem;
            background-color: #01796f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .resources a:hover {
            background-color: #016257;
        }
        .contact-form {
            background-color: #fefefe;
            padding: 2rem;
            margin: 2rem auto;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .contact-form h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .contact-form button {
            background-color: #01796f;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #016257;
        }
        footer {
            background-color: #01796f;
            color: white;
            text-align: center;
            padding: 1rem;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <button class="back-btn" onclick="location.href='health.php'">&larr; Back</button>
        <h1>Government of Bangladesh</h1>
        <p>National Mental Health Support Initiative</p>
    </header>

    <div class="container">
        <h1>Prioritize Your Mental Health</h1>
        <p>Mental health refers to an individual’s emotional, psychological, and social well-being. It affects how people think, feel, and behave in their daily lives. Mental health plays a critical role in how individuals handle stress, relate to others, and make choices..</p>
        <a href="#" class="btn">Find a Therapist</a>

        <div class="profiles">
            <div class="profile">
                <img src="image/doc1.jpg" alt="Profile">
                <div class="name">Dr. Ayesha Khan</div>
            </div>
            <div class="profile">
                <img src="image/doc2.jpg" alt="Profile">
                <div class="name">Dr. Tanvir Rahman</div>
            </div>
            <div class="profile">
                <img src="image/doc3.jpg" alt="Profile">
                <div class="name">Dr. Farhana Ahmed</div>
            </div>
        </div>
    </div>

    <div class="additional-info">
        <h2>Why Mental Health Matters</h2>
        <p>Mental health is a critical aspect of overall well-being. The Government of Bangladesh is committed to providing accessible, high-quality mental health support to all citizens. Here are some key reasons why prioritizing mental health is essential:</p>
        <ul>
            <li>Improves productivity and quality of life.</li>
            <li>Helps manage stress, anxiety, and depression effectively.</li>
            <li>Strengthens relationships and community well-being.</li>
            <li>Reduces the stigma associated with seeking mental health support.</li>
        </ul>

        <h2>Available Services</h2>
        <ul>
            <li>Free counseling sessions through government clinics.</li>
            <li>24/7 mental health hotline for emergencies.</li>
            <li>Workshops and awareness programs in schools and workplaces.</li>
            <li>Online resources and self-help tools.</li>
        </ul>

        <p>For more information, visit our <a href="#">official resources page</a>.</p>
    </div>

    <div class="resources">
        <h2>Helpful Resources</h2>
        <a href="#">Mental Health FAQs</a>
        <a href="#">Download Guides</a>
        <a href="#">Mental Health News</a>
    </div>

    <div class="contact-form">
        <h2>Contact Us</h2>
        <form action="#" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <!-- <footer>
        <p>&copy; 2025 Government of Bangladesh. All rights reserved.</p>
    </footer>  -->
</body>
</html>
