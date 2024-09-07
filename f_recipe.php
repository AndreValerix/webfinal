<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="f_recipe.css">
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
        <div class="recipe">
            <h2>Fried Rice</h2>
            <img src="img/Fried Rice.jpg" alt="Fried Rice">
            <div class="ingredients">
                <ul>
                    <li><input type="checkbox" id="ingredient1"><label for="ingredient1">2 cups cooked rice (preferably cold)</label></li>
                    <li><input type="checkbox" id="ingredient2"><label for="ingredient2">1 cup mixed vegetables (carrots, peas, corn)</label></li>
                    <li><input type="checkbox" id="ingredient3"><label for="ingredient3">2 tbsp soy sauce</label></li>
                    <li><input type="checkbox" id="ingredient4"><label for="ingredient4">1 tbsp oil</label></li>
                    <li><input type="checkbox" id="ingredient5"><label for="ingredient5">1 clove garlic, minced</label></li>
                    <li><input type="checkbox" id="ingredient6"><label for="ingredient6">1 egg (optional)</label></li>
                </ul>
            </div>

            <div class="step">Step 1: <b>Prepare Vegetables:</b> Heat oil in a large pan over medium heat. Add minced garlic and cook until fragrant, then add mixed vegetables. Stir-fry for about 3-4 minutes until vegetables are tender.</div>
            <div class="step">Step 2: <b>Add Rice:</b> Add the cold rice to the pan. Use a spatula to break up any clumps and mix thoroughly with the vegetables.</div>
            <div class="step">Step 3: <b>Season and Cook:</b> Stir in soy sauce. Cook for an additional 3-4 minutes, ensuring the rice is evenly coated and heated through. If using, push rice to one side and scramble an egg in the pan, then mix into the rice.</div>
        </div>
        <div class="profile">
            <div class="profile-pic">
                <img src="img/p_1.png" alt="Profile Picture">
            </div>
            <h3>Chef Lin's Home Cooking</h3>
            <p>Chef Lin is a passionate home cook who specializes in making everyday meals both simple and delightful. With a knack for turning basic ingredients into flavorful dishes, Chef Lin's recipes are perfect for busy families looking for quick and tasty solutions.</p>

            <!-- Social Media Section -->
            <div class="social-media">
                <h3>Follow Us On</h3>
                <div class="social-icons">
                    <a href="https://www.facebook.com" target="_blank"><img src="img/facebook.png" alt="Facebook"></a>
                    <a href="https://www.twitter.com" target="_blank"><img src="img/twitter.png" alt="Twitter"></a>
                    <a href="https://www.instagram.com" target="_blank"><img src="img/instagram.jpg" alt="Instagram"></a>
                </div>
                <div class="social-media-contact">
                    <h4>Contact Us</h4>
                    <input type="email" placeholder="Enter your email" id="email">
                    <button type="button" onclick="sendDescription()">Subscribe!</button>
                </div>
            </div>

            <!-- Recipe Description Section -->
            <div class="recipe-description">
                <h3>Add comment About This Recipe</h3>
                <textarea placeholder="Write your comment here..."></textarea>
                <button type="submit">Upload</button>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
    </footer>

    <script>
        function sendDescription() {
            // This function will handle the email submission process
            alert("Email sent successfully!");
        }
    </script>
</body>
</html>
