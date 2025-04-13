<?php
// Database Connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'story';
$con = mysqli_connect($host, $user, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #a855f7;
            --primary-dark: #7e22ce;
            --dark: #111827;
            --light: #f3f4f6;
            --danger: #ef4444;
            --success: #10b981;
            --gray: #6b7280;
            --dark-bg: #030712;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-bg);
            color: #e5e7eb;
            background-image: 
                radial-gradient(at 80% 0%, hsla(189, 100%, 56%, 0.1) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355, 100%, 93%, 0.1) 0px, transparent 50%);
        }

        .navbar {
            background-color: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(168, 85, 247, 0.2);
        }

        .navbar-brand {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.5rem;
        }

        .fixed-size-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 16px;
            border: 1px solid rgba(168, 85, 247, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
        }

        .story-container {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2.5rem;
            border: 1px solid rgba(168, 85, 247, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            margin: 2rem auto;
            max-width: 800px;
        }

        .story-text p {
            color: #e5e7eb;
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .comment-section {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid rgba(168, 85, 247, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            margin: 2rem auto;
            max-width: 800px;
        }

        .form-control {
            background-color: rgba(31, 41, 55, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #e5e7eb;
        }

        .form-control:focus {
            background-color: rgba(31, 41, 55, 0.8);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.2);
            color: #e5e7eb;
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }

        .list-group-item {
            background-color: rgba(31, 41, 55, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #e5e7eb;
            margin-bottom: 1rem;
            border-radius: 8px;
        }

        footer {
            background-color: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: var(--gray);
            padding: 2rem 0;
            margin-top: 4rem;
            border-top: 1px solid rgba(168, 85, 247, 0.2);
        }

        h4, h5 {
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .error-message {
            color: var(--danger);
            background-color: rgba(239, 68, 68, 0.1);
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-bolt"></i> PowerCare</a>
        </div>
    </nav>

    <?php
    if (isset($_GET['story_id'])) {
        $story_id = intval($_GET['story_id']);

        $sql = "SELECT * FROM user WHERE user_id = $story_id";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_problem = $row['user_problem'];
            $user_images_json = $row['user_images'];
            $user_images = json_decode($user_images_json, true);

            $lines = preg_split('/\r\n|\r|\n/', $user_problem);
            $first_5_paragraphs = array_slice($lines, 0, 5);
            $remaining_paragraphs = array_slice($lines, 5);

            // Show the first image if available
            if (!empty($user_images[0])) {
                echo '<div class="container story-container">
                        <img src="' . $user_images[0] . '" class="fixed-size-img" alt="Story Image">
                        <div class="story-text">';

                foreach ($first_5_paragraphs as $paragraph) {
                    echo '<p>' . nl2br(htmlspecialchars($paragraph)) . '</p>';
                }

                echo '</div></div>';
            }

            // Show the second image and remaining paragraphs if available
            if (isset($user_images[1]) && !empty($user_images[1])) {
                echo '<div class="container story-container">
                        <img src="' . $user_images[1] . '" class="fixed-size-img" alt="Story Image">
                        <div class="story-text">';

                foreach ($remaining_paragraphs as $paragraph) {
                    echo '<p>' . nl2br(htmlspecialchars($paragraph)) . '</p>';
                }

                echo '</div></div>';
            } elseif (!empty($remaining_paragraphs)) {
                echo '<div class="container story-container">
                        <div class="story-text">';
                foreach ($remaining_paragraphs as $paragraph) {
                    echo '<p>' . nl2br(htmlspecialchars($paragraph)) . '</p>';
                }
                echo '</div></div>';
            }
        } else {
            echo "<div class='container story-container error-message'><p>Story not found!</p></div>";
        }
    } else {
        echo "<div class='container story-container error-message'><p>Invalid request!</p></div>";
    }
    ?>

    <!-- Comment Section -->
    <div class="container comment-section">
        <h4><i class="fas fa-comments"></i> Leave a Comment</h4>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
                <textarea name="comment" class="form-control" placeholder="Write your comment here..." rows="3" required></textarea>
            </div>
            <button type="submit" name="submit_comment" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Submit Comment
            </button>
        </form>
    </div>

    <?php
    // Handle comment submission
    if (isset($_POST['submit_comment'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $comment = mysqli_real_escape_string($con, $_POST['comment']);

        $insert_sql = "INSERT INTO comments (story_id, username, comment) VALUES ('$story_id', '$username', '$comment')";
        mysqli_query($con, $insert_sql);

        // Refresh to show the comment
        echo "<meta http-equiv='refresh' content='0'>";
    }

    // Fetch and display comments
    if (isset($story_id)) {
        $comment_sql = "SELECT * FROM comments WHERE story_id = $story_id ORDER BY created_at DESC";
        $comment_result = mysqli_query($con, $comment_sql);

        if (mysqli_num_rows($comment_result) > 0) {
            echo "<div class='container comment-section'><h5><i class='fas fa-comment-dots'></i> Comments</h5><ul class='list-group'>";
            while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                echo "<li class='list-group-item'><strong>" . htmlspecialchars($comment_row['username']) . ":</strong> " . htmlspecialchars($comment_row['comment']) . "</li>";
            }
            echo "</ul></div>";
        } else {
            echo "<div class='container comment-section'><p>No comments yet. Be the first to comment!</p></div>";
        }
    }
    ?>

    <!-- Footer -->
    <footer class="text-center py-4">
        <div class="container">
            <p>&copy; 2025 PowerCare. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
