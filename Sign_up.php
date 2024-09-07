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
    $confirm_password = trim($_POST['confirm_password']);

    // Validate the inputs
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }
    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    // If no errors, proceed to insert into the database
    if (empty($errors)) {
        // Hash the password for security
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Check if username already exists
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $errors[] = 'Username already exists.';
        } else {
            // Insert user into the database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";

            if ($conn->query($sql) === TRUE) {
                // Get the user's ID and log them in
                $user_id = $conn->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;

                // Redirect to the home page
                header("Location: home.php");
                exit();
            } else {
                $errors[] = 'Error: ' . $conn->error;
            }
        }
    }
}

$conn->close();

// Retrieve message from query string
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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

    <!-- Sign Up Form -->
    <div class="signup-container">
        <h1>Sign Up</h1>
        <?php if (!empty($message)) : ?>
            <div class="message">
                <p><?php echo $message; ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($errors)) : ?>
            <div class="errors">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="Sign_up.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="Log_in.php">Log In</a></p>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
    </footer>
</body>
</html>
