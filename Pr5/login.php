<?php
session_start();
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password' AND role='user'");

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: demo.php");
        exit();
    } else {
        $message = "Invalid username or password. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePlex — Member Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper">
    <div class="card auth-card">

        <!-- Brand -->
        <div class="brand">
            <div class="brand-icon">🎟️</div>
            <div class="brand-name">CinePlex</div>
            <div class="brand-tagline">Member Sign In</div>
        </div>

        <p class="page-hint">Enter your credentials to access your account</p>

        <?php if (!empty($message)): ?>
            <div class="alert alert-error">
                <span>⚠</span> <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" autocomplete="off">

            <div class="form-group">
                <label class="form-label">Username</label>
                <input
                    type="text"
                    name="username"
                    class="form-input"
                    placeholder="Enter your username"
                    required
                    autocomplete="username"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-input"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >
            </div>

            <div style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary">
                    Sign In &nbsp;→
                </button>
            </div>

        </form>

        <div class="divider"></div>

        <p style="text-align:center; font-size:13px; color: var(--text-muted);">
            No account yet?
            <a href="register.php" class="link" style="margin-left:4px;">Create one free</a>
        </p>

        <div style="text-align:center;">
            <a href="home.php" class="back-link">← Back to Home</a>
        </div>

    </div>
</div>

</body>
</html>