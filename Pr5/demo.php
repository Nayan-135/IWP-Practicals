<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Demo Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Welcome <?php echo $_SESSION['username']; ?></h2>

    <p>This is the Demo Page after successful login.</p>

    <br>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
