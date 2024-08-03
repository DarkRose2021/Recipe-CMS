<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: index.php?page=home");
  exit();
}

require 'dbConnection.php';

$recipeId = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$recipeId) {
  die('No recipe ID provided.');
}

$ingredients = removeRecipeIngredient($recipeId);
$instructions = deleteInstruction($recipeId);

$recipe = deleteRecipe($recipeId);
if (!$recipe || !$ingredients || !$instructions) {
  die('Recipe not Found');
}

header('Location: index.php?page=recipe');

