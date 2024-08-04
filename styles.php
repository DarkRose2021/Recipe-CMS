<?php
session_start();

$themes = [
    'default' => [
        'bg' => '#16151C',
        'btn' => '#806997',
        'btnHover' => '#9683A9',
        'main' => '#1D8782',
        'lightBlue' => '#47BAD3',
        'white' => '#F3E9EB',
        'nav'=> '#182429',
        'navHover' => '#19383B',
        'error'=> 'red',
    ],
    'halloween' => [
        'bg' => '#363039 ',
        'btn' => '#D3A136',
        'btnHover' => '#FFC341',
        'main' => '#FB6F2D',
        'lightBlue' => '#89E031',
        'white' => '#F3E9EB',
        'nav'=> '#872FE0',
        'navHover' => '#5F308D',
        'error'=> 'red',
    ],
    'bloomingOasis' => [
        'bg' => '#FFD3BA',
        'btn' => '#805D93',
        'btnHover' => '#9679A6',
        'main' => '#169873',
        'lightBlue' => '#90AC64',
        'white' => '#16151C',
        'nav'=> '#F49FBC',
        'navHover' => '#F6B0C8',
        'error'=> 'red',
    ],
];

$currentTheme = $_SESSION['theme'] ?? 'default';

if (isset($_GET['theme']) && array_key_exists($_GET['theme'], $themes)) {
    $currentTheme = $_GET['theme'];
    $_SESSION['theme'] = $currentTheme;
}

$colors = $themes[$currentTheme];

header("Content-Type: text/css");
?>

html, body {
  background-color: <?php echo $colors['bg']; ?>;
  color: <?php echo $colors['white']; ?>;
  font-family: "Rancho", cursive;
  font-weight: 400;
  font-style: normal;
}

/* For WebKit browsers (Chrome, Safari) */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* For Firefox */
input[type="number"] {
  -moz-appearance: textfield;
}

h1 {
  color: <?php echo $colors['main']; ?>;
  text-align: center;
  font-size: 2em;
}

h3{
  color: <?php echo $colors['lightBlue'] ?>;
  text-align: center;
}

.home p{
  width: 600px;
}

.home{
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  font-size: 1.3em;
}

.home div{
  margin: 1% 2%;
}

.contactForm{
  flex-direction: column;
}

a {
  background-color:<?php echo $colors['btn']; ?>;
  border: none;
  color: <?php echo $colors['white']; ?>;
  padding: 1%;
  text-align: center;
  font-size: 16px;
  border-radius: 5px;
  text-decoration: none;
}

a:hover{
  background-color:<?php echo $colors['btnHover']; ?>;
  cursor: pointer;
}

.navbar {
  background-color: <?php echo $colors['nav']; ?>;
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 1000;
  padding: 10px 0;
  font-size: 1em;
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
  background-color: <?php echo $colors['nav']; ?>  !important;
}

.navbar-links {
  display: flex;
  gap: 15px;
}

.navbar-links a {
  color: <?php echo $colors['white']; ?>;
  padding: 10px 15px;
  transition: background-color 0.3s;
  background-color: <?php echo $colors['nav']; ?>  !important;
}

.navbar-links a:hover {
  background-color: <?php echo $colors['navHover']; ?> !important;
  color: <?php echo $colors['white']; ?>;
  border-radius: 4px;
}

footer {
  background-color: <?php echo $colors['nav']; ?>;
  padding: .5%;
  margin-top: 1%;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}

.otherPpl{
  font-size: 3px;
}

.filterButtons {
  text-align: center;
  margin: 20px 0;
}

.filterButton {
  background-color: <?php echo $colors['btn']; ?>;
  border: none;
  color: <?php echo $colors['white']; ?>;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1em;
  margin: 5px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.filterButton:hover {
  background-color: <?php echo $colors['btnHover']; ?>;
}

.allRecipes {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;
  margin: 20px;
  font-size: 1.1em;
}

.recipeCard {
  display: flex;
  flex-direction: column;
  align-items: center; 
  background-color: <?php echo $colors['navHover']; ?>;
  color: <?php echo $colors['white']; ?>;
  border: 1px solid <?php echo $colors['nav']; ?>;
  border-radius: 10px;
  padding: 15px;
  width: 500px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.recipeCard:hover {
  transform: scale(1.03);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.recipeTitle {
  font-size: 1.5em;
  margin-top: 0;
  color: <?php echo $colors['btn']; ?>;
}

.recipeDescription,
.recipeTime,
.recipeServings {
  font-size: 1em;
  color: <?php echo $colors['white']; ?>;
  margin: 5px 0;
}

.ingredientsTitle,
.directionsTitle {
  font-size: 1.2em;
  margin-top: 10px;
  color: <?php echo $colors['lightBlue']; ?>;
}

.ingredientsList,
.directionsList {
  margin: 10px 0;
  padding-left: 20px;
  text-align: left;
}

.recipeCategory{
  background-color: <?php echo $colors['lightBlue']; ?>;
  width: 70px;
  padding: 1.5% 2%;
  margin: 1%;
  color: <?php echo $colors['bg']; ?>;
  text-align: center;
  border-radius: 5px;
}

.ingredientItem,
.directionItem {
  margin-bottom: 5px;
}

.actionButton {
  background-color: <?php echo $colors['btn']; ?>;
  border: none;
  color: <?php echo $colors['white']; ?>;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1em;
  margin: 5px 0;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.actionButton:hover {
  background-color: <?php echo $colors['btnHover']; ?>;
}

.adminButtons {
  width: 100%;
  display: flex;
  justify-content: space-between; 
  margin-top: 10px;
}

.error {
  text-align: center;
  font-size: 1.2em;
  color: <?php echo $colors['error']; ?>;
}

.loginForm, .themeForm {
  background-color: <?php echo $colors['navHover']; ?>;
  width: 400px;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  font-size: 2em;
}

.themeForm input[type="radio"] {
  display: none;
}

.themeForm input[type="radio"] + label {
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  display: inline-block;
  line-height: 20px;
}

.themeForm input[type="radio"] + label:before {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  transform: translateY(-50%);
  border: 2px solid <?php echo $colors['btn']; ?>;
}

.themeForm input[type="radio"]:checked + label:before {
  background-color: <?php echo $colors['main']; ?>;
  border-color: <?php echo $colors['main']; ?>;
}

.themeForm input[type="radio"]:checked + label {
  color: <?php echo $colors['main']; ?>;
}

.themeForm label {
  margin-right: 15px;
  padding: 5px;
}

.themeForm input[type="radio"] {
  margin-right: 5px;
}

.themeForm {
  margin-top: 20px;
}


.button-wrapper {
  display: flex;
  justify-content: center;
  width: 100%;
  margin-top: 5%;
}

.loginForm button {
  padding: 2%;
  font-size: .6em;
}

.loginForm h2{
  text-align: center;
  color: <?php echo $colors['lightBlue'] ?>;
}

.loginForm input{
  width: 100%;
  height: 35px;
  font-size: .7em;
}

.dashboardBtn{
  width: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.dashboardBtn a{
  font-size: 1.5em;
}

.recipe-form {
  background-color: <?php echo $colors['navHover'] ?> ;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  max-width: 800px;
  margin: auto;
}

.form-label {
  font-size: 1.5em;
  display: block;
  font-weight: bold;
  margin: 10px 0 5px;
}

.form-input, .form-textarea {
  background-color: <?php echo $colors['nav'] ?> ;
  color: <?php echo $colors['white'] ?> ;
  width: 100%;
  padding: 8px;
  border: 1px solid <?php echo $colors['nav'] ?>;
  border-radius: 4px;
  margin-bottom: 10px;
}

.form-textarea {
  height: 100px;
}

.submit-button, .add-button {
  background-color:  <?php echo $colors['btn'] ?>;
  color:  <?php echo $colors['white'] ?>;
  border: none;
  padding: 10px 15px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.submit-button:hover, .add-button:hover {
  background-color:  <?php echo $colors['btnHover'] ?>;
}

.remove-ingredient, .remove-instruction {
  background-color:  <?php echo $colors['btn'] ?>;
  color:  <?php echo $colors['white'] ?>;
  border: none;
  padding: 5px 10px;
  border-radius: 4px;
  cursor: pointer;
}

.remove-ingredient:hover, .remove-instruction:hover {
  background-color:  <?php echo $colors['btnHover'] ?>;
}

.section-title {
  font-size: 2.5em;
  border-bottom: 3px solid <?php echo $colors['nav'] ?>;
  padding-bottom: 10px;
  color:  <?php echo $colors['lightBlue'] ?>;
}

.ingredient-item, .instruction-item {
  background-color: <?php echo $colors['navHover'] ?> ;
  color: <?php echo $colors['white'] ?> ;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 4px;
}

.ingredients-container, .instructions-container {
  margin-bottom: 20px;
}

.submit-button{
  margin-top: 5%;
  width: 100%;
}