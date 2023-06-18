<!DOCTYPE html>
<html>
<head>
  <title>Social Media Links and Blog</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">

    <div class="blog-post">
      <h2>Welcome!</h2>
      <p>Hello, this is Amy! Welcome to my blog!</p>
      <p>I will try to update this everyday!</p>
      <p>Also sorry this website looks dated, I love that look.</p>
      <p>Anyway, byeeeee!! -Love, Amy!</p>
	  
    <h2>Comments</h2>
    <div id="comments-container">
      <?php
      // Fetch comments from the server
      $comments = json_decode(file_get_contents('api/comments.php'));

      if (!empty($comments)) {
          foreach ($comments as $comment) {
              echo '<div class="comment">';
              echo '<div class="comment-info"><strong>' . $comment->name . '</strong></div>';
              echo '<div class="comment-text">' . $comment->comment . '</div>';
              echo '</div>';
          }
      } else {
          echo 'No comments yet.';
      }
      ?>
    </div>

    <h3>Add a Comment</h3>
    <form id="comment-form" action="api/comments.php" method="POST">
      <input type="text" name="name" placeholder="Name" required>
      <textarea name="comment" placeholder="Your comment" required></textarea>
      <button type="submit">Submit Comment</button>
    </form>
  </div>
 
    </div>
  </div>
</body>
</html>