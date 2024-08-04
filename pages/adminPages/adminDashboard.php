<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: index.php?page=home");
  exit();
}
?>

<h1>Admin Dashboard</h1>
<div class="dashboardBtn">
  <a href="index.php?page=adminPages/adminAddRecipe">Add recipe</a>
  <a href="index.php?page=adminPages/users">Users</a>
  <a href="index.php?page=adminPages/ChangeTheme">Change Theme</a>
</div>