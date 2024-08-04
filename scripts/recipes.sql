USE RecipeCMS;

-- Insert initial recipes into the Recipe table
INSERT INTO Recipe (Title, Description, Category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES 
('Chicken Caesar Salad', 'A healthy and delicious chicken Caesar salad.', 'Lunch', 20, 10, 30, 2, 1),
('Grilled Cheese Sandwich', 'A classic grilled cheese sandwich.', 'Lunch', 5, 10, 15, 1, 1),
('Spaghetti Carbonara', 'A quick and easy spaghetti carbonara.', 'Lunch', 15, 20, 35, 4, 2);

-- Insert ingredients for Chicken Caesar Salad
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(1, 'Chicken Breast', 'pcs', 2),
(1, 'Romaine Lettuce', 'head', 1),
(1, 'Parmesan Cheese', 'cup', 0.5),
(1, 'Caesar Dressing', 'cup', 0.25),
(1, 'Croutons', 'cup', 1);

-- Insert ingredients for Grilled Cheese Sandwich
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(2, 'Bread', 'slices', 2),
(2, 'Cheddar Cheese', 'slice', 2),
(2, 'Butter', 'tbsp', 1);

-- Insert ingredients for Spaghetti Carbonara
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(3, 'Spaghetti', 'g', 200),
(3, 'Eggs', 'pcs', 2),
(3, 'Parmesan Cheese', 'cup', 0.5),
(3, 'Pancetta', 'g', 100),
(3, 'Black Pepper', 'tsp', 1),
(3, 'Salt', 'tsp', 0.5);

-- Insert cooking instructions for Chicken Caesar Salad
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(1, 1, 'Cook the chicken breast and slice it.'),
(1, 2, 'Chop the romaine lettuce.'),
(1, 3, 'Mix the lettuce, chicken, parmesan cheese, and caesar dressing.'),
(1, 4, 'Top with croutons before serving.');

-- Insert cooking instructions for Grilled Cheese Sandwich
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(2, 1, 'Butter one side of each bread slice.'),
(2, 2, 'Place one slice of bread, butter side down, in a skillet over medium heat.'),
(2, 3, 'Add the cheddar cheese slices on top of the bread.'),
(2, 4, 'Top with the second slice of bread, butter side up.'),
(2, 5, 'Cook until the bread is golden brown and the cheese is melted, flipping once.');

-- Insert cooking instructions for Spaghetti Carbonara
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(3, 1, 'Cook the spaghetti according to package instructions.'),
(3, 2, 'In a bowl, whisk together the eggs and parmesan cheese.'),
(3, 3, 'Cook the pancetta in a skillet until crispy.'),
(3, 4, 'Drain the spaghetti and add it to the skillet with the pancetta.'),
(3, 5, 'Remove from heat and quickly mix in the egg and cheese mixture.'),
(3, 6, 'Season with black pepper and salt to taste. Serve immediately.');

-- Insert more recipes into the Recipe table
INSERT INTO Recipe (Title, Description, Category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES 
('Pancakes', 'Fluffy and delicious pancakes.', 'Breakfast', 10, 10, 20, 4, 1),
('Scrambled Eggs', 'Simple and quick scrambled eggs.', 'Breakfast', 5, 5, 10, 2, 2),
('Fruit Smoothie', 'A refreshing fruit smoothie.', 'Breakfast', 5, 0, 5, 1, 1);

-- Insert ingredients for Pancakes
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(4, 'Flour', 'cup', 1.5),
(4, 'Baking Powder', 'tbsp', 1),
(4, 'Salt', 'tsp', 0.5),
(4, 'Sugar', 'tbsp', 1),
(4, 'Milk', 'cup', 1.25),
(4, 'Egg', 'pcs', 1),
(4, 'Butter', 'tbsp', 3);

-- Insert ingredients for Scrambled Eggs
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(5, 'Eggs', 'pcs', 4),
(5, 'Milk', 'tbsp', 2),
(5, 'Salt', 'tsp', 0.25),
(5, 'Butter', 'tbsp', 1);

-- Insert ingredients for Fruit Smoothie
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(6, 'Banana', 'pcs', 1),
(6, 'Strawberries', 'cup', 1),
(6, 'Orange Juice', 'cup', 1),
(6, 'Greek Yogurt', 'cup', 0.5),
(6, 'Honey', 'tbsp', 1);

-- Insert cooking instructions for Pancakes
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(4, 1, 'In a large bowl, mix flour, baking powder, salt, and sugar.'),
(4, 2, 'Make a well in the center and pour in the milk, egg, and melted butter; mix until smooth.'),
(4, 3, 'Heat a lightly oiled griddle or frying pan over medium high heat.'),
(4, 4, 'Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake.'),
(4, 5, 'Brown on both sides and serve hot.');

-- Insert cooking instructions for Scrambled Eggs
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(5, 1, 'In a medium bowl, whisk together eggs, milk, and salt.'),
(5, 2, 'Heat butter in a large skillet over medium heat.'),
(5, 3, 'Pour in egg mixture and let it sit, without stirring, for about 20 seconds.'),
(5, 4, 'Stir eggs gently until they are cooked through but still soft. Serve hot.');

-- Insert cooking instructions for Fruit Smoothie
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(6, 1, 'Place banana, strawberries, orange juice, Greek yogurt, and honey into a blender.'),
(6, 2, 'Blend until smooth. Serve immediately.');

-- Insert more recipes into the Recipe table
INSERT INTO Recipe (Title, Description, Category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES 
('Grilled Salmon', 'A simple and tasty grilled salmon.', 'Dinner', 10, 15, 25, 2, 1),
('Beef Stew', 'A hearty and comforting beef stew.', 'Dinner', 20, 120, 140, 4, 2),
('Vegetable Stir-Fry', 'A quick and healthy vegetable stir-fry.', 'Dinner', 10, 10, 20, 2, 1);

-- Insert ingredients for Grilled Salmon
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(7, 'Salmon Fillets', 'pcs', 2),
(7, 'Olive Oil', 'tbsp', 2),
(7, 'Garlic', 'cloves', 2),
(7, 'Lemon Juice', 'tbsp', 2),
(7, 'Salt', 'tsp', 1),
(7, 'Black Pepper', 'tsp', 0.5);

-- Insert ingredients for Beef Stew
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(8, 'Beef Chuck', 'lbs', 2),
(8, 'Carrots', 'pcs', 3),
(8, 'Potatoes', 'pcs', 3),
(8, 'Onion', 'pcs', 1),
(8, 'Beef Broth', 'cups', 4),
(8, 'Tomato Paste', 'tbsp', 2),
(8, 'Flour', 'tbsp', 2),
(8, 'Salt', 'tsp', 1),
(8, 'Black Pepper', 'tsp', 0.5),
(8, 'Thyme', 'tsp', 1);

-- Insert ingredients for Vegetable Stir-Fry
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(9, 'Broccoli', 'cup', 2),
(9, 'Bell Peppers', 'pcs', 2),
(9, 'Carrot', 'pcs', 1),
(9, 'Soy Sauce', 'tbsp', 3),
(9, 'Garlic', 'cloves', 2),
(9, 'Ginger', 'tbsp', 1),
(9, 'Olive Oil', 'tbsp', 2),
(9, 'Salt', 'tsp', 0.5),
(9, 'Black Pepper', 'tsp', 0.25);

-- Insert cooking instructions for Grilled Salmon
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(7, 1, 'Preheat grill to medium heat.'),
(7, 2, 'In a small bowl, mix olive oil, minced garlic, lemon juice, salt, and pepper.'),
(7, 3, 'Brush the salmon fillets with the olive oil mixture.'),
(7, 4, 'Grill the salmon for 6-8 minutes on each side, or until the fish flakes easily with a fork.');

-- Insert cooking instructions for Beef Stew
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(8, 1, 'Cut the beef chuck into bite-sized pieces and season with salt and pepper.'),
(8, 2, 'In a large pot, heat some oil over medium-high heat and brown the beef.'),
(8, 3, 'Add chopped onions and cook until softened.'),
(8, 4, 'Sprinkle flour over the beef and onions, stir well, and cook for 1-2 minutes.'),
(8, 5, 'Add beef broth, tomato paste, and thyme. Stir well and bring to a boil.'),
(8, 6, 'Reduce heat, cover, and simmer for 1 hour.'),
(8, 7, 'Add chopped carrots and potatoes, and continue to simmer for another hour, or until the vegetables are tender.');

-- Insert cooking instructions for Vegetable Stir-Fry
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(9, 1, 'Cut broccoli, bell peppers, and carrot into bite-sized pieces.'),
(9, 2, 'Heat olive oil in a large skillet over medium-high heat.'),
(9, 3, 'Add minced garlic and ginger, and cook for 1-2 minutes.'),
(9, 4, 'Add the vegetables to the skillet and stir-fry for 5-7 minutes.'),
(9, 5, 'Add soy sauce, salt, and pepper. Stir well and cook for another 2-3 minutes. Serve hot.');

-- Insert additional recipes into the Recipe table
INSERT INTO Recipe (Title, Description, Category, PrepTime, CookTime, TotalTime, Servings, AuthorID) VALUES 
('Chocolate Cake', 'A rich and moist chocolate cake.', 'Dessert', 15, 30, 45, 8, 1),
('Apple Pie', 'A classic apple pie with a flaky crust.', 'Dessert', 30, 50, 80, 8, 2),
('Cheesecake', 'A creamy and smooth cheesecake.', 'Dessert', 20, 60, 80, 12, 1);

-- Insert ingredients for Chocolate Cake
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(10, 'All-purpose Flour', 'cups', 1.5),
(10, 'Sugar', 'cups', 1),
(10, 'Cocoa Powder', 'cup', 0.5),
(10, 'Baking Powder', 'tsp', 1.5),
(10, 'Baking Soda', 'tsp', 1.5),
(10, 'Salt', 'tsp', 1),
(10, 'Eggs', 'pcs', 2),
(10, 'Milk', 'cups', 1),
(10, 'Vegetable Oil', 'cups', 0.5),
(10, 'Vanilla Extract', 'tsp', 2),
(10, 'Boiling Water', 'cups', 1);

-- Insert ingredients for Apple Pie
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(11, 'Apples', 'cups', 6),
(11, 'Sugar', 'cups', 0.75),
(11, 'Brown Sugar', 'cups', 0.25),
(11, 'Flour', 'tbsp', 2),
(11, 'Cinnamon', 'tsp', 1),
(11, 'Nutmeg', 'tsp', 0.5),
(11, 'Salt', 'tsp', 0.25),
(11, 'Pie Crust', 'pcs', 2);

-- Insert ingredients for Cheesecake
INSERT INTO RecipeIngredients (RecipeID, Name, Unit, Quantity) VALUES 
(12, 'Cream Cheese', 'cups', 4),
(12, 'Sugar', 'cups', 1),
(12, 'Eggs', 'pcs', 4),
(12, 'Vanilla Extract', 'tsp', 1),
(12, 'Graham Cracker Crumbs', 'cups', 1.5),
(12, 'Butter', 'tbsp', 6),
(12, 'Sour Cream', 'cups', 1);

-- Insert cooking instructions for Chocolate Cake
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(10, 1, 'Preheat oven to 350°F (175°C). Grease and flour two nine-inch round pans.'),
(10, 2, 'In a large bowl, stir together the flour, sugar, cocoa, baking powder, baking soda, and salt.'),
(10, 3, 'Add the eggs, milk, oil, and vanilla, and mix for 2 minutes on medium speed of mixer.'),
(10, 4, 'Stir in the boiling water last. The batter will be thin. Pour evenly into the prepared pans.'),
(10, 5, 'Bake 30 to 35 minutes in the preheated oven, until the cake tests done with a toothpick. Cool in the pans for 10 minutes, then remove to a wire rack to cool completely.');

-- Insert cooking instructions for Apple Pie
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(11, 1, 'Preheat oven to 425°F (220°C).'),
(11, 2, 'In a large bowl, combine sliced apples, sugar, brown sugar, flour, cinnamon, nutmeg, and salt.'),
(11, 3, 'Place the apple mixture into the bottom crust. Dot with butter. Cover with the top crust and seal the edges. Cut slits in the top crust to allow steam to escape.'),
(11, 4, 'Bake for 50 minutes, or until the crust is golden brown and the filling is bubbly. Cool on a wire rack.');

-- Insert cooking instructions for Cheesecake
INSERT INTO Instructions (RecipeID, StepNumber, Description) VALUES 
(12, 1, 'Preheat oven to 325°F (165°C).'),
(12, 2, 'In a medium bowl, mix graham cracker crumbs and melted butter. Press onto the bottom of a 9-inch springform pan.'),
(12, 3, 'In a large bowl, mix cream cheese and sugar until smooth. Blend in the eggs one at a time, then stir in vanilla and sour cream.'),
(12, 4, 'Pour the batter over the crust in the pan.'),
(12, 5, 'Bake in preheated oven for 60 minutes. Turn the oven off, and let the cheesecake cool in the oven with the door closed for 5 to 6 hours; this prevents cracking. Chill in refrigerator until serving.');
