USE RecipeCMS;

-- Insert sample data into Users table
INSERT INTO Users (HighScore, Username, Password, Email) VALUES
(100, 'john_doe', 'password123', 'john_doe@example.com'),
(200, 'jane_smith', 'securepassword', 'jane_smith@example.com'),
(150, 'chef_master', 'chefpassword', 'chef_master@example.com');

-- Insert sample data into Roles table
INSERT INTO Roles (Role, RoleDescription) VALUES
('Admin', 'Administrator with full access'),
('User', 'Regular user with limited access');

-- Insert sample data into UserRoles table
INSERT INTO UserRoles (UserId, RoleId) VALUES
(1, 1), -- john_doe as Admin
(2, 2), -- jane_smith as User
(3, 1); -- chef_master as Admin

-- Insert sample data into Recipe table
INSERT INTO Recipe (Title, Description, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES
('Spaghetti Bolognese', 'A classic Italian pasta dish with rich meat sauce.', 20, 60, 80, 4, 1),
('Chocolate Cake', 'A rich and moist chocolate cake.', 30, 45, 75, 8, 2),
('Caesar Salad', 'A fresh salad with romaine lettuce, croutons, and Caesar dressing.', 15, 0, 15, 2, 3);

-- Insert sample data into Ingredient table
INSERT INTO Ingredient (Name, Unit) VALUES
('Spaghetti', 'grams'),
('Ground Beef', 'grams'),
('Tomato Sauce', 'ml'),
('Onion', 'pieces'),
('Garlic', 'cloves'),
('Olive Oil', 'ml'),
('Salt', 'teaspoons'),
('Pepper', 'teaspoons'),
('Flour', 'cups'),
('Sugar', 'cups'),
('Cocoa Powder', 'cups'),
('Eggs', 'pieces'),
('Butter', 'cups'),
('Lettuce', 'heads'),
('Croutons', 'cups'),
('Caesar Dressing', 'ml');

-- Insert sample data into RecipeIngredient table
INSERT INTO RecipeIngredient (RecipeID, IngredientID, Quantity) VALUES
(1, 1, 500), -- Spaghetti Bolognese with 500 grams of Spaghetti
(1, 2, 400), -- Spaghetti Bolognese with 400 grams of Ground Beef
(1, 3, 300), -- Spaghetti Bolognese with 300 ml of Tomato Sauce
(1, 4, 1),   -- Spaghetti Bolognese with 1 Onion
(1, 5, 2),   -- Spaghetti Bolognese with 2 cloves of Garlic
(1, 6, 50),  -- Spaghetti Bolognese with 50 ml of Olive Oil
(1, 7, 1),   -- Spaghetti Bolognese with 1 teaspoon of Salt
(1, 8, 0.5), -- Spaghetti Bolognese with 0.5 teaspoon of Pepper
(2, 9, 2),   -- Chocolate Cake with 2 cups of Flour
(2, 10, 1.5),-- Chocolate Cake with 1.5 cups of Sugar
(2, 11, 0.75),-- Chocolate Cake with 0.75 cups of Cocoa Powder
(2, 12, 3),  -- Chocolate Cake with 3 Eggs
(2, 13, 1),  -- Chocolate Cake with 1 cup of Butter
(3, 14, 1),  -- Caesar Salad with 1 head of Lettuce
(3, 15, 1),  -- Caesar Salad with 1 cup of Croutons
(3, 16, 100);-- Caesar Salad with 100 ml of Caesar Dressing

-- Insert sample data into Category table
INSERT INTO Category (Name) VALUES
('Dinner'),
('Dessert'),
('Salad');

-- Insert sample data into RecipeCategory table
INSERT INTO RecipeCategory (RecipeID, CategoryID) VALUES
(1, 1), -- Spaghetti Bolognese in Dinner category
(2, 2), -- Chocolate Cake in Dessert category
(3, 3);-- Caesar Salad in Salad category

-- Insert sample data into Instructions table
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES
(1, 1, 'Boil the spaghetti according to package instructions.'),
(1, 2, 'In a separate pan, heat olive oil and cook onions and garlic until translucent.'),
(1, 3, 'Add ground beef to the pan and cook until browned.'),
(1, 4, 'Add tomato sauce, salt, and pepper. Simmer for 30 minutes.'),
(1, 5, 'Serve the sauce over the cooked spaghetti.'),
(2, 1, 'Preheat the oven to 350°F (175°C).'),
(2, 2, 'In a bowl, mix flour, sugar, and cocoa powder.'),
(2, 3, 'Add eggs and melted butter, and mix until smooth.'),
(2, 4, 'Pour the batter into a greased baking pan.'),
(2, 5, 'Bake for 45 minutes or until a toothpick comes out clean.'),
(2, 6, 'Let the cake cool before serving.'),
(3, 1, 'Chop the lettuce and place in a bowl.'),
(3, 2, 'Add croutons and Caesar dressing.'),
(3, 3, 'Toss well to combine.');

SELECT * FROM Users;
SELECT * FROM Roles;
SELECT * FROM UserRoles;
SELECT * FROM Recipe;
SELECT * FROM Ingredient;
SELECT * FROM RecipeIngredient;
SELECT * FROM Category;
SELECT * FROM RecipeCategory;
SELECT * FROM Instructions;
