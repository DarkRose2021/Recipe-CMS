<?php
session_start();
require_once 'dbConnection.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit;
}

function execute_query($query, $params = []) {
    $conn = getConnection();
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    if ($params) {
        $types = str_repeat('s', count($params)); // Assume all params are strings
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    return $stmt;
}

function createRecipe($title, $description, $category, $prepTime, $cookTime, $totalTime, $servings, $authorId) {
    $query = "INSERT INTO Recipe (Title, Description, Category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = execute_query($query, [$title, $description, $category, $prepTime, $cookTime, $totalTime, $servings, $authorId]);
    return $stmt->insert_id;
}

function createIngredient($name, $unit) {
    $query = "INSERT INTO Ingredient (Name, Unit) VALUES (?, ?)";
    $stmt = execute_query($query, [$name, $unit]);
    return $stmt->insert_id;
}

function addRecipeIngredient($recipeId, $ingredientId, $quantity) {
    $query = "INSERT INTO RecipeIngredient (RecipeID, IngredientID, Quantity) VALUES (?, ?, ?)";
    $stmt = execute_query($query, [$recipeId, $ingredientId, $quantity]);
    return $stmt->affected_rows > 0;
}

function addInstruction($recipeId, $stepNumber, $description) {
    $query = "INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES (?, ?, ?)";
    $stmt = execute_query($query, [$recipeId, $stepNumber, $description]);
    return $stmt->affected_rows > 0;
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

    // Create the recipe
    $recipeId = createRecipe($title, $description, $category, $prepTime, $cookTime, $totalTime, $servings, $authorId);

    if ($recipeId) {
        // Add ingredients
        foreach ($_POST['ingredient_name'] as $index => $ingredientName) {
            $quantity = $_POST['ingredient_quantity'][$index];
            $unit = $_POST['ingredient_unit'][$index];

            $ingredientId = createIngredient($ingredientName, $unit);
            if ($ingredientId === false) {
                echo "Failed to create ingredient: $ingredientName";
                continue;
            }

            $result = addRecipeIngredient($recipeId, $ingredientId, $quantity);
            if (!$result) {
                echo "Failed to add ingredient to recipe: $ingredientName";
            }
        }

        // Add instructions
        foreach ($_POST['instruction_step'] as $index => $stepNumber) {
            $instructionDescription = $_POST['instruction_description'][$index];
            $result = addInstruction($recipeId, $stepNumber, $instructionDescription);
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
<form action="index.php?page=adminPages/adminAddRecipe" method="POST">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category" required><br><br>

    <label for="prep_time">Prep Time (minutes):</label>
    <input type="number" id="prep_time" name="prep_time" required><br><br>

    <label for="cook_time">Cook Time (minutes):</label>
    <input type="number" id="cook_time" name="cook_time" required><br><br>

    <label for="total_time">Total Time (minutes):</label>
    <input type="number" id="total_time" name="total_time" required><br><br>

    <label for="servings">Servings:</label>
    <input type="number" id="servings" name="servings" required><br><br>

    <h3>Ingredients</h3>
    <div id="ingredients">
        <div class="ingredient">
            <label for="ingredient_name[]">Name:</label>
            <input type="text" name="ingredient_name[]" required>
            <label for="ingredient_quantity[]">Quantity:</label>
            <input type="number" step="0.01" name="ingredient_quantity[]" required>
            <label for="ingredient_unit[]">Unit:</label>
            <input type="text" name="ingredient_unit[]" required><br><br>
        </div>
    </div>
    <button type="button" onclick="addIngredient()">Add Another Ingredient</button><br><br>

    <h3>Directions</h3>
    <div id="instructions">
        <div class="instruction">
            <label for="instruction_step[]">Step:</label>
            <input type="number" name="instruction_step[]" required>
            <label for="instruction_description[]">Description:</label>
            <textarea name="instruction_description[]" required></textarea><br><br>
        </div>
    </div>
    <button type="button" onclick="addInstruction()">Add Another Step</button><br><br>

    <input type="submit" value="Add Recipe">
</form>

<script>
    function addIngredient() {
        const ingredientsDiv = document.getElementById('ingredients');
        const newIngredientDiv = document.createElement('div');
        newIngredientDiv.className = 'ingredient';
        newIngredientDiv.innerHTML = `
            <label for="ingredient_name[]">Name:</label>
            <input type="text" name="ingredient_name[]" required>
            <label for="ingredient_quantity[]">Quantity:</label>
            <input type="number" step="0.01" name="ingredient_quantity[]" required>
            <label for="ingredient_unit[]">Unit:</label>
            <input type="text" name="ingredient_unit[]" required><br><br>
        `;
        ingredientsDiv.appendChild(newIngredientDiv);
    }

    function addInstruction() {
        const instructionsDiv = document.getElementById('instructions');
        const newInstructionDiv = document.createElement('div');
        newInstructionDiv.className = 'instruction';
        newInstructionDiv.innerHTML = `
            <label for="instruction_step[]">Step:</label>
            <input type="number" name="instruction_step[]" required>
            <label for="instruction_description[]">Description:</label>
            <textarea name="instruction_description[]" required></textarea><br><br>
        `;
        instructionsDiv.appendChild(newInstructionDiv);
    }
</script>
