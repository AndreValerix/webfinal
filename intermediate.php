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
            <!-- Page 1 -->
            <!-- Page 2 -->
            <div class="pic-content-box" data-page="2">
                <img src="img/pad_thai.jpg" alt="Pic 4 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Pad Thai</a></h3>
                    <p>Stir-fried noodles with shrimp, tofu, and peanuts.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="2">
                <img src="img/Chicken Katsu.jpg" alt="Pic 5 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Chicken Katsu</a></h3>
                    <p>Breaded chicken served with a sweet katsu sauce.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="2">
                <img src="img/Beef Bulgogi.jpg" alt="Pic 6 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Beed Bulgogi</a></h3>
                    <p>Marinated beef grilled with a sweet and savory sauce.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="2">
                <img src="img/Gyoza.jpg" alt="Pic 6 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Gyoza</a></h3>
                    <p>Pan-fried dumplings filled with ground meat and veggies.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="2">
                <img src="img/Pho.jpg" alt="Pic 6 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Pho</a></h3>
                    <p>Vietnamese noodle soup with beef and fresh herbs.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="2">
                <img src="img/Bibimbap.jpg" alt="Pic 6 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Bibimbap</a></h3>
                    <p>Rice mixed with vegetables, meat, and a fried egg.</p>
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
