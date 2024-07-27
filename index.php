<?php
include_once "header.php";
include 'dbConnection.php';
$users = getAllUsers();
?>

<!--testing the connection-->
<!--<?php if (!empty($users)): ?>
<table>
    <tr>
        <th>ID</th>
        <th>HighScore</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['UserID']); ?></td>
            <td><?php echo htmlspecialchars($user['HighScore']); ?></td>
            <td><?php echo htmlspecialchars($user['Username']); ?></td>
            <td><?php echo htmlspecialchars($user['Password']); ?></td>
            <td><?php echo htmlspecialchars($user['Email']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>-->

<?php
include_once "footer.php"; 
?>

