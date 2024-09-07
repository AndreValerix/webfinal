<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "recipe_website");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to delete a recipe.";
    exit();
}

if (isset($_POST['recipe_id']) && is_numeric($_POST['recipe_id'])) {
    $recipe_id = intval($_POST['recipe_id']);

    // Debugging: Output recipe ID
    echo "Recipe ID: " . $recipe_id . "<br>";

    // Check if the recipe exists
    $checkQuery = "SELECT id FROM recipes WHERE id = ?";
    $stmt = $mysqli->prepare($checkQuery);
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Recipe exists, proceed with deletion
        $deleteQuery = "DELETE FROM recipes WHERE id = ?";
        $stmt = $mysqli->prepare($deleteQuery);
        $stmt->bind_param("i", $recipe_id);

        if ($stmt->execute()) {
            // Redirect to home page after successful deletion
            header("Location: home.php");
            exit();
        } else {
            echo "Error deleting recipe.";
        }
    } else {
        echo "Invalid recipe ID.";
    }

    $stmt->close();
} else {
    echo "Invalid recipe ID.";
}

$mysqli->close();
?>
