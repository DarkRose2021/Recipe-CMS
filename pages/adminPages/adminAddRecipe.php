<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: adminLogin.php");
    exit();
}
?>

<?php
include 'dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $prepTime = $_POST['prep_time'];
    $cookTime = $_POST['cook_time'];
    $totalTime = $_POST['total_time'];
    $servings = $_POST['servings'];
    $authorId = $_SESSION['user_id'];

    $result = createRecipe($title, $description, $prepTime, $cookTime, $totalTime, $servings, $authorId);

    if ($result) {
        echo "Recipe added successfully!";
    } else {
        echo "Error adding recipe.";
    }
}
?>

    <h1>Add a New Recipe</h1>
    <form action="index.php?page=adminPages/adminAddRecipe" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="prep_time">Prep Time (minutes):</label>
        <input type="number" id="prep_time" name="prep_time" required><br><br>

        <label for="cook_time">Cook Time (minutes):</label>
        <input type="number" id="cook_time" name="cook_time" required><br><br>

        <label for="total_time">Total Time (minutes):</label>
        <input type="number" id="total_time" name="total_time" required><br><br>

        <label for="servings">Servings:</label>
        <input type="number" id="servings" name="servings" required><br><br>

        <input type="submit" value="Add Recipe">
    </form>
