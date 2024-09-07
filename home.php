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
    

    <!-- Banner Section -->
    <section class="banner">
        <h1>Welcome to Crumbly</h1>
    </section>

    <section class="intro-text">
        <p>Let's Get Started</p>
    </section>

    <!-- Scroll Arrow -->
    <div class="scroll-arrow">
        <a href="#featured-recipe">&#x21E3;</a>
    </div>

    <!-- Featured Recipe Section -->
    <section class="featured-recipe" id="featured-recipe">
        <div class="recipe-list">
            <li><a href="beginner.php">Beginner Level Recipe</a></li>             
            <div class="recipe-item">
                <img src="img/Chicken Teriyaki.jpg" alt="Recipe 1 Image">
                <div class="recipe-box">
                    <h3>Chicken Teriyaki</h3>
                    <p>"What's for dinner?" Gah! That question! <b>Easy grilled chicken with a sweet teriyaki sauce</b> will help you get that question answered!</p>
                </div>
            </div>
            <li><a href="intermediate.php">Intermediate Level Recipe</a></li>             
            <div class="recipe-item">
                <img src="img/pad_thai.jpg" alt="Recipe 2 Image">
                <div class="recipe-box">
                    <h3>Pad Thai</h3>
                    <p>"What's for dinner?" Gah! That question! <b>Stir-fried noodles with shrimp, tofu, and peanuts</b> will help you get that question answered!</p>
                </div>
            </div>
            <li><a href="advanced.php">Advanced Level Recipe</a></li>             
            <div class="recipe-item">
                <img src="img/sushi_rolls.jpg" alt="Recipe 3 Image">
                <div class="recipe-box">
                    <h3>Sushi Rolls</h3>
                    <p>"What's for dinner?" Gah! That question! <b>Rice and seafood rolled in seaweed, requiring precise rolling technique.</b> will help you get that question answered!</p>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Recommended Videos Section -->
    <section class="recommended-videos" id="videos-section">
        <h2>Recommended Videos</h2>
        <div class="video-boxes">
            <!-- Video 1 -->
            <div class="video-box">
                <iframe width="300" height="200" src="https://www.youtube.com/embed/rbHIj9kMBYY" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>
            <!-- Video 2 -->
            <div class="video-box">
                <iframe width="300" height="200" src="https://www.youtube.com/embed/SKDU5PTQwYg" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>
            <!-- Video 3 -->
            <div class="video-box">
                <iframe width="300" height="200" src="https://www.youtube.com/embed/0exWBGoe-3A" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>
            <!-- Video 4 -->
            <div class="video-box">
                <iframe width="300" height="200" src="https://www.youtube.com/embed/yb89hksK0Ds" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>
            <!-- Video 5 -->
            <div class="video-box">
                <iframe width="300" height="200" src="https://www.youtube.com/embed/rbHIj9kMBYY" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>
            <!-- Video 6 -->
            <div class="video-box">
                <iframe width="300" height="200" src="https://www.youtube.com/embed/INDUn1xc7WM" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>
        </div>
    </section>

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
        <div class="pagination">
            <span id="prev-arrow">←</span>
            <span id="page-1" class="page-number">1</span>
            <span id="page-2" class="page-number">2</span>
            <span id="page-3" class="page-number">3</span>
            <span id="next-arrow">→</span>
        </div>
    </section>    

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
    </footer>
    <!-- Include JavaScript file -->
    <script src="model.js"></script>
</body>
</html>