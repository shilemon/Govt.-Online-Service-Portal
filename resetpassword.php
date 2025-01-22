<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db_connection.php';

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $reset_code = mysqli_real_escape_string($conn, $_POST["reset_code"]);
    $new_pass = mysqli_real_escape_string($conn, $_POST["new_pass"]);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST["confirm_pass"]);

    // Check if the email and reset code match
    $sql = "SELECT * FROM records WHERE username = '$email' AND reset_code = '$reset_code'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        if ($new_pass === $confirm_pass) {
            if (strlen($new_pass) >= 8 && preg_match('/[^a-zA-Z0-9]/', $new_pass)) {
                // Update password
                $update_sql = "UPDATE records SET password = '$new_pass', reset_code = NULL WHERE username = '$email'";
                mysqli_query($conn, $update_sql);

                echo "Password changed successfully!";
                header("refresh: 3; url = index.php");
            } else {
                echo "Password must be at least 8 characters long and contain at least one special character.";
            }
        } else {
            echo "Passwords do not match!";
        }
    } else {
        echo "Invalid reset code or email!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
</head>
<body>
    <form action="resetpassword.php" method="post">
        Enter your email: <input type="email" name="email" required><br>
        Enter reset code: <input type="text" name="reset_code" required><br>
        Enter new password: <input type="password" name="new_pass" required><br>
        Re-enter new password: <input type="password" name="confirm_pass" required><br>
        <button type="submit">Change Password</button>
    </form>
</body>
</html>
