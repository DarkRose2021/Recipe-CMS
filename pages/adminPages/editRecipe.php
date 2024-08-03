<?php
require 'dbConnection.php';

$recipeId = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$recipeId) {
    die('No recipe ID provided.');
}

$recipe = getRecipeById($recipeId);
$ingredients = getFullRecipeIngredients($recipeId);
error_log(print_r($ingredients));
$instructions = getFullInstructionsByRecipeId($recipeId);

if (!$recipe) {
    die('Recipe not found.');
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

    <h1>Update Recipe</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['RecipeID']) ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($recipe['Title']) ?>" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($recipe['Description']) ?></textarea><br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?= htmlspecialchars($recipe['Category']) ?>" required><br>

        <label for="prepTime">Prep Time (minutes):</label>
        <input type="number" id="prepTime" name="prepTime" value="<?= htmlspecialchars($recipe['PrepTime']) ?>" required><br>

        <label for="cookTime">Cook Time (minutes):</label>
        <input type="number" id="cookTime" name="cookTime" value="<?= htmlspecialchars($recipe['CookTime']) ?>" required><br>

        <label for="totalTime">Total Time (minutes):</label>
        <input type="number" id="totalTime" name="totalTime" value="<?= htmlspecialchars($recipe['TotalTime']) ?>" required><br>

        <label for="servings">Servings:</label>
        <input type="number" id="servings" name="servings" value="<?= htmlspecialchars($recipe['Servings']) ?>" required><br>

        <h2>Ingredients</h2>
        <?php foreach ($ingredients as $ingredient): ?>
            <div>
                <input type="hidden" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][id]" value="<?= $ingredient['RecipeIngredientID'] ?>">
                <label>Name:</label>
                <input type="text" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][name]" value="<?= htmlspecialchars($ingredient['Name']) ?>" required><br>
                <label>Unit:</label>
                <input type="text" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][unit]" value="<?= htmlspecialchars($ingredient['Unit']) ?>"><br>
                <label>Quantity:</label>
                <input type="number" step="0.01" name="ingredients[<?= $ingredient['RecipeIngredientID'] ?>][quantity]" value="<?= htmlspecialchars($ingredient['Quantity']) ?>" required><br>
            </div>
        <?php endforeach; ?>
        <div id="ingredients-container"></div>

        <h2>Instructions</h2>
        <?php foreach ($instructions as $instruction): ?>
            <div>
                <input type="hidden" name="instructions[<?= $instruction['InstructionID'] ?>][id]" value="<?= $instruction['InstructionID'] ?>">
                <label>Step Number:</label>
                <input type="number" name="instructions[<?= $instruction['InstructionID'] ?>][stepNumber]" value="<?= htmlspecialchars($instruction['StepNumber']) ?>" required><br>
                <label>Description:</label>
                <textarea name="instructions[<?= $instruction['InstructionID'] ?>][description]" required><?= htmlspecialchars($instruction['Description']) ?></textarea><br>
            </div>
        <?php endforeach; ?>
        <div id="instructions-container"></div>

        <button type="submit">Update Recipe</button>
    </form>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const ingredientsContainer = document.getElementById('ingredients-container');
    const instructionsContainer = document.getElementById('instructions-container');

    document.getElementById('add-ingredient').addEventListener('click', function() {
        const index = ingredientsContainer.children.length;
        const newIngredientHtml = `
            <div>
                <input type="hidden" name="ingredients[${index}][id]" value="">
                <label>Name:</label>
                <input type="text" name="ingredients[${index}][name]" required><br>
                <label>Unit:</label>
                <input type="text" name="ingredients[${index}][unit]"><br>
                <label>Quantity:</label>
                <input type="number" step="0.01" name="ingredients[${index}][quantity]" required><br>
                <button type="button" class="remove-ingredient">Remove</button>
            </div>
        `;
        ingredientsContainer.insertAdjacentHTML('beforeend', newIngredientHtml);
    });

    // Add new instruction field
    document.getElementById('add-instruction').addEventListener('click', function() {
        const index = instructionsContainer.children.length;
        const newInstructionHtml = `
            <div>
                <input type="hidden" name="instructions[${index}][id]" value="">
                <label>Step Number:</label>
                <input type="number" name="instructions[${index}][stepNumber]" required><br>
                <label>Description:</label>
                <textarea name="instructions[${index}][description]" required></textarea><br>
                <button type="button" class="remove-instruction">Remove</button>
            </div>
        `;
        instructionsContainer.insertAdjacentHTML('beforeend', newInstructionHtml);
    });

    ingredientsContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-ingredient')) {
            e.target.parentElement.remove();
        }
    });

    instructionsContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-instruction')) {
            e.target.parentElement.remove();
        }
    });
});
</script>

