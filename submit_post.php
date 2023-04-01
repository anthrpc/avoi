<?php

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connect to the database
    $conn = new mysqli("localhost", "Marcus", "GodisGood01", "anonymous_posting");

    // Check for errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the post data from the form
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Prepare and execute the query to insert the post data into the database
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect the user back to the index page
    header("Location: index.php");
    exit();
}