USE RecipeCMS;

INSERT INTO Users (Username, Password, Email) VALUES
('admin', 'adminpass', 'admin@example.com'),
('user1', 'user1pass', 'user1@example.com'),
('user2', 'user2pass', 'user2@example.com');

INSERT INTO Roles (Role, RoleDescription) VALUES
('Admin', 'Administrator with full access'),
('Editor', 'Editor with permissions to manage content'),
('Viewer', 'Viewer with read-only access');

INSERT INTO UserRoles (UserId, RoleId) VALUES
(1, 1), -- admin is Admin
(2, 2), -- user1 is Editor
(3, 3); -- user2 is Viewer

INSERT INTO Ingredient (Name, Unit) VALUES
('Flour', 'grams'),
('Sugar', 'grams'),
('Eggs', 'unit'),
('Milk', 'liters');

INSERT INTO Category (Name) VALUES
('Dessert'),
('Breakfast'),
('Lunch'),
('Dinner');

INSERT INTO Recipe (Title, Description, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES
('Pancakes', 'Fluffy pancakes for breakfast.', 10, 15, 25, 4, 2),
('Chocolate Cake', 'Delicious chocolate cake.', 20, 30, 50, 8, 1);

INSERT INTO RecipeIngredient (RecipeID, IngredientID, Quantity) VALUES
(1, 1, 200.00), 
(1, 2, 50.00),  
(1, 3, 2.00),   
(1, 4, 0.50),   
(2, 1, 300.00), 
(2, 2, 200.00), 
(2, 3, 3.00),   
(2, 4, 0.75);   

INSERT INTO RecipeCategory (RecipeID, CategoryID) VALUES
(1, 2),
(2, 1);

INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES
(1, 1, 'Mix dry ingredients in a bowl.'),
(1, 2, 'Add wet ingredients and mix until smooth.'),
(1, 3, 'Cook on a hot griddle until bubbles form on the surface.'),
(1, 4, 'Flip and cook until golden brown.'),
(2, 1, 'Preheat oven to 350°F (175°C).'),
(2, 2, 'Mix dry ingredients together.'),
(2, 3, 'Add wet ingredients and mix until combined.'),
(2, 4, 'Pour batter into a greased pan and bake for 30 minutes.');
