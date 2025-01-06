<?php

use App\Categorie;


require_once '../../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">

<div class="container" style="width: 50%;">
    <h2 class="text-center mb-4">Formulaire des Articles</h2>

    <!-- Form for creating, updating, and deleting articles -->
    <form action="../../classes/Article.php" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-4">
            <label for="title">Title :</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter article title" required>
        </div>

        <div class="form-group mb-4">
            <label for="slug">Slug :</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter article slug" required>
        </div>

        <div class="form-group mb-4">
            <label for="content">Content :</label>
            <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter article content" required></textarea>
        </div>

        <div class="form-group mb-4">
            <label for="category_id">Category :</label>
            <select class="form-control" id="category_id" name="category_id" required>
            <option value="" disabled selected hidden>Select category</option>
                <?php $categories=Categorie::getAllCategories();
                                        
                                        foreach ($categories as $categorie) {

                                            echo'<option value="'.$categorie['id'].'">'.$categorie['name'].'</option>';
                                        } ?>
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="featured_image">Featured Image :</label>
            <input type="file" class="form-control-file" id="featured_image" name="featured_image">
        </div>

        <div class="form-group mb-4">
            <label for="scheduled_date">Scheduled Date :</label>
            <input type="datetime-local" class="form-control" id="scheduled_date" name="scheduled_date">
        </div>

        <!-- <div class="form-group mb-4">
            <label for="author_id">Author :</label>
            <select class="form-control" id="author_id" name="author_id" required>
                <option value="draft">Draft</option>
            </select>
        </div> -->

        <!-- Buttons centered -->
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning btn-lg mx-2" name="action" value="update">Update</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
