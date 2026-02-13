<?php
session_start();
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password' AND role='admin'");

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin_panel.php");
        exit();
    } else {
        $message = "Invalid admin credentials. Access denied.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePlex — Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper">
    <div class="card auth-card">

        <!-- Brand -->
        <div class="brand">
            <div class="brand-icon">🛡️</div>
            <div class="brand-name">CinePlex</div>
            <div class="brand-tagline">Admin Access Only</div>
        </div>

        <p class="page-hint">Restricted area — authorised personnel only</p>

        <?php if (!empty($message)): ?>
            <div class="alert alert-error">
                <span>🔒</span> <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" autocomplete="off">

            <div class="form-group">
                <label class="form-label">Admin Username</label>
                <input
                    type="text"
                    name="username"
                    class="form-input"
                    placeholder="Enter admin username"
                    required
                    autocomplete="username"
                >
            </div>

            <div class="form-group">
                <label class="form-label">Admin Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-input"
                    placeholder="Enter admin password"
                    required
                    autocomplete="current-password"
                >
            </div>

            <div style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary">
                    Authenticate &nbsp;→
                </button>
            </div>

        </form>

        <div class="divider"></div>

        <p style="text-align:center; font-size: 12px; color: var(--text-dim);">
            🔐 This session is monitored for security purposes
        </p>

        <div style="text-align:center;">
            <a href="home.php" class="back-link">← Back to Home</a>
        </div>

    </div>
</div>

</body>
</html>