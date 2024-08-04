<?php
include 'dbConnection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = getUserByEmail($email);

  if ($user && $user['Password'] === $password) {
    if ($user['isAdmin']) {
      $_SESSION['admin_logged_in'] = true;
      $_SESSION['user_id'] = $user['UserId'];
      header("Location: index.php?page=adminPages/adminDashboard");
      exit();
    } else if (!$user['isAdmin']) {
      $_SESSION['admin_logged_in'] = false;
      $_SESSION['user_id'] = $user['UserId'];
      header('Location: index.php?page=home');
      exit();
    }
  } else {
    echo "<h2 class='error'>Invalid email or password.</h2>";
  }
}
?>
<div class="button-wrapper">
  <div class="loginForm">
    <h2>Login</h2>
    
    <form method="POST" action="index.php?page=adminLogin">
      <label for="email">Email</label>
      <input type="text" id="email" name="email" required /><br />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required /><br />

      <div class="button-wrapper">
        <button class="submit-button" type="submit">Login</button>
      </div>
    </form>
  </div>
</div>