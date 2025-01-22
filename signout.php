<?php
if (session_status() >= 0) {
    session_start();
    session_unset();
    session_destroy();
    echo "You are now redirected.";
}
header("refresh: 2; url = index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Out</title>
    <style>
        /* Basic styling for the top bar */
        .top-bar {
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 16px;
        }

        .top-bar a:hover {
            color: #ccc;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Include the top bar -->
    <?php include('topbar.php'); ?>

    <!-- Sign out confirmation message -->
    <h1>You have been logged out.</h1>
    <p>You will be redirected to the login page shortly.</p>

</body>
</html>
