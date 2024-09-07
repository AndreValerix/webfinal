<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <script>
        // Pass login status to JavaScript
        var isLoggedIn = <?php echo json_encode(isset($_SESSION['user_id'])); ?>;
    </script>
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="home.php#videos-section">Videos</a></li>
                <li><a href="home.php#recipes-section">Recipes</a></li>
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
    </header>
    <!-- Picture and Content Section -->
    <section class="pic-content-section" id="recipes-section">
        <div class="pic-content-grid" data-page="1">
            <!-- Page 3 -->
            <div class="pic-content-box" data-page="3">
                <img src="img/Ramen.jpg" alt="Pic 7 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Ramen</a></h3>
                    <p>Homemade noodles in a rich broth with pork and vegetables.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="3">
                <img src="img/Korean Fried Chicken.jpg" alt="Pic 8 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Korean Fried Chicken</a></h3>
                    <p>Crispy chicken coated in a spicy, sweet sauce.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="3">
                <img src="img/Laksa.jpg" alt="Pic 9 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Laksa</a></h3>
                    <p>Spicy coconut noodle soup with shrimp and fish cakes.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="3">
                <img src="img/Dim Sum.jpg" alt="Pic 9 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Dim Sum</a></h3>
                    <p>Assorted dumplings and buns served in bamboo steamers.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="3">
                <img src="img/Chicken Adobo.jpg" alt="Pic 9 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Chicken Adobo</a></h3>
                    <p>Filipino-style chicken braised in soy sauce and vinegar.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="3">
                <img src="img/sushi_rolls.jpg" alt="Pic 9 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Sushi Rolls</a></h3>
                    <p>Rice and seafood rolled in seaweed, requiring precise rolling technique.</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
    </footer>
    <!-- Include JavaScript file -->
    <script src="model.js"></script>
</body>
</html>
