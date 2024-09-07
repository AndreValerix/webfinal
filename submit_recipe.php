<?php
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $title = $conn->real_escape_string($_POST['recipe_title']);
    $ingredients = $conn->real_escape_string($_POST['ingredients']);
    $steps = $conn->real_escape_string($_POST['steps']);

    // Handle file upload
    $image = $_FILES['recipe_image']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($image);

    // Check if uploads directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES['recipe_image']['tmp_name'], $target_file)) {
        // File successfully uploaded
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }

    // Insert data into database
    $sql = "INSERT INTO recipes (title, image, ingredients, steps) VALUES ('$title', '$image', '$ingredients', '$steps')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to home page after successful upload
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
