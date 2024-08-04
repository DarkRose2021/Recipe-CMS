<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: index.php?page=home");
  exit();
}

$currentTheme = $_SESSION["theme"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $newTheme = $_POST['theme'];
  $_SESSION['theme'] = $newTheme;
  $currentTheme = $newTheme;
}

?>

<h1>Change Theme</h1>

<h2>Currently Theme: <?= htmlspecialchars($currentTheme) ?></h2>

<form action="" method="POST">
  <label>Change theme</label><br />
  <input type="radio" id="default" name="theme" value="default" <?= $currentTheme == 'default' ? 'checked' : '' ?>>
  <label for="default">Default</label><br>
  <input type="radio" id="halloween" name="theme" value="halloween" <?= $currentTheme == 'halloween' ? 'checked' : '' ?>>
  <label for="halloween">Halloween</label><br>
  <input type="radio" id="other" name="theme" value="other(name later)" <?= $currentTheme == 'other(name later)' ? 'checked' : '' ?>>
  <label for="other">Other(Name Later)</label><br />
  <button type="submit">Change Theme</button>
</form>
