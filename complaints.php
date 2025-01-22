<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitComplaint'])) {
    // Handle complaint submission
    $complaintTitle = $_POST['complaintTitle'];
    $complaintDetails = $_POST['complaintDetails'];
    $complainantName = $_SESSION["uname"];
    $complainantEmail = $_SESSION["email"];
 
    // Save complaint to database (Assuming database connection and table setup)
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "app_users";
 
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
 
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    // Insert complaint into the database
    $sql = "INSERT INTO complaints (title, details, complainant_name, complainant_email) 
            VALUES ('$complaintTitle', '$complaintDetails', '$complainantName', '$complainantEmail')";
 
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Complaint submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting complaint: " . $conn->error . "');</script>";
    }
 
    // Close connection
    $conn->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Submit Complaint</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #003366;
        }
        label {
            font-size: 16px;
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
 
        /* Styling for the back button in the top-right corner */
        .back-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
</style>
<script>
        // JS to confirm complaint submission
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            form.addEventListener('submit', (event) => {
                const title = document.getElementById('complaintTitle').value.trim();
                const details = document.getElementById('complaintDetails').value.trim();
 
                if (!title || !details) {
                    event.preventDefault(); // Prevent form submission
                    alert('Please fill out all fields before submitting.');
                    return;
                }
 
                const confirmSubmission = confirm('Are you sure you want to submit this complaint?');
                if (!confirmSubmission) {
                    event.preventDefault(); // Prevent form submission if the user cancels
                }
            });
        });
</script>
</head>
<body>
 
<!-- Back button in the top-right corner -->
<a href="private.php" class="back-button">Back</a>
 
<div class="container">
<h1>File a Complaint</h1>
<p>Here you can submit your complaint. Please provide the details of your complaint.</p>
 
    <!-- Complaint Submission Form -->
<form action="complaints.php" method="post">
<label for="complaintTitle">Complaint Title</label>
<input type="text" name="complaintTitle" id="complaintTitle" required placeholder="Enter the complaint title">
 
        <label for="complaintDetails">Complaint Details</label>
<textarea name="complaintDetails" id="complaintDetails" rows="5" required placeholder="Provide the details of your complaint"></textarea>
 
        <input type="submit" name="submitComplaint" value="Submit Complaint">
</form>
 
    <a href="dashboard.php" class="back-link">Back to Dashboard</a>
</div>
 
</body>
</html>