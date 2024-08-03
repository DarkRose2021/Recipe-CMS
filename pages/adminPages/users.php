<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: adminLogin.php");
    exit();
}

require_once 'dbConnection.php';
$users = getAllUsers();
?>

<h1>Users</h1>

<!-- Testing the connection -->
<?php if (!empty($users)): ?>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Admin Status</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['Email']); ?></td>
                <td><?php echo htmlspecialchars($user['isAdmin'] ? 'Yes' : 'No'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>