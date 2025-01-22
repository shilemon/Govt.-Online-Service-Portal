<!--<?php session_start(); ?>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #add8e6;
        }

        /* Top Bar Styles */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Logo Styles */
        .logo img {
            height: 40px;
            transition: transform 0.3s ease-in-out;
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        /* Navigation Links */
        .top-bar > div {
            display: flex;
            align-items: center;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }

        .top-bar a:hover {
            color: #1cc88a;
        }

        /* Profile Image */
        .profile-image img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        /* Search Box */
        .search-box {
            margin-left: 20px;
            position: relative;
        }

        .search-box input[type="text"] {
            padding: 7px 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            width: 200px;
        }

        .search-box button {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            border: none;
            background-color: #4CAF50;
            color: white;
            padding: 0 10px;
            cursor: pointer;
            border-radius: 0 4px 4px 0;
        }

        .search-box button:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }

            .top-bar > div {
                margin-top: 10px;
                justify-content: flex-start;
                width: 100%;
            }

            .top-bar a {
                margin: 5px 0;
            }

            .profile-image {
                margin-top: 10px;
            }

            .search-box {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Top Bar with Logo and Navigation Links -->
    <div class="top-bar">
        <!-- Logo (clicking will take user to private.php) -->
        <a href="private.php" class="logo">
            <img src="image/logo1.png" alt="Service Portal Logo">
        </a>

        <!-- User's navigation and logout links -->
        <div>
            <a href="private.php">Home</a> 
            <a href="dashboard.php">Go to Dashboard</a>
            <a href="viewprofile.php"><?php echo htmlspecialchars($_SESSION["uname"]); ?></a>      
            
            <!-- Check if the user is logged in to decide on Sign In/Sign Out link -->
            <?php
            if (isset($_SESSION["uname"])) {
                $token = "signout.php";
                $token2 = "Sign Out";
            } else {
                $token = "login.php";
                $token2 = "Log In";
            }
            ?>
            <a href="<?php echo $token; ?>"><?php echo $token2; ?></a>

            <!-- Search Box -->
            <div class="search-box">
                <form action="search.php" method="get">
                    <input type="text" name="query" placeholder="Search...">
                    <button type="submit">Go</button>
                </form>
            </div>
        </div>

        <!-- Profile image on the right side of the top bar -->
        <div class="profile-image">
            <img src="uploads/download.jpg" alt="Profile Picture">
        </div>
    </div>

</body>
</html>
