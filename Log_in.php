<?php
session_start();

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'recipe_website');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate the inputs
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    // If no errors, proceed to check the user in the database
    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Log the user in
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redirect to the home page
                header("Location: home.php");
                exit();
            } else {
                $errors[] = 'Invalid username or password.';
            }
        } else {
            $errors[] = 'Invalid username or password.';
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <!-- Navbar -->
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

    <!-- Log In Form -->
    <div class="login-container">
        <h1>Log In</h1>
        <?php if (!empty($errors)) : ?>
            <div class="errors">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="Log_in.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
    </footer>
</body>
</html>
