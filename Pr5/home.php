<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePlex — Your Movie Experience</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper">
    <div class="card auth-card">

        <!-- Brand -->
        <div class="brand">
            <div class="brand-icon">🎬</div>
            <div class="brand-name">CinePlex</div>
            <div class="brand-tagline">Premium Movie Booking</div>
        </div>

        <div class="divider"></div>

        <p class="page-hint" style="margin-bottom: 22px;">Welcome back. Choose how you'd like to continue.</p>

        <!-- Portal Buttons -->
        <a href="register.php" class="portal-btn">
            <div class="portal-btn-icon gold">✨</div>
            <div class="portal-btn-text">
                <div class="portal-btn-label">Create Account</div>
                <div class="portal-btn-desc">New here? Join CinePlex today</div>
            </div>
            <div class="portal-btn-arrow">→</div>
        </a>

        <a href="login.php" class="portal-btn">
            <div class="portal-btn-icon gold">🎟️</div>
            <div class="portal-btn-text">
                <div class="portal-btn-label">Member Login</div>
                <div class="portal-btn-desc">Access your bookings & account</div>
            </div>
            <div class="portal-btn-arrow">→</div>
        </a>

        <a href="admin_login.php" class="portal-btn">
            <div class="portal-btn-icon silver">🛡️</div>
            <div class="portal-btn-text">
                <div class="portal-btn-label">Admin Portal</div>
                <div class="portal-btn-desc">Staff & management access</div>
            </div>
            <div class="portal-btn-arrow">→</div>
        </a>

        <div class="divider"></div>
        <p style="font-size:12px; color: var(--text-dim); text-align:center; font-style: italic;">
            Now showing — <span style="color: var(--gold);">12 blockbusters</span> across 6 screens
        </p>

    </div>
</div>

</body>
</html>