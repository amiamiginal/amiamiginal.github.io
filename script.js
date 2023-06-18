// Get all social media icons
const socialIcons = document.querySelectorAll('.social-links img');

// Add event listener to each icon
socialIcons.forEach(icon => {
  icon.addEventListener('mouseover', () => {
    icon.classList.add('animate-budge');
  });

  icon.addEventListener('mouseout', () => {
    icon.classList.remove('animate-budge');
  });
});

// Handle comment submission
document.getElementById('comment-form').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get user input values
  const nameInput = document.getElementById('name-input');
  const commentInput = document.getElementById('comment-input');
  const name = nameInput.value.trim();
  const comment = commentInput.value.trim();

  if (name === '' || comment === '') {
    return;
  }

  // Create new comment element
  const commentElement = document.createElement('div');
  commentElement.classList.add('comment');
  commentElement.innerHTML = `
    <div class="comment-info">
      <strong>${name}</strong>
    </div>
    <div class="comment-text">
      ${comment}
    </div>
  `;

  // Append the new comment to the comments container
  const commentsContainer = document.getElementById('comments-container');
  commentsContainer.appendChild(commentElement);

  // Clear the comment form inputs
  nameInput.value = '';
  commentInput.value = '';
});
