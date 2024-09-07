<?php
session_start();

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: Log_in.php");
    exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'recipe_website');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel="stylesheet" href="acc.css">
    </head>
    <body>
        <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#videos-section">Videos</a></li>
                <li><a href="#recipes-section">Recipes</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                <li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <?php else : ?>
                <li><a href="Sign_up.php">Sign Up</a></li>
                <li><a href="Log_in.php">Log In</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <main>
            <section class="profile">
                <div class="pfp">
                    <img src="images.jpg" alt="Profile Picture">
                </div>
                <div class="about-me">
                    <h2>About Me</h2>
                    <p>
                       Hello, my name is <?php echo htmlspecialchars($username); ?>.
                    </p>
                </div>
            </section>
            <section class="back-social">
                <div class="back"><a href="upload.php">Post a receipe</a></div>
                <div class="social">
                    <a href="#"><img src="img/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
                </div>
            </section>
            <section class="other-people">
                <h3>Check out other people</h3>
                <div class="people">
                    <div class="person">
                        <div class="circle">
                           <img src="images.jpg" alt="Person 1">
                        </div>
                        <p>Name 1</p>
                    </div>
                    <div class="person">
                        <div class="circle">
                            <img src="images.jpg" alt="Person 2">
                        </div>
                        <p>Name 2</p>
                    </div>
                    <div class="person">
                        <div class="circle">
                           <img src="images.jpg" alt="Person 3">
                        </div>
                        <p>Name 3</p>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer Section -->
        <footer class="footer">
           <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
        </footer>
    </body>
</html>
