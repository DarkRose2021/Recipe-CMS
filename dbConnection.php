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
//Works
function getAllUsers(): array
{
    $query = 'SELECT * FROM Users';
    $response = getConnection()->execute_query($query);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function createUser($username, $passwordHash): mysqli_result|bool
{
    $query = "INSERT into Users (UserName, PasswordHash) values (?, ?)";
    return getConnection()->execute_query($query, [$username, $passwordHash]);
}

function getUserByUsername($username): false|array|null
{
    $query = "SELECT * from Users where UserName = ?";
    $response = getConnection()->execute_query($query, [$username]);

    return $response->fetch_assoc();
}

function getUserByEmail($email): false|array|null {
  $query = "SELECT * FROM Users WHERE Email = ?";
  $response = getConnection()->execute_query($query, [$email]);

  return $response->fetch_assoc();
}

function getUserById($id): false|array|null
{
    $query = "SELECT * from Users where UserId = ?";
    $response = getConnection()->execute_query($query, [$id]);

    return $response->fetch_assoc();
}

function updateUserUserName($id, $username): mysqli_result|bool
{
    $query = "UPDATE Users set UserName = ? where UserId = ?";
    return getConnection()->execute_query($query, [$username, $id]);
}

function updateUserPassword($id, $passwordHash): mysqli_result|bool
{
    $query = "UPDATE Users set PasswordHash = ? where UserId = ?";
    return getConnection()->execute_query($query, [$passwordHash, $id]);
}

function deleteUser($id): mysqli_result|bool
{
    $query = "DELETE from Users where UserId = ?";
    return getConnection()->execute_query($query, [$id]);
}

function getAllRoles(): array
{
    $query = 'SELECT * FROM `Roles`';
    $response = getConnection()->execute_query($query);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function createRole($role, $description): mysqli_result|bool
{
    $query = "INSERT into `Roles` (Role, RoleDescription) values (?, ?)";
    return getConnection()->execute_query($query, [$role, $description]);
}

function getRoleById($id): false|array|null
{
    $query = "SELECT * from `Roles` where RoleId = ?";
    $response = getConnection()->execute_query($query, [$id]);

    return $response->fetch_assoc();
}

function updateRole($id, $role, $description): mysqli_result|bool
{
    $query = "UPDATE `Roles` set Role = ?, RoleDescription = ? where RoleId = ?";
    return getConnection()->execute_query($query, [$role, $description, $id]);
}

function deleteRole($id): mysqli_result|bool
{
    $query = "DELETE from `Roles` where RoleId = ?";
    return getConnection()->execute_query($query, [$id]);
}

function getUserRoles($userId): array
{
    $query = "SELECT * FROM `UserRoles` WHERE UserId = ?";
    $response = getConnection()->execute_query($query, [$userId]);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function addUserRole($userId, $roleId): mysqli_result|bool
{
    $query = "INSERT INTO `UserRoles` (UserId, RoleId) VALUES (?, ?)";
    return getConnection()->execute_query($query, [$userId, $roleId]);
}

function removeUserRole($userId, $roleId): mysqli_result|bool
{
    $query = "DELETE FROM `UserRoles` WHERE UserId = ? AND RoleId = ?";
    return getConnection()->execute_query($query, [$userId, $roleId]);
}
//Works
function getAllRecipes(): array
{
    $query = 'SELECT * FROM `Recipe`';
    $response = getConnection()->execute_query($query);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function createRecipe($title, $description, $prepTime, $cookTime, $totalTime, $servings, $authorId): mysqli_result|bool
{
    $query = "INSERT INTO `Recipe` (Title, Description, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES (?, ?, ?, ?, ?, ?, ?)";
    return getConnection()->execute_query($query, [$title, $description, $prepTime, $cookTime, $totalTime, $servings, $authorId]);
}

function getRecipeById($id): false|array|null
{
    $query = "SELECT * FROM `Recipe` WHERE RecipeID = ?";
    $response = getConnection()->execute_query($query, [$id]);

    return $response->fetch_assoc();
}

function updateRecipe($id, $title, $description, $prepTime, $cookTime, $totalTime, $servings): mysqli_result|bool
{
    $query = "UPDATE `Recipe` SET Title = ?, Description = ?, PrepTime = ?, CookTime = ?, TotalTime = ?, Servings = ? WHERE RecipeID = ?";
    return getConnection()->execute_query($query, [$title, $description, $prepTime, $cookTime, $totalTime, $servings, $id]);
}

function deleteRecipe($id): mysqli_result|bool
{
    $query = "DELETE FROM `Recipe` WHERE RecipeID = ?";
    return getConnection()->execute_query($query, [$id]);
}

function getAllIngredients(): array
{
    $query = 'SELECT * FROM `Ingredient`';
    $response = getConnection()->execute_query($query);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function createIngredient($name, $unit): mysqli_result|bool
{
    $query = "INSERT INTO `Ingredient` (Name, Unit) VALUES (?, ?)";
    return getConnection()->execute_query($query, [$name, $unit]);
}

function getIngredientById($id): false|array|null
{
    $query = "SELECT * FROM `Ingredient` WHERE IngredientID = ?";
    $response = getConnection()->execute_query($query, [$id]);

    return $response->fetch_assoc();
}

function updateIngredient($id, $name, $unit): mysqli_result|bool
{
    $query = "UPDATE `Ingredient` SET Name = ?, Unit = ? WHERE IngredientID = ?";
    return getConnection()->execute_query($query, [$name, $unit, $id]);
}

function deleteIngredient($id): mysqli_result|bool
{
    $query = "DELETE FROM `Ingredient` WHERE IngredientID = ?";
    return getConnection()->execute_query($query, [$id]);
}

function getRecipeIngredients($recipeId): array
{
    $query = "SELECT * FROM `RecipeIngredient` WHERE RecipeID = ?";
    $response = getConnection()->execute_query($query, [$recipeId]);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function addRecipeIngredient($recipeId, $ingredientId, $quantity): mysqli_result|bool
{
    $query = "INSERT INTO `RecipeIngredient` (RecipeID, IngredientID, Quantity) VALUES (?, ?, ?)";
    return getConnection()->execute_query($query, [$recipeId, $ingredientId, $quantity]);
}

function removeRecipeIngredient($recipeId, $ingredientId): mysqli_result|bool
{
    $query = "DELETE FROM `RecipeIngredient` WHERE RecipeID = ? AND IngredientID = ?";
    return getConnection()->execute_query($query, [$recipeId, $ingredientId]);
}

function getAllCategories(): array
{
    $query = 'SELECT * FROM `Category`';
    $response = getConnection()->execute_query($query);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function createCategory($name): mysqli_result|bool
{
    $query = "INSERT INTO `Category` (Name) VALUES (?)";
    return getConnection()->execute_query($query, [$name]);
}

function getCategoryById($id): false|array|null
{
    $query = "SELECT * FROM `Category` WHERE CategoryID = ?";
    $response = getConnection()->execute_query($query, [$id]);

    return $response->fetch_assoc();
}

function updateCategory($id, $name): mysqli_result|bool
{
    $query = "UPDATE `Category` SET Name = ? WHERE CategoryID = ?";
    return getConnection()->execute_query($query, [$name, $id]);
}

function deleteCategory($id): mysqli_result|bool
{
    $query = "DELETE FROM `Category` WHERE CategoryID = ?";
    return getConnection()->execute_query($query, [$id]);
}

function getRecipeCategories($recipeId): array
{
    $query = "SELECT * FROM `RecipeCategory` WHERE RecipeID = ?";
    $response = getConnection()->execute_query($query, [$recipeId]);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function addRecipeCategory($recipeId, $categoryId): mysqli_result|bool
{
    $query = "INSERT INTO `RecipeCategory` (RecipeID, CategoryID) VALUES (?, ?)";
    return getConnection()->execute_query($query, [$recipeId, $categoryId]);
}

function removeRecipeCategory($recipeId, $categoryId): mysqli_result|bool
{
    $query = "DELETE FROM `RecipeCategory` WHERE RecipeID = ? AND CategoryID = ?";
    return getConnection()->execute_query($query, [$recipeId, $categoryId]);
}
//Works
function getInstructionsByRecipeId($recipeId): array
{
    $query = "SELECT * FROM `Instructions` WHERE RecipeID = ?";
    $response = getConnection()->execute_query($query, [$recipeId]);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function addInstruction($recipeId, $stepNumber, $description): mysqli_result|bool
{
    $query = "INSERT INTO `Instructions` (RecipeID, StepNumber, Description) VALUES (?, ?, ?)";
    return getConnection()->execute_query($query, [$recipeId, $stepNumber, $description]);
}

function updateInstruction($instructionId, $stepNumber, $description): mysqli_result|bool
{
    $query = "UPDATE `Instructions` SET StepNumber = ?, Description = ? WHERE InstructionID = ?";
    return getConnection()->execute_query($query, [$stepNumber, $description, $instructionId]);
}

function deleteInstruction($instructionId): mysqli_result|bool
{
    $query = "DELETE FROM `Instructions` WHERE InstructionID = ?";
    return getConnection()->execute_query($query, [$instructionId]);
}
//Works
function getCategoriesByRecipeId($recipeId): array
{
    $query = "SELECT c.Name FROM `Category` c 
              INNER JOIN `RecipeCategory` rc ON c.CategoryID = rc.CategoryID 
              WHERE rc.RecipeID = ?";
    $response = getConnection()->execute_query($query, [$recipeId]);
    return $response->fetch_all(MYSQLI_ASSOC);
}

//Works
function getIngredientsByRecipeId($recipeId): array
{
    $query = "SELECT i.Name, ri.Quantity, i.Unit FROM `Ingredient` i 
              INNER JOIN `RecipeIngredient` ri ON i.IngredientID = ri.IngredientID 
              WHERE ri.RecipeID = ?";
    $response = getConnection()->execute_query($query, [$recipeId]);
    return $response->fetch_all(MYSQLI_ASSOC);
}
