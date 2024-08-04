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

<?php if (!empty($users)): ?>
  <div class="allUsers">
    <?php foreach ($users as $user): ?>
      <div class="users">

        <h3>Email: <?php echo htmlspecialchars($user['Email']); ?></h3>
        <h3>Admin Status: <?php echo htmlspecialchars($user['isAdmin'] ? 'Yes' : 'No'); ?></h3>
        <div class="userBtn">
          <a href='index.php?page=/adminPages/editUsers&id=<?php echo htmlspecialchars($user['UserId']); ?>'>Edit
            User</a>
          <a href='index.php?page=/adminPages/deleteUsers&id=<?php echo htmlspecialchars($user['UserId']); ?>'>Delete
            User</a>
        </div>
      </div><?php endforeach; ?>
  </div>

<?php else: ?>
  <p>No users found.</p>
<?php endif; ?>