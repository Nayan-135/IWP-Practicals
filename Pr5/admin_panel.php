<?php
session_start();
include("db.php");

/* Check if admin is logged in */
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

/* Fetch all users */
$result = $conn->query("SELECT id, username, email, phone, city, role FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Admin Panel - All Users</h2>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['city']}</td>
                                <td>{$row['role']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No Users Found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <br>
    <a href="logout.php"><button>Logout</button></a>
</div>

</body>
</html>
