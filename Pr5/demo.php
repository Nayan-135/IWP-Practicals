<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePlex — Now Showing</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper" style="align-items: flex-start; padding-top: 40px;">
<div class="card wide-card movie-page" style="width:100%;">

    <!-- Navbar -->
    <div class="navbar">
        <div class="nav-brand">🎬 CinePlex</div>
        <div class="nav-right">
            <div class="user-greeting">Hello, <span><?php echo $username; ?></span></div>
            <a href="logout.php" class="btn btn-ghost" style="width:auto; padding: 9px 18px; font-size:13px;">
                Sign Out
            </a>
        </div>
    </div>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-text">
            <div class="hero-eyebrow">🍿 Now Showing — Week 7</div>
            <div class="hero-title">Book Your Perfect<br>Movie Night</div>
            <div class="hero-sub">Select a film, pick your showtime, and grab the best seats.</div>
        </div>
        <div style="display: flex; gap: 10px; flex-wrap: wrap; position: relative; z-index: 1;">
            <div style="text-align:center; background: rgba(0,0,0,0.3); border: 1px solid var(--gold-border); border-radius: 12px; padding: 14px 20px; backdrop-filter: blur(8px);">
                <div style="font-family: 'Playfair Display', serif; font-size: 26px; color: var(--gold); line-height: 1;">6</div>
                <div style="font-size: 10px; color: var(--text-muted); text-transform:uppercase; letter-spacing: 0.1em; margin-top: 4px;">Screens</div>
            </div>
            <div style="text-align:center; background: rgba(0,0,0,0.3); border: 1px solid var(--gold-border); border-radius: 12px; padding: 14px 20px; backdrop-filter: blur(8px);">
                <div style="font-family: 'Playfair Display', serif; font-size: 26px; color: var(--gold); line-height: 1;">12</div>
                <div style="font-size: 10px; color: var(--text-muted); text-transform:uppercase; letter-spacing: 0.1em; margin-top: 4px;">Films</div>
            </div>
            <div style="text-align:center; background: rgba(0,0,0,0.3); border: 1px solid var(--gold-border); border-radius: 12px; padding: 14px 20px; backdrop-filter: blur(8px);">
                <div style="font-family: 'Playfair Display', serif; font-size: 26px; color: var(--gold); line-height: 1;">4K</div>
                <div style="font-size: 10px; color: var(--text-muted); text-transform:uppercase; letter-spacing: 0.1em; margin-top: 4px;">Dolby</div>
            </div>
        </div>
    </div>

    <!-- Now Showing Grid -->
    <div class="section-heading">
        <div class="section-title">Now Showing</div>
        <a href="#" class="section-link">View All →</a>
    </div>

    <div class="movies-grid">

        <!-- Movie 1 -->
        <div class="movie-card">
            <div class="movie-poster" style="background: linear-gradient(145deg, #1a0a2e, #3d1a6e);">
                🌌
                <div class="poster-overlay"></div>
                <div class="rating-chip">⭐ 8.9</div>
            </div>
            <div class="movie-info">
                <div class="movie-title">Galactic Void</div>
                <div class="movie-genre">Sci-Fi · Action · 2h 28m</div>
                <button class="book-btn" onclick="showBooking('Galactic Void')">Book Tickets</button>
            </div>
        </div>

        <!-- Movie 2 -->
        <div class="movie-card">
            <div class="movie-poster" style="background: linear-gradient(145deg, #0d1f0a, #1a4a10);">
                🐉
                <div class="poster-overlay"></div>
                <div class="rating-chip">⭐ 8.2</div>
            </div>
            <div class="movie-info">
                <div class="movie-title">Dragon's Ember</div>
                <div class="movie-genre">Fantasy · Adventure · 2h 14m</div>
                <button class="book-btn" onclick="showBooking('Dragon\'s Ember')">Book Tickets</button>
            </div>
        </div>

        <!-- Movie 3 -->
        <div class="movie-card">
            <div class="movie-poster" style="background: linear-gradient(145deg, #1f0808, #5a1010);">
                🔪
                <div class="poster-overlay"></div>
                <div class="rating-chip">⭐ 7.8</div>
            </div>
            <div class="movie-info">
                <div class="movie-title">The Last Hour</div>
                <div class="movie-genre">Thriller · Crime · 1h 58m</div>
                <button class="book-btn" onclick="showBooking('The Last Hour')">Book Tickets</button>
            </div>
        </div>

        <!-- Movie 4 -->
        <div class="movie-card">
            <div class="movie-poster" style="background: linear-gradient(145deg, #08101f, #0a2a5a);">
                🌊
                <div class="poster-overlay"></div>
                <div class="rating-chip">⭐ 9.1</div>
            </div>
            <div class="movie-info">
                <div class="movie-title">Abyssal Tide</div>
                <div class="movie-genre">Action · Drama · 2h 35m</div>
                <button class="book-btn" onclick="showBooking('Abyssal Tide')">Book Tickets</button>
            </div>
        </div>

        <!-- Movie 5 -->
        <div class="movie-card">
            <div class="movie-poster" style="background: linear-gradient(145deg, #1a1400, #4a3c00);">
                🏆
                <div class="poster-overlay"></div>
                <div class="rating-chip">⭐ 8.5</div>
            </div>
            <div class="movie-info">
                <div class="movie-title">Champions</div>
                <div class="movie-genre">Sport · Drama · 2h 08m</div>
                <button class="book-btn" onclick="showBooking('Champions')">Book Tickets</button>
            </div>
        </div>

        <!-- Movie 6 -->
        <div class="movie-card">
            <div class="movie-poster" style="background: linear-gradient(145deg, #1a0014, #4a0040);">
                💀
                <div class="poster-overlay"></div>
                <div class="rating-chip">⭐ 7.4</div>
            </div>
            <div class="movie-info">
                <div class="movie-title">Shadow Protocol</div>
                <div class="movie-genre">Horror · Mystery · 1h 52m</div>
                <button class="book-btn" onclick="showBooking('Shadow Protocol')">Book Tickets</button>
            </div>
        </div>

    </div>

    <!-- Today's Showtimes -->
    <div class="showtime-section">
        <div class="section-heading">
            <div class="section-title">Today's Showtimes</div>
            <span style="font-size:12px; color: var(--text-muted);">
                📅 <?php echo date('l, d F Y'); ?>
            </span>
        </div>

        <div class="showtime-row">
            <div class="show-poster-mini">🌌</div>
            <div class="show-details">
                <div class="show-movie-name">Galactic Void</div>
                <div class="show-meta">Screen 1 &nbsp;·&nbsp; Dolby Atmos &nbsp;·&nbsp; ₹320 onwards</div>
            </div>
            <div class="show-times">
                <div class="time-chip" onclick="selectTime('Galactic Void','10:00 AM')">10:00 AM</div>
                <div class="time-chip" onclick="selectTime('Galactic Void','1:30 PM')">1:30 PM</div>
                <div class="time-chip almost-full" onclick="selectTime('Galactic Void','5:00 PM')">5:00 PM 🔥</div>
                <div class="time-chip" onclick="selectTime('Galactic Void','9:15 PM')">9:15 PM</div>
            </div>
        </div>

        <div class="showtime-row">
            <div class="show-poster-mini">🐉</div>
            <div class="show-details">
                <div class="show-movie-name">Dragon's Ember</div>
                <div class="show-meta">Screen 2 &nbsp;·&nbsp; 4K IMAX &nbsp;·&nbsp; ₹280 onwards</div>
            </div>
            <div class="show-times">
                <div class="time-chip" onclick="selectTime('Dragon\'s Ember','11:00 AM')">11:00 AM</div>
                <div class="time-chip almost-full" onclick="selectTime('Dragon\'s Ember','2:45 PM')">2:45 PM 🔥</div>
                <div class="time-chip" onclick="selectTime('Dragon\'s Ember','6:30 PM')">6:30 PM</div>
                <div class="time-chip" onclick="selectTime('Dragon\'s Ember','10:00 PM')">10:00 PM</div>
            </div>
        </div>

        <div class="showtime-row">
            <div class="show-poster-mini">🌊</div>
            <div class="show-details">
                <div class="show-movie-name">Abyssal Tide</div>
                <div class="show-meta">Screen 4 &nbsp;·&nbsp; Standard &nbsp;·&nbsp; ₹180 onwards</div>
            </div>
            <div class="show-times">
                <div class="time-chip" onclick="selectTime('Abyssal Tide','12:15 PM')">12:15 PM</div>
                <div class="time-chip" onclick="selectTime('Abyssal Tide','3:45 PM')">3:45 PM</div>
                <div class="time-chip almost-full" onclick="selectTime('Abyssal Tide','7:15 PM')">7:15 PM 🔥</div>
            </div>
        </div>

        <div class="showtime-row">
            <div class="show-poster-mini">🔪</div>
            <div class="show-details">
                <div class="show-movie-name">The Last Hour</div>
                <div class="show-meta">Screen 3 &nbsp;·&nbsp; Standard &nbsp;·&nbsp; ₹160 onwards</div>
            </div>
            <div class="show-times">
                <div class="time-chip" onclick="selectTime('The Last Hour','9:30 AM')">9:30 AM</div>
                <div class="time-chip" onclick="selectTime('The Last Hour','12:00 PM')">12:00 PM</div>
                <div class="time-chip" onclick="selectTime('The Last Hour','4:00 PM')">4:00 PM</div>
                <div class="time-chip" onclick="selectTime('The Last Hour','8:30 PM')">8:30 PM</div>
            </div>
        </div>

    </div>

    <!-- CTA Banner -->
    <div class="cta-banner">
        <div class="cta-text">
            <div class="cta-title">🎁 CinePlex Member Perks</div>
            <div class="cta-sub">Earn reward points on every booking. Redeem for free tickets.</div>
        </div>
        <div class="cta-actions">
            <a href="#" class="btn btn-ghost" style="width:auto; padding: 11px 22px;">Learn More</a>
            <a href="#" class="btn btn-primary" style="width:auto; padding: 11px 22px;">Redeem Points</a>
        </div>
    </div>

</div>
</div>

<!-- Booking Modal -->
<div id="booking-modal" style="
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.8);
    backdrop-filter: blur(6px);
    z-index: 999;
    justify-content: center;
    align-items: center;
    padding: 20px;
">
    <div style="
        background: var(--surface);
        border: 1px solid var(--gold-border);
        border-radius: var(--radius-xl);
        padding: 36px 40px;
        max-width: 440px;
        width: 100%;
        box-shadow: var(--shadow);
        position: relative;
        animation: fadeUp 0.3s ease both;
    ">
        <div class="brand" style="margin-bottom: 20px;">
            <div class="brand-icon" style="width:54px; height:54px;">🎟️</div>
            <div class="brand-name" style="font-size: 20px;">Confirm Booking</div>
        </div>

        <div id="booking-details" style="
            background: var(--dark-3);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: var(--radius-lg);
            padding: 18px 20px;
            margin-bottom: 20px;
        ">
            <div style="display:flex; justify-content:space-between; margin-bottom: 10px;">
                <span style="font-size:12px; color: var(--text-muted); text-transform:uppercase; letter-spacing: 0.1em;">Film</span>
                <span id="modal-movie" style="font-weight: 600; color: var(--text); font-size: 14px;"></span>
            </div>
            <div style="display:flex; justify-content:space-between; margin-bottom: 10px;">
                <span style="font-size:12px; color: var(--text-muted); text-transform:uppercase; letter-spacing: 0.1em;">Showtime</span>
                <span id="modal-time" style="font-weight: 600; color: var(--gold); font-size: 14px;"></span>
            </div>
            <div style="display:flex; justify-content:space-between;">
                <span style="font-size:12px; color: var(--text-muted); text-transform:uppercase; letter-spacing: 0.1em;">Member</span>
                <span style="font-weight: 600; color: var(--text); font-size: 14px;"><?php echo $username; ?></span>
            </div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button onclick="closeModal()" class="btn btn-ghost" style="flex: 1;">Cancel</button>
            <button onclick="confirmBooking()" class="btn btn-primary" style="flex: 2;">Confirm Booking →</button>
        </div>

        <button onclick="closeModal()" style="
            position: absolute;
            top: 16px; right: 16px;
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 20px;
            cursor: pointer;
            width: auto;
            padding: 0;
            transition: var(--transition);
            line-height: 1;
        " onmouseover="this.style.color='var(--text)'" onmouseout="this.style.color='var(--text-muted)'">✕</button>
    </div>
</div>

<script>
    let selectedMovie = '';
    let selectedTime  = '';

    function showBooking(movie) {
        selectedMovie = movie;
        selectedTime  = 'Please select a showtime below';
        document.getElementById('modal-movie').textContent = movie;
        document.getElementById('modal-time').textContent  = selectedTime;
        document.getElementById('booking-modal').style.display = 'flex';
    }

    function selectTime(movie, time) {
        selectedMovie = movie;
        selectedTime  = time;
        document.getElementById('modal-movie').textContent = movie;
        document.getElementById('modal-time').textContent  = time;
        document.getElementById('booking-modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('booking-modal').style.display = 'none';
    }

    function confirmBooking() {
        if (selectedTime === 'Please select a showtime below') {
            alert('Please select a showtime first from the list below.');
            closeModal();
            return;
        }
        closeModal();
        // Success toast
        const toast = document.createElement('div');
        toast.innerHTML = '🎟️ Booking confirmed for <strong>' + selectedMovie + '</strong> at <strong>' + selectedTime + '</strong>!';
        toast.style.cssText = `
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: #1a2e1a;
            border: 1px solid rgba(39,174,96,0.4);
            color: #2ECC71;
            padding: 14px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            z-index: 9999;
            box-shadow: 0 8px 32px rgba(0,0,0,0.5);
            animation: fadeUp 0.3s ease both;
            white-space: nowrap;
        `;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 4000);
    }

    // Close modal on backdrop click
    document.getElementById('booking-modal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });
</script>

</body>
</html>