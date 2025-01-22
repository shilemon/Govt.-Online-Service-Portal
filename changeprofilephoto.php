<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Profile Photo</title>
</head>
<body>
    <h1>Change Profile Photo</h1>
    <form action="uploadphoto.php" method="post" enctype="multipart/form-data">
        <input type="file" name="profilePhoto" accept="image/*" required>
        <input type="submit" value="Upload">
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
