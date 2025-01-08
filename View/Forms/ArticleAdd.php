<?php

use App\Categorie;
use App\User;
use App\Tag;

require_once '../../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <!-- Bootstrap CSS -->
    <link href="../pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../pages/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="" style="min-height: 100vh;">
<div id="wrapper">

    <!-- Sidebar -->
    <?php include '../pages/components/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" >

            <!-- Topbar -->
            <?php include '../pages/components/topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid" style="width: 50%;">

                <!-- Page Heading -->
                <div class="header-container d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 mt-4 text-gray-800">Formulaire des Articles</h1>
                </div>

                <!-- Article Form Card -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Créer un Article</h6>
                    </div>
                    <div class="card-body">
                        <!-- Form for creating articles -->
                        <form action="../../classes/Article.php?function=add" method="POST" enctype="multipart/form-data">
                            
                            <!-- Title input -->
                            <div class="form-group mb-4">
                                <label for="title">Titre de l'article :</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Entrez le titre de l'article" required>
                            </div>

                            <!-- Content input -->
                            <div class="form-group mb-4">
                                <label for="content">Contenu de l'article :</label>
                                <textarea class="form-control" id="content" name="content" rows="4" placeholder="Entrez le contenu de l'article" required></textarea>
                            </div>

                            <!-- Author ID input -->
                            <div class="form-group mb-4">
                                <label for="author_id">Auteur :</label>
                                <select class="form-control" id="author_id" name="author_id" required>
                                    <option value="" disabled selected hidden>Sélectionner l'auteur</option>
                                    <?php
                                        $auteurs = User::getAuteurs();
                                        foreach ($auteurs as $auteur) {
                                            echo '<option value="' . $auteur['id'] . '">' . $auteur['username'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <!-- Category selection -->
                            <div class="form-group mb-4">
                                <label for="category_id">Catégorie :</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <option value="" disabled selected hidden>Sélectionner une catégorie</option>
                                    <?php
                                        $categories = Categorie::getAllCategories();
                                        foreach ($categories as $categorie) {
                                            echo '<option value="' . $categorie['id'] . '">' . $categorie['name'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <!-- Tags selection -->
                            <div class="mb-3">
                                <label class="form-label">Tags :</label>
                                <div class="form-check">
                                    <?php
                                        $tags = Tag::getAllTags();
                                        foreach ($tags as $tag): ?>
                                            <div class="mb-2">
                                                <input class="form-check-input" type="checkbox" 
                                                    id="tag_<?php echo $tag['id']; ?>" 
                                                    name="tag_id[]" 
                                                    value="<?php echo $tag['id']; ?>"
                                                    <?php echo (isset($_POST['tag_id']) && in_array($tag['id'], $_POST['tag_id'])) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="tag_<?php echo $tag['id']; ?>">
                                                    <?php echo htmlspecialchars($tag['name']); ?>
                                                </label>
                                            </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Featured image input -->
                            <div class="form-group mb-4">
                                <label for="featured_image">Image en vedette :</label>
                                <input type="file" class="form-control-file" id="featured_image" name="featured_image">
                            </div>

                            <!-- Scheduled date input -->
                            <div class="form-group mb-4">
                                <label for="scheduled_date">Date de planification :</label>
                                <input type="datetime-local" class="form-control" id="scheduled_date" name="scheduled_date">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg mx-2" name="action" value="create">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include '../pages/components/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/login.php">Logout</a>
            </div>
        </div>
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
