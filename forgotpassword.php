<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db_connection.php';

    $email = $_POST["email"];
    $sql = "SELECT * FROM records WHERE username = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Example: Generate a reset token (you can improve this with email integration)
        echo "Code sent! Use this to reset your password.";
    } else {
        echo "No email found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
</head>
<body>
    <form action="forgotpassword.php" method="post">
        Enter your email: <input type="email" name="email" required><br>
        <input type="submit" value="Send Code">
    </form>
</body>
</html>
