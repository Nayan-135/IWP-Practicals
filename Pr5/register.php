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
                alert('User already exists! Please login.');
                window.location.href='register.php';
              </script>";

    } else {

        $insert = $conn->query("INSERT INTO users 
                    (username, password, email, phone, city, role) 
                    VALUES 
                    ('$username', '$password', '$email', '$phone', '$city', 'user')");

        if ($insert) {
            echo "<script>
                    alert('You have registered successfully!');
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
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Create Account</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="text" name="phone" placeholder="Enter Phone Number" 
               pattern="[0-9]{10}" title="Enter 10 digit phone number" required>

        <input type="text" name="city" placeholder="Enter City" required>

        <button type="submit">Register</button>
    </form>

    <br>
    <a href="home.php">Back to Home</a>
</div>

</body>
</html>
