// Get the posts from the server and display them on the page
fetch('get_posts.php')
  .then(response => response.json())
  .then(posts => {
    const postsDiv = document.getElementById('posts');
    const maxPosts = 3; // Set the maximum number of posts to show
    for (let i = 0; i < Math.min(posts.length, maxPosts); i++) {
      const post = posts[i];
      const postDiv = document.createElement('div');
      postDiv.className = 'bg-white rounded-lg shadow-lg p-6 mb-6';
      const titleElem = document.createElement('h2');
      titleElem.className = 'text-lg font-bold';
      titleElem.textContent = post.title;
      postDiv.appendChild(titleElem);
      const contentElem = document.createElement('p');
      contentElem.className = 'text-gray-700';
      const maxChar = 200; // Set the maximum number of characters to show
      if (post.content.length > maxChar) {
        const shortContent = post.content.substring(0, maxChar) + '...'; // Shorten the content
        const shortContentElem = document.createElement('span');
        shortContentElem.textContent = shortContent;
        contentElem.appendChild(shortContentElem);
        const viewMoreElem = document.createElement('a');
        viewMoreElem.textContent = 'View More';
        viewMoreElem.className = 'text-blue-500 hover:underline cursor-pointer';
        viewMoreElem.onclick = () => {
          contentElem.removeChild(shortContentElem);
          contentElem.removeChild(viewMoreElem);
          const fullContentElem = document.createElement('span');
          fullContentElem.textContent = post.content;
          contentElem.appendChild(fullContentElem);
        };
        contentElem.appendChild(viewMoreElem);
      } else {
        contentElem.textContent = post.content;
      }
      postDiv.appendChild(contentElem);
      const timeElem = document.createElement('p');
      timeElem.className = 'text-sm text-gray-500 mt-2';
      timeElem.textContent = post.creation_time;
      postDiv.appendChild(timeElem);
      postsDiv.appendChild(postDiv);
    }
    if (posts.length > maxPosts) {
      const viewAllElem = document.createElement('button');
      viewAllElem.textContent = 'View All Recent Posts';
      viewAllElem.className = 'bg-blue-500 text-white py-2 px-4 rounded-lg mt-6';
      viewAllElem.onclick = () => {
        // Redirect to the page that displays all recent posts
        window.location.href = 'all_posts.php';
      };
      postsDiv.appendChild(viewAllElem);
    }
  });