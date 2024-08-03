DROP DATABASE IF EXISTS RecipeCMS;
CREATE DATABASE IF NOT EXISTS RecipeCMS;
USE RecipeCMS;

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS RecipeIngredient;
DROP TABLE IF EXISTS Ingredient;
DROP TABLE IF EXISTS Recipe;
DROP TABLE IF EXISTS Instructions;

CREATE TABLE IF NOT EXISTS Users (
    UserId INT NOT NULL AUTO_INCREMENT,
    Password VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    isAdmin BOOLEAN NOT NULL,
    PRIMARY KEY (UserId),
    CONSTRAINT Users_UniqueEmail UNIQUE (Email)
    );

CREATE TABLE IF NOT EXISTS Recipe (
    RecipeID INT NOT NULL AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    Description TEXT,
    Category VARCHAR(255) NOT NULL,
    PrepTime INT, -- in minutes
    CookTime INT, -- in minutes
    TotalTime INT, -- in minutes
    Servings INT,
    DateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    AuthorID INT,
    PRIMARY KEY (RecipeID),
    FOREIGN KEY (AuthorID) REFERENCES Users(UserId)
);

CREATE TABLE IF NOT EXISTS Ingredient (
    IngredientID INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Unit VARCHAR(50),
    PRIMARY KEY (IngredientID)
);

CREATE TABLE IF NOT EXISTS RecipeIngredient (
    RecipeIngredientID INT NOT NULL AUTO_INCREMENT,
    RecipeID INT,
    IngredientID INT,
    Quantity DECIMAL(10, 2),
    PRIMARY KEY (RecipeIngredientID),
    FOREIGN KEY (RecipeID) REFERENCES Recipe(RecipeID),
    FOREIGN KEY (IngredientID) REFERENCES Ingredient(IngredientID)
);

CREATE TABLE IF NOT EXISTS Instructions (
    InstructionID INT NOT NULL AUTO_INCREMENT,
    RecipeID INT,
    StepNumber INT,
    Description TEXT,
    PRIMARY KEY (InstructionID),
    FOREIGN KEY (RecipeID) REFERENCES Recipe(RecipeID) 
);
