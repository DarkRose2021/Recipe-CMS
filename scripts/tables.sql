DROP DATABASE IF EXISTS RecipeCMS;
CREATE DATABASE IF NOT EXISTS RecipeCMS;
USE RecipeCMS;

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS RecipeIngredients;
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

CREATE TABLE IF NOT EXISTS RecipeIngredients (
    RecipeIngredientID INT NOT NULL AUTO_INCREMENT,
    RecipeID INT,
    Name VARCHAR(255) NOT NULL,
    Unit VARCHAR(50),
    Quantity DECIMAL(10, 2),
    PRIMARY KEY (RecipeIngredientID),
    FOREIGN KEY (RecipeID) REFERENCES Recipe(RecipeID)
);

CREATE TABLE IF NOT EXISTS Instructions (
    InstructionID INT NOT NULL AUTO_INCREMENT,
    RecipeID INT,
    StepNumber INT,
    Description TEXT,
    PRIMARY KEY (InstructionID),
    FOREIGN KEY (RecipeID) REFERENCES Recipe(RecipeID)
);
