<?php
include 'dbConnection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = getUserByEmail($email);

    if ($user && $user['Password'] === $password) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_id'] = $user['UserId'];
        header("Location: index.php?page=adminPages/adminDashboard"); 
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>

<form method="POST" action="index.php?page=adminLogin">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" required />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required />

    <button type="submit">Login</button>
</form>
