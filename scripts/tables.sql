DROP DATABASE IF EXISTS RecipeCMS;
CREATE DATABASE IF NOT EXISTS RecipeCMS;
USE RecipeCMS;

DROP TABLE IF EXISTS UserRoles;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Roles;
DROP TABLE IF EXISTS RecipeIngredient;
DROP TABLE IF EXISTS Ingredient;
DROP TABLE IF EXISTS RecipeCategory;
DROP TABLE IF EXISTS Recipe;
DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS Instructions;

CREATE TABLE IF NOT EXISTS Users (
    UserId INT NOT NULL AUTO_INCREMENT,
    HighScore INT,
    Username VARCHAR(100) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    PRIMARY KEY (UserId),
    CONSTRAINT Users_UniqueEmail UNIQUE (Email),
    CONSTRAINT Users_UniqueUsername UNIQUE (Username)
);

CREATE TABLE IF NOT EXISTS Roles (
    RoleId INT NOT NULL AUTO_INCREMENT,
    Role VARCHAR(100) NOT NULL,
    RoleDescription TEXT NOT NULL,
    PRIMARY KEY (RoleId),
    CONSTRAINT Roles_UniqueRole UNIQUE (Role)
);

CREATE TABLE IF NOT EXISTS UserRoles (
    UserId INT,
    RoleId INT,
    PRIMARY KEY (UserId, RoleId),
    FOREIGN KEY (UserId) REFERENCES Users (UserId),
    FOREIGN KEY (RoleId) REFERENCES Roles (RoleId)
);

CREATE TABLE IF NOT EXISTS Recipe (
    RecipeID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    Description TEXT,
    PrepTime INT, -- in minutes
    CookTime INT, -- in minutes
    TotalTime INT, -- in minutes
    Servings INT,
    DateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    AuthorID INT,
    FOREIGN KEY (AuthorID) REFERENCES Users(UserId)
);

CREATE TABLE IF NOT EXISTS Ingredient (
    IngredientID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Unit VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS RecipeIngredient (
    RecipeID INT,
    IngredientID INT,
    Quantity DECIMAL(10, 2),
    PRIMARY KEY (RecipeID, IngredientID),
    FOREIGN KEY (RecipeID) REFERENCES Recipe(RecipeID),
    FOREIGN KEY (IngredientID) REFERENCES Ingredient(IngredientID)
);

CREATE TABLE IF NOT EXISTS Category (
    CategoryID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS RecipeCategory (
    RecipeID INT,
    CategoryID INT,
    PRIMARY KEY (RecipeID, CategoryID),
    FOREIGN KEY (RecipeID) REFERENCES Recipe(RecipeID),
    FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
);

CREATE TABLE IF NOT EXISTS Instructions (
    InstructionID INT PRIMARY KEY AUTO_INCREMENT,
    RecipeID INT,
    StepNumber INT,
    Description TEXT,
    FOREIGN KEY (RecipeID) REFERENCES Recipe(RecipeID)
);
