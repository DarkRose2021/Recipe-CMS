<?php
require_once 'dbConnection.php';
$recipes = getAllRecipes();

function getIngredients($recipeId)
{
    return getIngredientsByRecipeId($recipeId);
}

function getInstructions($recipeId)
{
    return getInstructionsByRecipeId($recipeId);
} ?>

<h1>All Recipes</h1>

<?php if (count($recipes) > 0): ?>
        <?php foreach ($recipes as $recipe): ?>
            <?php
            $ingredients = getIngredients($recipe['RecipeID']);
            $instructions = getInstructions($recipe['RecipeID']);
            ?>
                <h2><?php echo htmlspecialchars($recipe['Title']); ?></h2>
                <p><?php echo htmlspecialchars($recipe['Description']); ?></p>
                <p>Preparation Time: <?php echo htmlspecialchars($recipe['PrepTime']); ?> minutes</p>
                <p>Cooking Time: <?php echo htmlspecialchars($recipe['CookTime']); ?> minutes</p>
                <p>Total Time: <?php echo htmlspecialchars($recipe['TotalTime']); ?> minutes</p>
                <p>Servings: <?php echo htmlspecialchars($recipe['Servings']); ?></p>

                <h3>Categories</h3>
                <ul>

                </ul>

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
        <?php endforeach; ?>
<?php else: ?>
    <p>No recipes found.</p>
<?php endif; ?>