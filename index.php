
<html>
<head>
    <title>Recipe CMS</title>
    <link rel="stylesheet" href="./styles.php" />
</head>
<body>
    <br />
    <div class="menuButtons">
        <a href="index.php?page=home">Home</a>
        <a href="index.php?page=about">About</a>
        <a href="index.php?page=contact">Contact</a>
        <a href="index.php?page=recipe">Recipes</a>
        <a href="index.php?page=admin">Admin</a>
        <a href="index.php?page=users">Users</a>
    </div>
    <br />

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
    <footer> Copyright &copy; | Katie King, Jace Banford-Byington & Henry Rodriguez Berber | 2024
    </footer>

</body>
</html>
