<?php
  header("Content-Type: text/css");
  $darkColor = '#16151C';
  $purple = '#71677C';
  $main = '#1D8782';
  $lightBlue = '#47BAD3';
  $white = '#F3E9EB';
?>

body {
  background-color: <?php echo $darkColor; ?>;
  color: <?php echo $white; ?>;
  font-family: "Rancho", cursive;
  font-weight: 400;
  font-style: normal;
  margin: 0;
  padding-top: 70px;
}

h1 {
  color: <?php echo $main; ?>;
  text-align: center;
}

a, a:visited {
  color: <?php echo $purple ?>;
  text-decoration: none;
}

.navbar {
  background-color: <?php echo $main; ?>;
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
  color: <?php echo $white; ?> !important;
  padding: 10px 15px;
}

.navbar-links {
  display: flex;
  gap: 15px;
}

.navbar-links a {
  color: <?php echo $white; ?>;
  padding: 10px 15px;
  transition: background-color 0.3s;
}

.navbar-links a:hover {
  background-color: #459C97;
  color: <?php echo $white; ?>;
  border-radius: 4px;
}

footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}

.recipeCard{
  background-color: <?php echo $white ?>;
  color: <?php echo $darkColor ?>;
  width: 500px;
  text-align: center;
  border-radius: 10px;
  padding: .5%;
  margin: 1%;
}

.allRecipes{
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}