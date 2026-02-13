<?php
session_start();
include("db.php");

$message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password' AND role='user'");

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: demo.php");
        exit();
    } else {
        $message = "Invalid Credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>User Login</h2>
    <p><?php echo $message; ?></p>

    <form method="POST">
        <input type="text" name="username" required>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>

    <br>
    <a href="home.php">Back</a>
</div>

</body>
</html>
