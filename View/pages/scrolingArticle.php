<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use App\Article;
use App\Categorie;
require_once '../../vendor/autoload.php';

// Charger les catégories dynamiques
$categories = Categorie::getAllCategories();

if (isset($_GET['search'])) {
    if($_GET['search']==""){
        $articles = Article::getAllArticles();
    }else{
    $articles = Article::getArticleByCategory($_GET['search']);
    }
} else {
    $articles = Article::getAllArticles();
}
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
        .sidebar {
            height: 100vh;
            border-right: 1px solid #dee2e6;
        }
        .sidebar .list-group-item {
            border: none;
            padding: 10px 15px;
        }
        .sidebar .list-group-item:hover {
            background-color: #f8f9fa;
            font-weight: bold;
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
            <form  method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="search" class="form-control bg-light border-0 small ml-5" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="registre-btn">
                        <a class="btn btn-outline-light mr-2" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/register.php">Register</a>
                    </li>
                    <li class="nav-item" id="login-btn">
                        <a class="btn btn-outline-light mr-2" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/login.php">Log in</a>
                    </li>
                    <li class="nav-item" id="dashboard-btn">
                        <a class="btn btn-outline-light" href="http://localhost/Dev.to-Blogging-Plateform/index.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area with Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light sidebar py-4">
                <h5 class="mb-3">Categories</h5>
                <ul class="list-group">
                    <?php foreach ($categories as $category): ?>
                        <li class="list-group-item">
                            <a href="#" class="text-decoration-none text-dark">
                                <?= htmlspecialchars($category['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="container mt-5">
                    <h1 class="text-center mb-4">Latest Articles</h1>
                    <div class="row">
                        <?php if ($articles): ?>
                            <?php foreach ($articles as $article): ?>
                                <div class="col-md-4">
                                    <div class="card article-card">
                                        <img src="<?php echo $article['featured_image'] ?: 'https://via.placeholder.com/350x200'; ?>" class="card-img-top" alt="Article Image">
                                        <div class="card-body">
                                            <h5 class="card-title article-title"><?php echo htmlspecialchars($article['title']); ?></h5>
                                            <p class="card-text text-muted">
                                                <strong>Category:</strong> <?= htmlspecialchars($article['categorie']); ?><br>
                                                <strong>Author:</strong> <?= htmlspecialchars($article['auteurName']); ?>
                                            </p>
                                            <p class="card-text article-summary">
                                                <?php echo htmlspecialchars(substr($article['content'], 0, 150)) . '...'; ?>
                                            </p>
                                            <a href="../Forms/singleArticle.php?slug=<?php echo $article['article_slug']; ?>" class="btn btn-primary">Read More</a>
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
            </div>
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

    <!-- Session-Specific JS -->
    <?php 
    if (!isset($_SESSION['auth'])) {
        echo '<script>
        document.getElementById("dashboard-btn").classList.add("d-none");
        </script>';
    } else {
        echo '<script>
        document.getElementById("login-btn").classList.add("d-none");
        document.getElementById("registre-btn").classList.add("d-none");
        </script>';
    }
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
