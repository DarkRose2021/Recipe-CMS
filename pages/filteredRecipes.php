<?php
session_start();
require_once 'dbConnection.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : null;

if (!$filter) {
  die("<h2 class='error'>No filter provided.</h2>");
}

$recipes = getRecipesByCategory($filter);
?>

<?php if (count($recipes) > 0): ?>
  <div class="allRecipes">
    <?php foreach ($recipes as $recipe): ?>
      <?php
      $ingredients = getRecipeIngredients($recipe['RecipeID']);
      $instructions = getInstructionsByRecipeId($recipe['RecipeID']);
      ?>
      <div class="recipeCard">
        <h2 class="recipeTitle"><?php echo htmlspecialchars($recipe['Title']); ?></h2>
        <p class="recipeCategory"><?php echo htmlspecialchars($recipe['Category']); ?></p>

        <p class="recipeDescription"><?php echo htmlspecialchars($recipe['Description']); ?></p>
        <p class="recipeTime">Preparation Time: <?php echo htmlspecialchars($recipe['PrepTime']); ?> minutes</p>
        <p class="recipeTime">Cooking Time: <?php echo htmlspecialchars($recipe['CookTime']); ?> minutes</p>
        <p class="recipeTime">Total Time: <?php echo htmlspecialchars($recipe['TotalTime']); ?> minutes</p>
        <p class="recipeServings">Servings: <?php echo htmlspecialchars($recipe['Servings']); ?></p>

        <h3 class="ingredientsTitle">Ingredients</h3>
        <ul class="ingredientsList">
          <?php foreach ($ingredients as $ingredient): ?>
            <li class="ingredientItem">
              <?php echo htmlspecialchars($ingredient['Name']) . ': ' . htmlspecialchars($ingredient['Quantity']) . ' ' . htmlspecialchars($ingredient['Unit']); ?>
            </li>
          <?php endforeach; ?>
        </ul>

        <h3 class="directionsTitle">Directions</h3>
        <ol class="directionsList">
          <?php foreach ($instructions as $instruction): ?>
            <li class="directionItem"><?php echo htmlspecialchars($instruction['Description']); ?></li>
          <?php endforeach; ?>
        </ol>
        <?php if ($_SESSION['admin_logged_in']): ?>
          <div class="adminButtons">
          <a href="index.php?page=adminPages/editRecipe&id=<?php echo htmlspecialchars($recipe['RecipeID']); ?>"><button class="actionButton">Edit Recipe</button></a>
          <a href="index.php?page=adminPages/deleteRecipe&id=<?php echo htmlspecialchars($recipe['RecipeID']); ?>"><button class="actionButton">Delete Recipe</button></a>
          </div>
        <?php elseif ($userId == $recipe['AuthorID']): ?>
          <a href="index.php?page=editRecipe&id=<?php echo htmlspecialchars($recipe['RecipeID']); ?>"><button class="actionButton">Edit Recipe</button></a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p class="error">No recipes found.</p>
<?php endif; ?>
