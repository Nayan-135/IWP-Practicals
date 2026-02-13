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

/* Count stats */
$total_users  = 0;
$admin_count  = 0;
$user_count   = 0;
$all_rows     = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $all_rows[] = $row;
        $total_users++;
        if ($row['role'] === 'admin') $admin_count++;
        else $user_count++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePlex — Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper" style="align-items: flex-start; padding-top: 40px;">
    <div class="card wide-card" style="width:100%;">

        <!-- Header -->
        <div class="admin-header">
            <div class="admin-title-group">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:4px;">
                    <span style="font-size:24px;">🎬</span>
                    <div class="admin-title">Admin Panel</div>
                </div>
                <div class="admin-subtitle">
                    Logged in as &nbsp;<strong style="color: var(--gold);"><?php echo htmlspecialchars($_SESSION['admin']); ?></strong>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap: 12px;">
                <div class="admin-badge">● Live</div>
                <a href="logout.php" class="btn btn-danger" style="width:auto; padding: 10px 18px; font-size:13px;">
                    Sign Out
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-value"><?php echo $total_users; ?></div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?php echo $user_count; ?></div>
                <div class="stat-label">Members</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?php echo $admin_count; ?></div>
                <div class="stat-label">Admins</div>
            </div>
        </div>

        <!-- Table Section -->
        <div style="margin-bottom: 8px;">
            <div class="section-heading">
                <div class="section-title">All Registered Users</div>
                <span style="font-size:12px; color: var(--text-muted);">
                    <?php echo $total_users; ?> records found
                </span>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($all_rows)): ?>
                        <?php foreach ($all_rows as $row): ?>
                        <tr>
                            <td style="color: var(--text-muted); font-size:12px;"><?php echo $row['id']; ?></td>
                            <td>
                                <div class="td-user">
                                    <span class="user-avatar"><?php echo substr($row['username'], 0, 1); ?></span>
                                    <?php echo htmlspecialchars($row['username']); ?>
                                </div>
                            </td>
                            <td style="color: var(--text-muted);"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td style="color: var(--text-muted);"><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['city']); ?></td>
                            <td>
                                <?php if ($row['role'] === 'admin'): ?>
                                    <span class="role-badge role-admin">Admin</span>
                                <?php else: ?>
                                    <span class="role-badge role-user">Member</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="padding: 40px; text-align:center; color: var(--text-muted);">
                                No users found in the database.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>