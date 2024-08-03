<?php
require_once 'dbConnection.php';

$recipes = getAllRecipes();
?>

<h1>All Recipes</h1>

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

        <a href="index.php?page=adminPages/editRecipe&id=<?php echo htmlspecialchars($recipe['RecipeID']); ?>"><button>Edit Recipe</button></a>
        
        <a href="deleteRecipe.php?id=<?php echo htmlspecialchars($recipe['RecipeID']); ?>"><button>Delete Recipe</button></a>
        </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No recipes found.</p>
<?php endif; ?>
