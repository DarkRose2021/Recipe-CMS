USE RecipeCMS;

-- Insert sample data into Users
INSERT INTO Users (Password, Email, isAdmin) VALUES
('password1', 'user1@example.com', TRUE),
('password2', 'user2@example.com', FALSE),
('password3', 'user3@example.com', FALSE);

-- Insert sample data into Recipe
INSERT INTO Recipe (Title, Description, Category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES
('Spaghetti Bolognese', 'A classic Italian pasta dish.', 'Italian', 15, 60, 75, 4, 1),
('Chicken Curry', 'A spicy and flavorful dish.', 'Indian', 20, 40, 60, 4, 2),
('Chocolate Cake', 'A rich and moist chocolate cake.', 'Dessert', 30, 45, 75, 8, 3);

-- Insert sample data into Ingredient
INSERT INTO Ingredient (Name, Unit) VALUES
('Spaghetti', 'grams'),
('Ground Beef', 'grams'),
('Tomato Sauce', 'cups'),
('Chicken', 'pieces'),
('Curry Powder', 'tablespoons'),
('Chocolate', 'grams'),
('Flour', 'cups'),
('Sugar', 'cups');

-- Insert sample data into RecipeIngredient
INSERT INTO RecipeIngredient (RecipeID, IngredientID, Quantity) VALUES
(1, 1, 500.00),  -- Spaghetti Bolognese
(1, 2, 250.00),
(1, 3, 2.00),
(2, 4, 4.00),   -- Chicken Curry
(2, 5, 2.00),
(3, 6, 200.00),  -- Chocolate Cake
(3, 7, 2.00),
(3, 8, 1.50);

-- Insert sample data into Instructions
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES
(1, 1, 'Boil the spaghetti.'),
(1, 2, 'Cook the ground beef.'),
(1, 3, 'Add the tomato sauce to the beef and simmer.'),
(2, 1, 'Cook the chicken.'),
(2, 2, 'Add curry powder and simmer.'),
(3, 1, 'Mix the flour and sugar.'),
(3, 2, 'Add the melted chocolate.'),
(3, 3, 'Bake in the oven.');
