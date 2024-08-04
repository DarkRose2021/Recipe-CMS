<?php
session_start();
require_once 'dbConnection.php';

$recipes = get3RandomRecipes();
?>

<h1>Welcome to Our Recipe Website!</h1>

<div class="home">
  <div>
    <h3>Introduction to Our Website</h3>

    <p>We are passionate about food and the joy it brings to our lives. Our website is dedicated to providing you with a
      vast collection of recipes, cooking tips, and culinary inspiration. Whether you're a seasoned chef or just
      starting
      your cooking journey, you'll find something here to ignite your passion for cooking. Our easy-to-follow recipes
      cover everything from quick weekday dinners to elaborate weekend feasts, ensuring there's something for everyone.
      Join our community of food lovers and start exploring today!</p>

    <p>Thank you for visiting our website. We hope you enjoy your time here and find plenty of delicious dishes to try
      and
      share with your loved ones.</p>
  </div>
  <div>
    <h3>Featured Recipes</h3>
    <p>Discover the best of the best with our hand-picked featured recipes. These dishes are popular among our community
      and are sure to impress at your next meal. From mouth-watering mains to delectable desserts, our featured recipes
      highlight a variety of flavors and cooking styles. Explore these favorites and find new inspiration for your
      kitchen
      adventures.</p>
  </div>
</div>
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
