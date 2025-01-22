<?php
if (session_status() >= 0) {
    session_start();
    if (isset($_SESSION["uname"])) {
        header("refresh: 1; url = private.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PHP App</title>
    <style>
        /* General body styling */
        body {
            background: linear-gradient(45deg, #455e6b, #455e6b);  /* Blue gradient background */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeInBackground 1.5s ease-out;  /* Background fade-in effect */
        }

        /* Login form container styling */
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            opacity: 0;
            animation: formAnimation 0.8s forwards;  /* Form fade-in effect */
        }

        /* Title of the form */
        .login-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            animation: fadeInTitle 1s ease-out;  /* Title fade-in */
        }

        /* Input fields styling */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
            animation: fadeInFields 0.8s ease-out forwards;  /* Fields fade-in */
        }

        .input-group label {
            font-size: 14px;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
        }

        .input-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button styling */
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Links styling */
        .links {
            font-size: 14px;
            color: #666;
            margin-top: 15px;
        }

        .links a {
            color: #007bff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
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

        @keyframes formAnimation {
            from {
                opacity: 0;
                transform: translateY(30px);
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

        @keyframes fadeInFields {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Image styling */
        .login-image {
            width: 150px;  /* Image size */
            margin-bottom: 20px;  /* Space between image and form */
            animation: fadeInImage 1.5s ease-out;  /* Image fade-in effect */
        }

        @keyframes fadeInImage {
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
    <div class="login-container">
        <!-- Image added at the top -->
        <img src="image/ban.png" alt="Login Image" class="login-image">
        <h2>Login</h2>
        <form action="loginprocess.php" method="post">
            <div class="input-group">
                <label for="uname">Username:</label>
                <input type="text" id="uname" name="uname" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
        </form>
        <div class="links">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <p><a href="forgotpassword.php">Forgot Password?</a></p>
        </div>
    </div>
</body>
</html>
