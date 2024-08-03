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

<!--testing the connection-->
<?php if (!empty($users)): ?>
<table>
    <tr>
        <th>Username</th>
        <th>Email</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['Username']); ?></td>
            <td><?php echo htmlspecialchars($user['Email']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>

