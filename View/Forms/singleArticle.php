<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use App\Categorie;
use App\Article;
use App\Tag;

require_once '../../vendor/autoload.php';

Article::updateView($_GET['slug']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Article</title>

    <!-- Bootstrap CSS -->
    <link href="../pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../pages/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px; /* Fixed width for sidebar */
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            position: fixed;
            height: 100%;
            left: 0;
        }

        .main-content {
            margin: 0 auto; 
            padding: 20px;
            max-width: 700px; 
            flex: 1; 
        }

        .article-card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            padding: 30px;
            margin-top: 30px;
            width: 100%; 
        }


        .article-header {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .article-meta {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .article-meta span {
            margin-right: 15px;
        }

        .article-content {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 20px;
            

        }

        .article-image {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .category {
            font-size: 16px;
            background-color: #f8f9fc;
            color: #4e73df;
            padding: 8px 20px;
            border-radius: 20px;
            display: inline-block;
        }

        .status {
            font-size: 16px;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            margin-left: 10px;
        }

        .status.draft {
            background-color: #f39c12;
        }

        .status.published {
            background-color: #28a745;
        }

        .status.scheduled {
            background-color: #007bff;
        }

        .back-button {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4e73df;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #375a8c;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <?php
        if(isset($_SESSION['user']) && ($_SESSION['user']['role']==='admin' || $_SESSION['user']['role']==='auteur')){
            include '../pages/components/sidebar.php';
            
         }
        ?>


    <!-- Main Content -->
    <div class="main-content ">
        <?php
        $article = Article::getArticle($_GET['slug']);
        foreach ($article as $article) {
        ?>
        <div class="article-card">
              <!-- Article Featured Image -->
              <?php if ($article['featured_image']) { ?>
            <img src="<?php echo $article['featured_image']; ?>" alt="Featured Image" class="article-image" width="500">
            <?php } ?>
            <!-- Article Title -->
            <div class="article-header"><?php echo htmlspecialchars($article['title']); ?></div>

            <!-- Article Meta -->
            <div class="article-meta">
                <span><strong>Author:</strong> <?php echo htmlspecialchars($article['auteurName']); ?></span>
                <span><strong>Category:</strong> <?php
                    echo htmlspecialchars($article['categorie']);
                ?></span>
                <span><strong>Scheduled Date:</strong> <?php echo $article['scheduled_date']; ?></span>
            </div>

            <!-- Article Content -->
            <div class="article-content">
                <?php echo nl2br(htmlspecialchars($article['content'])); ?>
            </div>
            <!-- Article Status -->
            <div class="article-meta">
                <span class="category"><?php echo htmlspecialchars($article['categorie']); ?></span>
                <span class="status <?php echo $article['status']; ?>">
                    <?php echo ucfirst($article['status']); ?>
                </span>
            </div>

            <!-- Tags -->

            <div class="article-meta">
                <?php 
                $tags = Tag::getAllTags(); 
                $articleTags = Article::getArticle($_GET['slug']); 
                $articleTagNames = explode(',', $articleTags[0]['tags_name']);
                
                foreach ($tags as $tag): ?>
                    <?php if (in_array($tag['name'], $articleTagNames)): ?>
                        <span class="badge border rounded-pill p-2 me-2 <?php echo in_array($tag['name'], $articleTagNames) ? 'bg-success text-white' : 'bg-light text-primary'; ?>">
                            <?php echo htmlspecialchars($tag['name']); ?>
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>




        <!-- Back Button -->
        <a href="../pages/scrolingArticle.php" class="back-button" id="back_button">Back to the Home page</a>
        <?php
        }
        ?>
  
</div>

<!-- Bootstrap JS and dependencies -->
<script src="../pages/vendor/jquery/jquery.min.js"></script>
<script src="../pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../pages/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../pages/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../pages/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../pages/js/demo/datatables-demo.js"></script>

</body>
</html>
