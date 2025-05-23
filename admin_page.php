<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body style='background-color: #f0f0f0;'>
    <button onclick='window.location.href="logout.php"'>Logout</button>
    <?php
        echo($_SESSION['name']);
        echo "<br>";
        print_r($_SESSION);
        echo "<br>";
        echo ($_SESSION['email']);
        echo "<br>";
        print_r($_SESSION['password']);
    ?>
</body>
</html>