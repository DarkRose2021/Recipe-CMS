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
<div class="button-wrapper">
  <div class="themeForm">
    <h2>Currently Theme: <?= htmlspecialchars($currentTheme) ?></h2>

    <form action="" method="POST">
      <label>Change theme</label><br />
      <input type="radio" id="default" name="theme" value="default" <?= $currentTheme == 'default' ? 'checked' : '' ?>>
      <label for="default">Default</label><br>
      <input type="radio" id="halloween" name="theme" value="halloween" <?= $currentTheme == 'halloween' ? 'checked' : '' ?>>
      <label for="halloween">Halloween</label><br>
      <input type="radio" id="bloomingOasis" name="theme" value="bloomingOasis" <?= $currentTheme == 'bloomingOasis' ? 'checked' : '' ?>>
      <label for="bloomingOasis">Blooming Oasis</label><br />
      <button class="submit-button" type="submit">Change Theme</button>
    </form>
  </div>
</div>