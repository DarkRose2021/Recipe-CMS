<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
  header("Location: index.php?page=home");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $prepTime = $_POST['prep_time'];
  $cookTime = $_POST['cook_time'];
  $totalTime = $_POST['total_time'];
  $servings = $_POST['servings'];
  $authorId = $_SESSION['user_id'];

  $recipeId = createRecipe($title, $description, $category, $prepTime, $cookTime, $totalTime, $servings, $authorId);

  if ($recipeId) {
    foreach ($_POST['ingredient_name'] as $index => $ingredientName) {
      $quantity = $_POST['ingredient_quantity'][$index];
      $unit = $_POST['ingredient_unit'][$index];

      $result = addRecipeIngredient($recipeId['LAST_INSERT_ID()'], $ingredientName, $unit, $quantity);
      if (!$result) {
        echo "Failed to add ingredient: $ingredientName";
      }
    }

    foreach ($_POST['instruction_step'] as $index => $stepNumber) {
      $instructionDescription = $_POST['instruction_description'][$index];
      $result = addInstruction($recipeId['LAST_INSERT_ID()'], $stepNumber, $instructionDescription);
      if (!$result) {
        echo "Failed to add instruction step $stepNumber";
      }
    }

    echo "Recipe added successfully!";
  } else {
    echo "Failed to create recipe.";
  }
}
?>

<h1>Add a New Recipe</h1>
<form action="index.php?page=adminPages/adminAddRecipe" method="POST" class="recipe-form">
  <input type="hidden" name="id" value="">

  <label for="title" class="form-label">Title:</label>
  <input type="text" id="title" name="title" required class="form-input"><br>

  <label for="description" class="form-label">Description:</label>
  <textarea id="description" name="description" required class="form-textarea"></textarea><br>

  <label for="category" class="form-label">Category:</label>
  <input type="text" id="category" name="category" required class="form-input"><br>

  <label for="prep_time" class="form-label">Prep Time (minutes):</label>
  <input type="number" id="prep_time" name="prep_time" required class="form-input"><br>

  <label for="cook_time" class="form-label">Cook Time (minutes):</label>
  <input type="number" id="cook_time" name="cook_time" required class="form-input"><br>

  <label for="total_time" class="form-label">Total Time (minutes):</label>
  <input type="number" id="total_time" name="total_time" required class="form-input"><br>

  <label for="servings" class="form-label">Servings:</label>
  <input type="number" id="servings" name="servings" required class="form-input"><br>

  <h2>Ingredients</h2>
  <div id="ingredients" class="form-group">
    <div class="ingredient-item">
      <label for="ingredient_name[]" class="form-label">Name:</label>
      <input type="text" name="ingredient_name[]" required class="form-input"><br>
      <label for="ingredient_quantity[]" class="form-label">Quantity:</label>
      <input type="number" step="0.01" name="ingredient_quantity[]" required class="form-input"><br>
      <label for="ingredient_unit[]" class="form-label">Unit:</label>
      <input type="text" name="ingredient_unit[]" required class="form-input"><br>
    </div>
  </div>
  <button type="button" id="add-ingredient" class="add-button">Add Another Ingredient</button><br>

  <h2>Instructions</h2>
  <div id="instructions" class="form-group">
    <div class="instruction-item">
      <label for="instruction_step[]" class="form-label">Step:</label>
      <input type="number" name="instruction_step[]" required class="form-input"><br>
      <label for="instruction_description[]" class="form-label">Description:</label>
      <textarea name="instruction_description[]" required class="form-textarea"></textarea><br>
    </div>
  </div>
  <button type="button" id="add-instruction" class="add-button">Add Another Step</button><br>

  <input type="submit" value="Add Recipe" class="submit-button">
</form>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ingredientsContainer = document.getElementById('ingredients');
    const instructionsContainer = document.getElementById('instructions');

    document.getElementById('add-ingredient').addEventListener('click', function () {
      const index = ingredientsContainer.children.length;
      const newIngredientHtml = `
          <div class="ingredient-item">
              <label class="form-label">Name:</label>
              <input type="text" name="ingredient_name[]" required class="form-input"><br>
              <label class="form-label">Quantity:</label>
              <input type="number" step="0.01" name="ingredient_quantity[]" required class="form-input"><br>
              <label class="form-label">Unit:</label>
              <input type="text" name="ingredient_unit[]" required class="form-input"><br>
              <button type="button" class="remove-ingredient">Remove</button>
          </div>
      `;
      ingredientsContainer.insertAdjacentHTML('beforeend', newIngredientHtml);
    });

    document.getElementById('add-instruction').addEventListener('click', function () {
      const index = instructionsContainer.children.length;
      const newInstructionHtml = `
          <div class="instruction-item">
              <label class="form-label">Step:</label>
              <input type="number" name="instruction_step[]" required class="form-input"><br>
              <label class="form-label">Description:</label>
              <textarea name="instruction_description[]" required class="form-textarea"></textarea><br>
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