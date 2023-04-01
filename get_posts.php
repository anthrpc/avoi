<?php

// Connect to the database
$conn = new mysqli("localhost", "Marcus", "GodisGood01", "anonymous_posting");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Calculate the date and time one week ago
$oneWeekAgoDateTime = date('Y-m-d H:i:s', strtotime('-1 week'));

// Query the database for all posts within the past week
$sql = "SELECT * FROM posts WHERE created_at >= '$oneWeekAgoDateTime' ORDER BY id DESC";
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Error retrieving posts: " . $conn->error);
}

// Create an array to hold the posts
$posts = array();

// Loop through the result set and add each post to the array
while ($row = $result->fetch_assoc()) {
    // Get the creation time in a readable format
    $creation_time = date("F j, Y, g:i a", strtotime($row["created_at"]));
    $post = array(
        "id" => $row["id"],
        "title" => $row["title"],
        "content" => $row["content"],
        "creation_time" => $creation_time
    );
    $posts[] = $post;
}

// Convert the array to JSON and output it
echo json_encode($posts);

// Close the database connection
$conn->close();
?>