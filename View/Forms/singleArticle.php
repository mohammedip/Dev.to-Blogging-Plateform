<?php
use App\Categorie;
use App\Article;

require_once '../../vendor/autoload.php';
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
            margin-left: 250px; /* Ensure content doesn't overlap the sidebar */
            padding: 20px;
            flex: 1; /* Takes up remaining space */
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
    <?php include '../pages/components/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <?php
        // Fetch the article data using the ID from the URL
        $article = Article::getArticle($_GET['id']);
        foreach ($article as $article) {
        ?>
        <div class="article-card">
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

            <!-- Article Featured Image -->
            <?php if ($article['featured_image']) { ?>
            <img src="<?php echo $article['featured_image']; ?>" alt="Featured Image" class="article-image">
            <?php } ?>

            <!-- Article Status -->
            <div class="article-meta">
                <span class="category"><?php echo htmlspecialchars($article['categorie']); ?></span>
                <span class="status <?php echo $article['status']; ?>">
                    <?php echo ucfirst($article['status']); ?>
                </span>
            </div>
        </div>

        <!-- Back Button -->
        <a href="../pages/ArticleTable.php" class="back-button">Back to Articles List</a>

        <?php
        }
        ?>
    </div>
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
