<html>

<head>
  <title>Recipe CMS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./styles.php" />
</head>

<body>
<?php
session_start();
?>
  
<nav class="navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php?page=home">Recipe CMS</a>
      <div class="navbar-links">
        <a href="index.php?page=home">Home</a>
        <a href="index.php?page=about">About</a>
        <a href="index.php?page=contact">Contact</a>
        <a href="index.php?page=recipe">Recipes</a>
        <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
        <a href="index.php?page=adminPages/adminDashboard">Admin Dashboard</a>
        <a href="index.php?page=logout">Logout</a>
      <?php else: ?>
        <a href="index.php?page=adminLogin">Admin Login</a>
      <?php endif; ?>
      </div>
    </div>
  </nav>

  <main>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $pageFile = "pages/$page.php";

    if (file_exists($pageFile)) {
      include $pageFile;
    } else {
      echo '<h2>Page Not Found</h2>';
      echo '<p>The page you are looking for does not exist.</p>';
    }
    ?>
  </main>

  <br />
  <footer> Copyright &copy; 2024 | Katie King, Jace Banford-Byington, & Henry Rodriguez Berber | Placeholder text on
    home, about, and contact is AI Generated
  </footer>

</body>

</html>