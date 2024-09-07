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
    </header>
    <!-- Picture and Content Section -->
    <section class="pic-content-section" id="recipes-section">
        <div class="pic-content-grid" data-page="1">
            <!-- Page 1 -->
            <div class="pic-content-box" data-page="1">
                <img src="img/Fried Rice.jpg" alt="Pic 1 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Fried Rice</a></h3>
                    <p>Simple stir-fried rice with vegetables and soy sauce.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="1">
                <img src="img/Chicken Teriyaki.jpg" alt="Pic 2 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Chicken Teriyaki</a></h3>
                    <p>Easy grilled chicken with a sweet teriyaki sauce.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="1">
                <img src="img/Vegetables Stir-Fried.jpg" alt="Pic 3 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Vegetable Stir-Fry</a></h3>
                    <p>Quick mix of vegetables stir-fried with soy sauce.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="1">
                <img src="img/Spring Rolls.jpg" alt="Pic 3 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Spring Rolls</a></h3>
                    <p>Fresh rice paper rolls filled with veggies and shrimp.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="1">
                <img src="img/Tom Yum Soup.jpg" alt="Pic 3 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Tom Yum Soup</a></h3>
                    <p>Spicy Thai soup with shrimp and mushrooms.</p>
                </div>
            </div>
            <div class="pic-content-box" data-page="1">
                <img src="img/Miso Soup.jpg" alt="Pic 3 Image">
                <div class="content-box">
                    <h3><a href="f_recipe.php" class="recipe-link">Miso Soup</a></h3>
                    <p>Light soup with miso, tofu, and seaweed.</p>
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