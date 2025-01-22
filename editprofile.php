<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db_connection.php';
    $username = $_SESSION["uname"];
    $newEmail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $sql = "UPDATE records SET username = '$newEmail' WHERE username = '$username'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["uname"] = $newEmail;
            $message = "Profile updated successfully!";
            $messageClass = "success";
        } else {
            $message = "Error updating profile.";
            $messageClass = "error";
        }
    } else {
        $message = "Invalid email format.";
        $messageClass = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Email</title>
    <style>
        /* General styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #6a11cb, #2575fc); /* Gradient background */
            color: #fff; /* White text */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container styling */
        .container {
            background: rgba(255, 255, 255, 0.9); /* White with slight transparency */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
            color: #333;
            animation: fadeInContainer 1s ease-out;
        }

        h1 {
            color: #6a11cb;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        /* Input styling */
        input[type="text"], input[type="submit"] {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #2575fc;
            box-shadow: 0px 0px 5px #2575fc;
            outline: none;
        }

        input[type="submit"] {
            background-color: #6a11cb;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: #2575fc;
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: #6a11cb;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #2575fc;
        }

        /* Message styling */
        .message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
        }

        .success {
            background-color: #28a745;
        }

        .error {
            background-color: #dc3545;
        }

        /* Animation */
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Email</h1>
        <?php if (isset($message)): ?>
            <div class="message <?php echo $messageClass; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="email" placeholder="Enter your new email" required>
            <input type="submit" value="Update">
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
