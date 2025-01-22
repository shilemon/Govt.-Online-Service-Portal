<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}

require 'db_connection.php';

$username = $_SESSION["uname"];
$sql = "SELECT * FROM records WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Container for the profile information */
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            font-size: 16px;
            color: #555;
            margin: 8px 0;
        }

        .profile-info label {
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h1>Profile Information</h1>

    <div class="profile-info">
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        
        <!-- Add more user details as needed -->
    </div>

    <a href="dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
