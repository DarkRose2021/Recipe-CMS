<?php

$env = parse_ini_file(".env");

define("DB_USER", $env["DB_USER"]);
define("DB_PSWD", $env["DB_PSWD"]);
define("DB_SERVER", $env["DB_SERVER"]);
define("DB_NAME", $env["DB_NAME"]);

function getConnection()
{
  $dbConnection = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME) or die("Could not connect to MySQL server.");
  return $dbConnection;
}

function getAllUsers(): array
{
  $query = 'SELECT * FROM Users';
  $response = getConnection()->query($query);

  return $response->fetch_all(MYSQLI_ASSOC);
}

function createUser($email, $passwordHash): mysqli_result|bool
{
  $query = "INSERT INTO Users (Email, Password) VALUES (?, ?)";
  return getConnection()->execute_query($query, [$email, $passwordHash]);
}

function getUserByEmail($email): false|array|null
{
  $query = "SELECT * from `users` where email = ?";
  $response = getConnection()->execute_query($query, [$email]);
  return $response->fetch_assoc();
}

function getUserById($id): false|array|null
{
  $query = "SELECT * from `Users` where UserId = ?";
  $response = getConnection()->execute_query($query, [$id]);

  return $response->fetch_assoc();
}

function updateUser($id, $isAdmin): mysqli_result|bool
{
  $query = "UPDATE USERS SET isAdmin = ? WHERE userId = ?";
  return getConnection()->execute_query($query, [$isAdmin, $id]);
}

function deleteUser($id): mysqli_result|bool
{
  $connection = getConnection();
  $query = "UPDATE `Recipe` set authorId = NULL where authorId = ?";
  $response = $connection->execute_query($query, [$id]);
  $query = "DELETE from `Users` where UserId = ?";
  return $connection->execute_query($query, [$id]);
}

function getAllRecipes(): array
{
  $query = 'SELECT * FROM Recipe';
  $response = getConnection()->query($query);

  return $response->fetch_all(MYSQLI_ASSOC);
}

function getRecipesByCategory($category): array{
  $query = 'SELECT * FROM recipe WHERE category = ?';
  $response = getConnection()->execute_query($query, [$category]);
  return $response->fetch_all(MYSQLI_ASSOC);
}

function get3RandomRecipes(): array{
  $query = 'SELECT * FROM recipe ORDER BY RAND() LIMIT 3';
  $response = getConnection()->query($query);

  return $response->fetch_all(MYSQLI_ASSOC);
}

function createRecipe($title, $description, $category, $prepTime, $cookTime, $totalTime, $servings, $authorId): false|array|null
{
  $connection = getConnection();
  $query = "INSERT INTO `Recipe` (Title, Description, category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $inserted = $connection->execute_query($query, [$title, $description, $category, $prepTime, $cookTime, $totalTime, $servings, $authorId]);
  if ($inserted) {
    $query = "SELECT LAST_INSERT_ID()";
    $response = $connection->execute_query($query);
    return $response->fetch_assoc();
  } else {
    return false;
  }

}

function getRecipeById($id): false|array|null
{
  $query = "SELECT * FROM `Recipe` WHERE RecipeID = ?";
  $response = getConnection()->execute_query($query, [$id]);

  return $response->fetch_assoc();
}

function updateRecipe($id, $title, $description, $category, $prepTime, $cookTime, $totalTime, $servings): mysqli_result|bool
{
  $query = "UPDATE `Recipe` SET Title = ?, Description = ?, category = ?, PrepTime = ?, CookTime = ?, TotalTime = ?, Servings = ? WHERE RecipeID = ?";
  return getConnection()->execute_query($query, [$title, $description, $category, $prepTime, $cookTime, $totalTime, $servings, $id]);
}

function deleteRecipe($id): mysqli_result|bool
{
  $query = "DELETE FROM `Recipe` WHERE RecipeID = ?";
  return getConnection()->execute_query($query, [$id]);
}

function getRecipeIngredients($recipeId): array
{
  $query = "SELECT Name, Quantity, Unit FROM RecipeIngredients WHERE RecipeID = ?";
  $params = [$recipeId];
  $response = getConnection()->execute_query($query, $params);

  return $response->fetch_all(MYSQLI_ASSOC);
}

function getFullRecipeIngredients($recipeId): array
{
  $query = "SELECT * FROM RecipeIngredients WHERE RecipeID = ?";
  $params = [$recipeId];
  $response = getConnection()->execute_query($query, $params);

  return $response->fetch_all(MYSQLI_ASSOC);
}

function getFullInstructionsByRecipeId($recipeId): array
{
  $query = "SELECT * FROM Instructions WHERE RecipeID = ?";
  $params = [$recipeId];
  $response = getConnection()->execute_query($query, $params);
  return $response->fetch_all(MYSQLI_ASSOC);
}

function getInstructionsByRecipeId($recipeId): array
{
  $query = "SELECT StepNumber, Description FROM Instructions WHERE RecipeID = ?";
  $params = [$recipeId];
  $response = getConnection()->execute_query($query, $params);
  return $response->fetch_all(MYSQLI_ASSOC);
}

function addRecipeIngredient($recipeId, $name, $unit, $quantity): mysqli_result|bool
{
  $query = "INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES (?, ?, ?, ?)";
  return getConnection()->execute_query($query, [$recipeId, $name, $unit, $quantity]);
}

function removeRecipeIngredient($id): mysqli_result|bool
{
  $query = "DELETE FROM RecipeIngredients WHERE RecipeID = ?";
  return getConnection()->execute_query($query, [$id]);
}

function addInstruction($recipeId, $stepNumber, $description): mysqli_result|bool
{
  $query = "INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES (?, ?, ?)";
  return getConnection()->execute_query($query, [$recipeId, $stepNumber, $description]);
}

function updateInstruction($instructionId, $stepNumber, $description): mysqli_result|bool
{
  $query = "UPDATE `Instructions` SET stepNumber = ?, description = ? WHERE instructionId = ?";
  return getConnection()->execute_query($query, [$stepNumber, $description, $instructionId]);
}

function deleteInstruction($id): mysqli_result|bool
{
  $query = "DELETE FROM Instructions WHERE RecipeID = ?";
  return getConnection()->execute_query($query, [$id]);
}

function updateRecipeIngredient($id, $name, $unit, $quantity): mysqli_result|bool
{
  $query = "UPDATE `RecipeIngredients` SET name = ?, unit = ?, quantity = ? WHERE `RecipeIngredientID` = ?";
  return getConnection()->execute_query($query, [$name, $unit, $quantity, $id]);
}