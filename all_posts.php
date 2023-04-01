<!DOCTYPE html>
<html>

<head>
    <title>Social Media App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .post {
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 2rem 0;
            padding: 1.5rem;
        }

        .post h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .post p {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .post .creation-time {
            font-style: italic;
            font-size: 0.8rem;
            color: #888;
        }
    </style>
</head>

<body>
    <h1>Recent Posts</h1>
    <div id="posts-container">
        <!-- Posts will be dynamically added here using JavaScript -->
    </div>
    <script>
        // Retrieve the posts from the server and display them on the page
        fetch('get_posts.php')
            .then(response => response.json())
            .then(posts => {
                const postsContainer = document.getElementById('posts-container');
                for (let post of posts) {
                    const postDiv = document.createElement('div');
                    postDiv.className = 'post';
                    postDiv.innerHTML = `
                        <h2>${post.title}</h2>
                        <p>${post.content}</p>
                        <p class="creation-time">${post.creation_time}</p>
                    `;
                    postsContainer.appendChild(postDiv);
                }
            })
            .catch(error => console.error(error));
    </script>
</body>

</html>