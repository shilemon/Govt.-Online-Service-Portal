<?php
if (session_status() >= 0) {
    if (isset($_SESSION["uname"])) {
        header("refresh: 0.5; url = private.php");
    }
}

if (isset($_POST["submit"])) {
    require 'db_connection.php';

    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM records WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["uname"] = $uname;

        echo "You are now redirected";
        header("refresh: 2; url = private.php");
        exit();
    } else {
        echo "User not found";
        header("refresh: 2; url = index.php");
        exit();
    }
}

if (!isset($_POST["submit"])) {
    echo "Fill in the username and password." . "<br>";
    header("refresh: 2; url = index.php");
}
?>
