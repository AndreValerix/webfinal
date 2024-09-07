<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $mysqli = new mysqli("localhost", "root", "", "recipe_website");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Process form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $steps = $_POST['steps'] ?? ''; // Use an empty string if steps are not provided

    // Handle file upload
    $image = null; // Initialize image variable

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode('.', $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $allowedExts = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedExts)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $newFileName;
            
            // Ensure the upload directory exists
            if (!file_exists($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true); // Create directory if it doesn't exist
            }

            // Move the uploaded file
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $image = $newFileName;
            } else {
                echo "Error moving the uploaded file.";
                exit;
            }
        } else {
            echo "Invalid file type.";
            exit;
        }
    }

    // Insert recipe into the database
    $stmt = $mysqli->prepare("INSERT INTO recipes (title, description, image, ingredients, instructions) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $description, $image, $ingredients, $steps);

    if ($stmt->execute()) {
        // Redirect to home.php after successful upload
        header("Location: home.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Recipe</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="home.php#videos-section">Videos</a></li>
                <li><a href="home.php#recipes-section">Recipes</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                <li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <?php else : ?>
                <li><a href="Sign_up.php">Sign Up</a></li>
                <li><a href="Log_in.php">Log In</a></li>
                <?php endif; ?>
            </ul>
    </nav>

    <!-- Upload Recipe Form -->
    <section class="upload-recipe">
        <h1>Upload Your Recipe</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="title">Recipe Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="image">Recipe Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Upload Recipe</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Delicious Recipes. All Rights Reserved.</p>
    </footer>
</body>
</html>
