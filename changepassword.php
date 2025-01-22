<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db_connection.php';
    $username = $_SESSION["uname"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($newPassword === $confirmPassword && strlen($newPassword) >= 5) {
        $sql = "UPDATE records SET password = '$newPassword' WHERE username = '$username'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='message success'>Password changed successfully!</div>";
        } else {
            echo "<div class='message error'>Error changing password.</div>";
        }
    } else {
        echo "<div class='message error'>Passwords do not match or are too short!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        /* Body and Background Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fb;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form Container Styling */
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s;
        }

        /* Title Styling */
        h1 {
            color: #1e2a3a;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Input Fields Styling */
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #5ab1d0;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4b97bb;
        }

        /* Message Styling */
        .message {
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 14px;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Back Link Styling */
        a {
            display: block;
            margin-top: 20px;
            color: #5ab1d0;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Fade-in Animation */
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
    <div class="form-container">
        <h1>Change Password</h1>
        <form method="post">
            New Password: <input type="password" name="new_password" required>
            Confirm Password: <input type="password" name="confirm_password" required>
            <input type="submit" value="Change Password">
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
