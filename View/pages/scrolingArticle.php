<?php
use App\Article;
require_once '../../vendor/autoload.php';
$articles = Article::getAllArticles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Hub</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Optional custom styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            padding: 0.8rem 1rem;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .navbar-nav .nav-item .nav-link {
            color: #fff;
            font-weight: 600;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #ffd700;
        }
        .article-card {
            border: none;
            border-radius: 10px;
            margin-bottom: 30px;
            transition: transform 0.3s;
        }
        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .article-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }
        .article-summary {
            font-size: 1rem;
            color: #555;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }
        .footer a {
            color: #ffd700;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../pages/img/dev-letter-logo-design-in-illustration-logo-calligraphy-designs-for-logo-poster-invitation-etc-vector-removebg-preview.png" alt="Logo"/>
                Dev.to Blogging
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-light mr-2" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="#">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Latest Articles</h1>

        <!-- Article List -->
        <div class="row">
            <?php if ($articles): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="col-md-4">
                        <div class="card article-card">
                            <!-- Article Image -->
                            <img src="<?php echo $article['featured_image'] ?: 'https://via.placeholder.com/350x200'; ?>" class="card-img-top" alt="Article Image">
                            <div class="card-body">
                                <h5 class="card-title article-title"><?php echo htmlspecialchars($article['title']); ?></h5>
                                <p class="card-text article-summary">
                                    <?php echo htmlspecialchars(substr($article['content'], 0, 150)) . '...'; ?>
                                </p>
                                <a href="article.php?slug=<?php echo $article['article_slug']; ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p>No articles found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <div class="copyright">
                <span>&copy; <?php echo date('Y'); ?> DevBlog. All Rights Reserved.</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
