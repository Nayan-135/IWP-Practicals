<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $city     = trim($_POST['city']);

    // Check if username already exists
    $check = $conn->query("SELECT id FROM users WHERE username='$username'");

    if ($check->num_rows > 0) {
        echo "<script>
                alert('Username already taken! Please choose another or login.');
                window.location.href='register.php';
              </script>";
    } else {
        $insert = $conn->query("INSERT INTO users
                    (username, password, email, phone, city, role)
                    VALUES
                    ('$username', '$password', '$email', '$phone', '$city', 'user')");

        if ($insert) {
            echo "<script>
                    alert('Account created successfully! Please login.');
                    window.location.href='login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Something went wrong. Please try again.');
                    window.location.href='register.php';
                  </script>";
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePlex — Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper">
    <div class="card auth-card" style="max-width: 500px;">

        <!-- Brand -->
        <div class="brand">
            <div class="brand-icon">✨</div>
            <div class="brand-name">CinePlex</div>
            <div class="brand-tagline">Create Your Account</div>
        </div>

        <p class="page-hint">Join thousands of movie lovers. Free forever.</p>

        <form method="POST" autocomplete="off">

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        class="form-input"
                        placeholder="Choose a username"
                        required
                    >
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="Create a password"
                        required
                    >
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input
                    type="email"
                    name="email"
                    class="form-input"
                    placeholder="your@email.com"
                    required
                >
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-input"
                        placeholder="10-digit number"
                        pattern="[0-9]{10}"
                        title="Enter a 10-digit phone number"
                        required
                    >
                </div>
                <div class="form-group">
                    <label class="form-label">City</label>
                    <input
                        type="text"
                        name="city"
                        class="form-input"
                        placeholder="Your city"
                        required
                    >
                </div>
            </div>

            <div style="margin-top: 24px;">
                <button type="submit" class="btn btn-primary">
                    Create Account &nbsp;→
                </button>
            </div>

        </form>

        <div class="divider"></div>

        <p style="text-align:center; font-size:13px; color: var(--text-muted);">
            Already have an account?
            <a href="login.php" class="link" style="margin-left:4px;">Sign in</a>
        </p>

        <div style="text-align:center;">
            <a href="home.php" class="back-link">← Back to Home</a>
        </div>

    </div>
</div>

</body>
</html>