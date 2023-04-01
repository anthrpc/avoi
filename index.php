<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Anonymous Posting Website</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
  <link rel="shortcut icon" href="avoi.png" type="image/x-icon">
</head>

<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">
      Anonymous Posting Website
    </h1>
    <div class="flex justify-center">
      <form action="submit_post.php" method="POST" class="w-full max-w-lg">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
              Title
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="title" name="title" type="text" placeholder="Enter post title">
          </div>
          <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">
              Content
            </label>
            <textarea
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="content" name="content" rows="8" placeholder="Enter post content"></textarea>
          </div>
          <div class="w-full px-3">
            <button
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit">
              Post
            </button>
          </div>
        </div>
      </form>
    </div>
    <hr class="my-8">
    <div id="posts" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
    <button id="load-more-button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4"
      style="display:none;">Load More</button>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="main.js"></script>
</body>

</html>
