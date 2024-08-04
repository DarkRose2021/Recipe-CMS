<?php
session_start();
require_once 'dbConnection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['admin_logged_in'] == true) {
  header("Location: index.php?page=home");
  exit();
}

$recipeId = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$recipeId) {
  die("<h2 class='error'>No recipe ID provided.</h2>");
}

$recipe = getRecipeById($recipeId);
$ingredients = getFullRecipeIngredients($recipeId);
$instructions = getFullInstructionsByRecipeId($recipeId);

if (!$recipe) {
  die("<h2 class='error'>Recipe not found.</h2>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $prepTime = $_POST['prepTime'];
  $cookTime = $_POST['cookTime'];
  $totalTime = $_POST['totalTime'];
  $servings = $_POST['servings'];

  updateRecipe($recipeId, $title, $description, $category, $prepTime, $cookTime, $totalTime, $servings);

  foreach ($_POST['ingredients'] as $ingredientId => $ingredient) {
    if ($ingredient['id']) {
      updateRecipeIngredient($ingredientId, $ingredient['name'], $ingredient['unit'], $ingredient['quantity']);
    } else {
      addRecipeIngredient($recipeId, $ingredient['name'], $ingredient['unit'], $ingredient['quantity']);
    }
  }

  foreach ($_POST['instructions'] as $instructionId => $instruction) {
    if ($instruction['id']) {
      updateInstruction($instructionId, $instruction['stepNumber'], $instruction['description']);
    } else {
      addInstruction($recipeId, $instruction['stepNumber'], $instruction['description']);
    }
  }

  header('Location: index.php?page=recipe');
  exit;
}
?>

<h1 class="page-title">Update Recipe</h1>
<form action="" method="POST" class="recipe-form">
  <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['RecipeID']) ?>" class="recipe-id">

  <label for="title" class="form-label">Title:</label>
  <input type="text" id="title" name="title" value="<?= htmlspecialchars($recipe['Title']) ?>" required
    class="form-input"><br>

  <label for="description" class="form-label">Description:</label>
  <textarea id="description" name="description" required
    class="form-textarea"><?= htmlspecialchars($recipe['Description']) ?></textarea><br>

  <label for="category" class="form-label">Category:</label>
  <input type="text" id="category" name="category" value="<?= htmlspecialchars($recipe['Category']) ?>" required
    class="form-input"><br>

  <label for="prepTime" class="form-label">Prep Time (minutes):</label>
  <input type="number" id="prepTime" name="prepTime" value="<?= htmlspecialchars($recipe['PrepTime']) ?>" required
    class="form-input"><br>

  <label for="cookTime" class="form-label">Cook Time (minutes):</label>
  <input type="number" id="cookTime" name="cookTime" value="<?= htmlspecialchars($recipe['CookTime']) ?>" required
    class="form-input"><br>

  <label for="totalTime" class="form-label">Total Time (minutes):</label>
  <input type="number" id="totalTime" name="totalTime" value="<?= htmlspecialchars($recipe['TotalTime']) ?>" required
    class="form-input"><br>

  <label for="servings" class="form-label">Servings:</label>
  <input type="number" id="servings" name="servings" value="<?= htmlspecialchars($recipe['Servings']) ?>" required
    class="form-input"><br>

  <h2 class="section-title">Ingredients</h2>
  <?php foreach ($ingredients as $ingredient): ?>
    <div class="ingredient-item">
      <input type="hidden" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][id]"
        value="<?= $ingredient['RecipeIngredientID'] ?>" class="ingredient-id">
      <label class="form-label">Name:</label>
      <input type="text" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][name]"
        value="<?= htmlspecialchars($ingredient['Name']) ?>" required class="form-input"><br>
      <label class="form-label">Unit:</label>
      <input type="text" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][unit]"
        value="<?= htmlspecialchars($ingredient['Unit']) ?>" class="form-input"><br>
      <label class="form-label">Quantity:</label>
      <input type="number" step="0.01" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][quantity]"
        value="<?= htmlspecialchars($ingredient['Quantity']) ?>" required class="form-input"><br>
    </div>
  <?php endforeach; ?>
  <div id="ingredients-container" class="ingredients-container"></div>
  <button type="button" id="add-ingredient" class="add-button">Add Ingredient</button>

  <h2 class="section-title">Instructions</h2>
  <?php foreach ($instructions as $instruction): ?>
    <div class="instruction-item">
      <input type="hidden" name="instructions[<?= $instruction['InstructionID'] ?>][id]"
        value="<?= $instruction['InstructionID'] ?>" class="instruction-id">
      <label class="form-label">Step Number:</label>
      <input type="number" name="instructions[<?= $instruction['InstructionID'] ?>][stepNumber]"
        value="<?= htmlspecialchars($instruction['StepNumber']) ?>" required class="form-input"><br>
      <label class="form-label">Description:</label>
      <textarea name="instructions[<?= $instruction['InstructionID'] ?>][description]" required
        class="form-textarea"><?= htmlspecialchars($instruction['Description']) ?></textarea><br>
    </div>
  <?php endforeach; ?>
  <div id="instructions-container" class="instructions-container"></div>
  <button type="button" id="add-instruction" class="add-button">Add Instruction</button>
  <br />
  <button type="submit" class="submit-button">Update Recipe</button>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ingredientsContainer = document.getElementById('ingredients-container');
    const instructionsContainer = document.getElementById('instructions-container');

    document.getElementById('add-ingredient').addEventListener('click', function () {
      const index = ingredientsContainer.children.length;
      const newIngredientHtml = `
          <div class="ingredient-item">
              <input type="hidden" name="ingredients[${index}][id]" value="">
              <label class="form-label">Name:</label>
              <input type="text" name="ingredients[${index}][name]" required class="form-input"><br>
              <label class="form-label">Unit:</label>
              <input type="text" name="ingredients[${index}][unit]" class="form-input"><br>
              <label class="form-label">Quantity:</label>
              <input type="number" step="0.01" name="ingredients[${index}][quantity]" required class="form-input"><br>
              <button type="button" class="remove-ingredient">Remove</button>
          </div>
      `;
      ingredientsContainer.insertAdjacentHTML('beforeend', newIngredientHtml);
    });

    document.getElementById('add-instruction').addEventListener('click', function () {
      const index = instructionsContainer.children.length;
      const newInstructionHtml = `
          <div class="instruction-item">
              <input type="hidden" name="instructions[${index}][id]" value="">
              <label class="form-label">Step Number:</label>
              <input type="number" name="instructions[${index}][stepNumber]" required class="form-input"><br>
              <label class="form-label">Description:</label>
              <textarea name="instructions[${index}][description]" required class="form-textarea"></textarea><br>
              <button type="button" class="remove-instruction">Remove</button>
          </div>
      `;
      instructionsContainer.insertAdjacentHTML('beforeend', newInstructionHtml);
    });

    ingredientsContainer.addEventListener('click', function (e) {
      if (e.target.classList.contains('remove-ingredient')) {
        e.target.parentElement.remove();
      }
    });

    instructionsContainer.addEventListener('click', function (e) {
      if (e.target.classList.contains('remove-instruction')) {
        e.target.parentElement.remove();
      }
    });
  });
</script>