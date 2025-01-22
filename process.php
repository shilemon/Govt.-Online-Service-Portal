<?php
if (isset($_POST["submit"])) {
    require 'db_connection.php';

    // Validate Name
    $name = trim($_POST["name"]);
    if (!preg_match("/^[a-zA-Z\s]{1,50}$/", $name)) {
        echo "Invalid name. Only letters and spaces are allowed, and it must be less than 50 characters.";
        header("refresh: 2; url = signup.php");
        exit;
    }

    // Validate Email
    $uname = trim($_POST["uname"]);
    if (!filter_var($uname, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        header("refresh: 2; url = signup.php");
        exit;
    }

    // Password Validation
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    if ($pass !== $cpass) {
        echo "Passwords do not match.";
        header("refresh: 2; url = signup.php");
        exit;
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/", $pass)) {
        echo "Password must be at least 6 characters long, include one uppercase, one lowercase, one number, and one special character.";
        header("refresh: 2; url = signup.php");
        exit;
    }

    // Insert user details into the database 
    $stmt = $conn->prepare("INSERT INTO records (name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $uname, $pass); 
    if ($stmt->execute()) {
        session_start();
        $_SESSION["uname"] = $uname;
        $_SESSION["name"] = $name;
        echo "Registration Accepted<br>";
        header("refresh: 4; url = private.php");
    } else {
        echo "Error: " . $stmt->error;
        header("refresh: 2; url = signup.php");
    }

    $stmt->close();
    $conn->close();
} else {
    header("location:signup.php");
    exit;
}
?>
