<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: index.php?page=home");
  exit();
}

require 'dbConnection.php';

$recipeId = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$recipeId) {
  die("<h2 class='error'>No recipe ID provided.</h2>");
}

$ingredients = removeRecipeIngredient($recipeId);
$instructions = deleteInstruction($recipeId);

$recipe = deleteRecipe($recipeId);
if (!$recipe || !$ingredients || !$instructions) {
  die("<h2 class='error'>Recipe not Found</h2>");
}

header('Location: index.php?page=recipe');

