<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: index.php?page=home");
  exit();
}
?>

<h1>Admin Dashboard</h1>
<ul>
  <li><a href="index.php?page=adminPages/adminAddRecipe">Add recipe</a></li>
  <li><a href="index.php?page=adminPages/users">Users</a></li>
  <li><a href="index.php?page=adminPages/change_theme">Change Theme</a></li>
</ul>