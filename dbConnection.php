<?php

$env = parse_ini_file(".env");

define("DB_USER", $env["DB_USER"]);
define("DB_PSWD", $env["DB_PSWD"]);
define("DB_HOST", $env["DB_HOST"]);
define("DB_NAME", $env["DB_NAME"]);

function getConnection()
{
    $dbConnection = @mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME) or die("Could not connect to MySQL server.");
    return $dbConnection;
}

function createUser($username, $passwordHash): mysqli_result|bool
{
    $query = "INSERT into `User` (UserName, PasswordHash) values (?, ?)";
    return getConnection()->execute_query($query, [$username, $passwordHash]);
}

function getUserByUsername($username): false|array|null
{
    $query = "SELECT * from `User` where UserName = ?";
    $response = getConnection()->execute_query($query, [$username]);

    return $response->fetch_assoc();
}

function getUserById($id): false|array|null
{
    $query = "SELECT * from `User` where UserId = ?";
    $response = getConnection()->execute_query($query, [$id]);

    return $response->fetch_assoc();
}

function updateUserUserName($id, $username): mysqli_result|bool
{
    $query = "UPDATE `User` set UserName = ? where UserId = ?";
    return getConnection()->execute_query($query, [$username, $id]);
}

function updateUserPassword($id, $passwordHash): mysqli_result|bool
{
    $query = "UPDATE `User` set PasswordHash = ? where UserId = ?";
    return getConnection()->execute_query($query, [$passwordHash, $id]);
}

function deleteUser($id): mysqli_result|bool
{
    $query = "DELETE from `User` where UserId = ?";
    return getConnection()->execute_query($query, [$id]);
}

function createUserItem($userId, $itemName, $itemUserName, $itemPassword): mysqli_result|bool
{
    $query = "INSERT into `Item` (UserId, ItemName, itemUserName, ItemPassword) values (?, ?, ?, ?)";
    return getConnection()->execute_query($query, [$userId, $itemName, $itemUserName, $itemPassword]);
}

function getUserItemById($itemId): array|false|null
{
    $query = "SELECT * from `Item` where ItemId = ?";
    $response = getConnection()->execute_query($query, [$itemId]);

    return $response->fetch_assoc();
}

function getUserItemsByUser($userId): array
{
    $query = "SELECT * from `Item` where UserId = ?";
    $response = getConnection()->execute_query($query, [$userId]);

    return $response->fetch_all(MYSQLI_ASSOC);
}

function updateUserItem($itemId, $itemName, $itemUserName, $itemPassword): mysqli_result|bool
{
    $query = "UPDATE `Item` set ItemName = ?, itemUserName = ?, itemPassword = ? where ItemId = ?";
    return getConnection()->execute_query($query, [$itemId, $itemName, $itemUserName, $itemPassword]);
}

function deleteUserItem($itemId): mysqli_result|bool
{
    $query = "DELETE from `Item` where ItemId = ?";
    return getConnection()->execute_query($query, [$itemId]);
}