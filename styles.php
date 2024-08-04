<?php
session_start();

// Define the themes
$themes = [
    'default' => [
        'darkColor' => '#16151C',
        'purple' => '#71677C',
        'main' => '#1D8782',
        'lightBlue' => '#47BAD3',
        'white' => '#F3E9EB',
    ],
    'halloween' => [
        'darkColor' => '#FFFFFF',
        'purple' => '#9B59B6',
        'main' => '#3498DB',
        'lightBlue' => '#A3E4D7',
        'white' => '#2C3E50',
    ],
    'other(name later)' => [
        'darkColor' => '#FFC300',
        'purple' => '#C70039',
        'main' => '#FF5733',
        'lightBlue' => '#DAF7A6',
        'white' => '#581845',
    ],
];

// Set the current theme based on session or default to 'dark'
$currentTheme = $_SESSION['theme'] ?? 'default';

// If there's a new theme request, update the session
if (isset($_GET['theme']) && array_key_exists($_GET['theme'], $themes)) {
    $currentTheme = $_GET['theme'];
    $_SESSION['theme'] = $currentTheme;
}

// Get the current theme colors
$colors = $themes[$currentTheme];

// Output the CSS
header("Content-Type: text/css");
?>

body {
  background-color: <?php echo $colors['darkColor']; ?>;
  color: <?php echo $colors['white']; ?>;
  font-family: "Rancho", cursive;
  font-weight: 400;
  font-style: normal;
  margin: 0;
  padding-top: 70px;
}

h1 {
  color: <?php echo $colors['main']; ?>;
  text-align: center;
}

a, a:visited {
  color: <?php echo $colors['purple']; ?>;
  text-decoration: none;
}

.navbar {
  background-color: <?php echo $colors['main']; ?>;
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 1000;
  padding: 10px 0;
}

.navbar .container {
  display: flex;
  width: 100%;
  max-width: 1200px;
  margin: 0 20px;
  padding: 0 15px;
}

.navbar-brand {
  font-size: 24px;
  color: <?php echo $colors['white']; ?> !important;
  padding: 10px 15px;
}

.navbar-links {
  display: flex;
  gap: 15px;
}

.navbar-links a {
  color: <?php echo $colors['white']; ?>;
  padding: 10px 15px;
  transition: background-color 0.3s;
}

.navbar-links a:hover {
  background-color: <?php echo $colors['lightBlue']; ?>;
  color: <?php echo $colors['white']; ?>;
  border-radius: 4px;
}

footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}

.recipeCard {
  background-color: <?php echo $colors['white']; ?>;
  color: <?php echo $colors['darkColor']; ?>;
  width: 500px;
  text-align: center;
  border-radius: 10px;
  padding: .5%;
  margin: 1%;
}

.allRecipes {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}
