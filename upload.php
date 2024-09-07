<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="upload.css">
    <script src="pagination.js" defer></script>
    <script>
        // Pass login status to JavaScript
        var isLoggedIn = <?php echo json_encode(isset($_SESSION['user_id'])); ?>;
    </script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#videos-section">Videos</a></li>
            <li><a href="#recipes-section">Recipes</a></li>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <!-- Show account icon if logged in -->
                <li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
                <li><a href="logout.php">Log Out</a></li>
            <?php else : ?>
                <!-- Show sign-up link if not logged in -->
                <li><a href="Sign_up.php">Sign Up</a></li>
                <li><a href="Log_in.php">Log In</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="container">
        <div class="upload-recipe">
            <h2>Upload Your Recipe</h2>
            <form action="submit_recipe.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recipe-title">Recipe Title:</label>
                    <input type="text" id="recipe-title" name="recipe_title" required>
                </div>
                
                <div class="form-group">
                    <label for="recipe-image">Recipe Image:</label>
                    <input type="file" id="recipe-image" name="recipe_image" accept="image/*" required>
                </div>
                
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    <textarea id="ingredients" name="ingredients" rows="5" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="step">Cooking Step 1:</label>
                    <textarea id="steps" name="steps" rows="10" required></textarea>
                </div>

                <div class="form-group">
                    <label for="steps">Cooking Step 2:</label>
                    <textarea id="steps" name="steps" rows="10" required></textarea>
                </div>

                <div class="form-group">
                    <label for="steps">Cooking Step 3:</label>
                    <textarea id="steps" name="steps" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Submit Recipe</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
    </footer>
</body>
</html>
