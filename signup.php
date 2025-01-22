<?php
if (session_status() >= 0) {
    session_start();
    if (isset($_SESSION["uname"])) {
        header("refresh: 0.2; url = private.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | PHP App</title>
    <style>
        body {
            background: linear-gradient(45deg, #6699CC, #6699CC);  
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeInBackground 1.5s ease-out;  
        }

        
        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        
        .signup-form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transform: translateY(30px);
            opacity: 0;
            animation: formAnimation 0.8s forwards;  
        }

    
        .signup-form h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            animation: fadeInTitle 1s ease-out; 
        }

       
        .input-group {
            margin-bottom: 20px;
            text-align: left;
            animation: fadeInFields 0.8s ease-out forwards;  
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
            border-color: #ff6347;
            outline: none;
        }

        /* Button styling */
        .btn {
            width: 100%;
            padding: 14px;
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ff7f50;
        }

        /* Link styling */
        .signup-form p {
            font-size: 14px;
            color: #666;
        }

        .signup-form a {
            color: #ff6347;
            text-decoration: none;
        }

        .signup-form a:hover {
            text-decoration: underline;
        }

        /* Media queries for responsiveness */
        @media screen and (max-width: 480px) {
            .signup-form {
                width: 90%;
            }
        }

        /* Animations */
        @keyframes fadeInBackground {
            from { opacity: 0; }
            to { opacity: 1; }
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
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInFields {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .signup-image {
            width: 150px;  
            margin-bottom: 20px;  
            animation: fadeInImage 1.5s ease-out;  
        }

        @keyframes fadeInImage {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-form">
            <img src="image/ban.png" alt="Sign Up Image" class="signup-image">
            <h2>Sign Up</h2>
            <form action="process.php" method="post">
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="input-group">
                    <label for="uname">Email:</label>
                    <input type="email" id="uname" name="uname" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter a password" required>
                </div>
                <div class="input-group">
                    <label for="cpass">Confirm Password:</label>
                    <input type="password" id="cpass" name="cpass" placeholder="Confirm your password" required>
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <p>Already have an account? <a href="index.php">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
