USE RecipeCMS;

-- Insert Users
INSERT INTO Users (Password, Email, isAdmin) VALUES 
('password123', 'chef@example.com', TRUE),
('password456', 'homecook@example.com', FALSE);

-- Insert Recipes
INSERT INTO Recipe (Title, Description, Category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES 
('Spaghetti Bolognese', 'A classic Italian pasta dish with rich meat sauce.', 'Main Course', 20, 60, 80, 4, 1),
('Caesar Salad', 'A refreshing salad with romaine lettuce, croutons, and Caesar dressing.', 'Salad', 15, 0, 15, 2, 2);

-- Insert Recipe Ingredients
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(1, 'Ground Beef', 'grams', 500),
(1, 'Onion', 'pieces', 1),
(1, 'Garlic', 'cloves', 2),
(1, 'Tomato Sauce', 'cups', 2),
(1, 'Spaghetti', 'grams', 400),
(2, 'Romaine Lettuce', 'cups', 3),
(2, 'Croutons', 'cups', 1),
(2, 'Caesar Dressing', 'tablespoons', 4),
(2, 'Parmesan Cheese', 'grams', 50);

-- Insert Instructions
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(1, 1, 'Cook the ground beef in a large skillet over medium heat until browned.'),
(1, 2, 'Add chopped onion and garlic, and cook until tender.'),
(1, 3, 'Stir in the tomato sauce and simmer for 30 minutes.'),
(1, 4, 'Cook the spaghetti according to package instructions.'),
(1, 5, 'Serve the sauce over the spaghetti.'),
(2, 1, 'Wash and chop the romaine lettuce.'),
(2, 2, 'Add croutons and Parmesan cheese to the lettuce.'),
(2, 3, 'Drizzle Caesar dressing over the salad and toss to combine.');
