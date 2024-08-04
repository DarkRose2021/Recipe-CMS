<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: adminLogin.php");
  exit();
}

require 'dbConnection.php';

$userId = isset($_GET['id']) ? intval($_GET['id']) : null;
if (!$userId) {
  die("<h2 class='error'>No User ID provided.</h2>");
}

if ($userId == 1) {
  die("<h2 class='error'>Cannot edit that user</h2>");
}

$user = getUserById($userId);
if (!$user) {
  die("<h2 class='error'>No User Found</h2>");
}

switch ($user['isAdmin']) {
  case '1':
    $isAdmin = 0;
    break;
  case '0':
    $isAdmin = 1;
    break;
}

$delUser = updateUser($userId, $isAdmin);

if (!$delUser) {
  die("<h2 class='error'>Unable to update user</h2>");
}

header('Location: index.php?page=adminPages/users');