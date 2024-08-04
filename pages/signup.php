<?php
include 'dbConnection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $emailConfirm = $_POST['confirm_email'];
  $passwordConfirm = $_POST['confirm_password'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if($email === $emailConfirm && $password === $passwordConfirm) {
    $user = createUser($email, $password);
    if($user) {
      $newUser = getUserByEmail($email);
      $_SESSION['admin_logged_in'] = false;
      $_SESSION['user_id'] = $newUser['UserId'];
      header('Location: index.php?page=home');
      exit();
    } else {
      echo "<h2 class='error'>Error creating account</h2>";
    }
  }else{
    echo "<h2 class='error'>Email or password don't match</h2>";
  }
}
?>

<form method="POST" action="index.php?page=signup">
  <label for="email">Email</label>
  <input type="email" id="email" name="email" required />
  
  <label for="confirm_email">Confirm Email</label>
  <input type="email" id="confirm_email" name="confirm_email" required />
  
  <label for="password">Password</label>
  <input type="password" id="password" name="password" required />
  
  <label for="confirm_password">Confirm Password</label>
  <input type="password" id="confirm_password" name="confirm_password" required />
  
  <button type="submit">Sign Up</button>
</form>
