<?php
// Connect to the database
$db_host = 'localhost';
$db_name = 'Marcus';
$db_user = 'anonymous_posting';
$db_pass = 'GodisGood01';
$db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// Get the posts from the database
$stmt = $db_conn->prepare("SELECT * FROM posts");
$stmt->execute();
$posts = $stmt->fetchAll();

// Display the posts on the page
foreach ($posts as $post) {
    echo '<div class="post">';
    echo '<h2>' . $post['title'] . '</h2>';
    echo '<p>' . $post['content'] . '</p>';
    echo '<p class="creation-time">' . $post['creation_time'] . '</p>';
    echo '</div>';
}
?>