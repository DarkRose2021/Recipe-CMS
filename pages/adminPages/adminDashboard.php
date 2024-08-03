<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: adminLogin.php");
  exit();
}
?>

<h1>Admin Dashboard</h1>
<ul>
  <li><a href="index.php?page=adminPages/adminAddRecipe">Add recipe</a></li>
  <li><a href="index.php?page=adminPages/delete_page">Delete recipe</a></li>
  <li><a href="index.php?page=adminPages/edit_content">Edit recipe</a></li>
  <li><a href="index.php?page=adminPages/change_theme">Change Theme</a></li>
</ul>