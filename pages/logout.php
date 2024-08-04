<?php
session_start();
$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : null;
session_destroy();
session_start();
if ($theme !== null) {
  $_SESSION['theme'] = $theme;
}
header("Location: index.php?page=home");
exit();