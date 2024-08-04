<?php
session_start();
require_once 'dbConnection.php';

$recipes = get3RandomRecipes();
?>

<h1>Welcome to Our Recipe Website!</h1>

<div>
  <h3>Introduction to Our Website</h3>

  <p>We are passionate about food and the joy it brings to our lives. Our website is dedicated to providing you with a
    vast collection of recipes, cooking tips, and culinary inspiration. Whether you're a seasoned chef or just starting
    your cooking journey, you'll find something here to ignite your passion for cooking. Our easy-to-follow recipes
    cover everything from quick weekday dinners to elaborate weekend feasts, ensuring there's something for everyone.
    Join our community of food lovers and start exploring today!</p>

  <p>Thank you for visiting our website. We hope you enjoy your time here and find plenty of delicious dishes to try and
    share with your loved ones.</p>
</div>

<div>
  <h3>Featured Recipes</h3>
  <p>Discover the best of the best with our hand-picked featured recipes. These dishes are popular among our community
    and are sure to impress at your next meal. From mouth-watering mains to delectable desserts, our featured recipes
    highlight a variety of flavors and cooking styles. Explore these favorites and find new inspiration for your kitchen
    adventures.</p>
  <?php if (count($recipes) > 0): ?>
  <div class="allRecipes">
    <?php foreach ($recipes as $recipe): ?>
        <?php
        $ingredients = getRecipeIngredients($recipe['RecipeID']);
        $instructions = getInstructionsByRecipeId($recipe['RecipeID']);
        ?>
        <div class="recipeCard">
        <h2><?php echo htmlspecialchars($recipe['Title']); ?></h2>
        <p><?php echo htmlspecialchars($recipe['Description']); ?></p>
        <p>Preparation Time: <?php echo htmlspecialchars($recipe['PrepTime']); ?> minutes</p>
        <p>Cooking Time: <?php echo htmlspecialchars($recipe['CookTime']); ?> minutes</p>
        <p>Total Time: <?php echo htmlspecialchars($recipe['TotalTime']); ?> minutes</p>
        <p>Servings: <?php echo htmlspecialchars($recipe['Servings']); ?></p>

        <h3>Category</h3>
        <p><?php echo htmlspecialchars($recipe['Category']); ?></p>

        <h3>Ingredients</h3>
        <ul>
            <?php foreach ($ingredients as $ingredient): ?>
                <li><?php echo htmlspecialchars($ingredient['Name']) . ': ' . htmlspecialchars($ingredient['Quantity']) . ' ' . htmlspecialchars($ingredient['Unit']); ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Directions</h3>
        <ol>
            <?php foreach ($instructions as $instruction): ?>
                <li><?php echo htmlspecialchars($instruction['Description']); ?></li>
            <?php endforeach; ?>
        </ol>
        <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
        <a href="index.php?page=adminPages/editRecipe&id=<?php echo htmlspecialchars($recipe['RecipeID']); ?>"><button>Edit Recipe</button></a>
        
        <a href="index.php?page=adminPages/deleteRecipe&id=<?php echo htmlspecialchars($recipe['RecipeID']); ?>" ?><button>Delete Recipe</button></a>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No recipes found.</p>
<?php endif; ?>

</div>