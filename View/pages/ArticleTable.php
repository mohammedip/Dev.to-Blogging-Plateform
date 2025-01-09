<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use App\Article;

require_once '../../vendor/autoload.php';

if ($_SESSION['user']['role']=="user"){
    header("Location: ../View/pages/scrolingArticle.php");
}
if($_SESSION['user']['role']==='user'){
    header("Location: http://localhost/Dev.to-Blogging-Plateform/View/pages/scrolingArticle.php");
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template -->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="./vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php  include './components/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
              
                <?php include '../pages/components/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Article DataTables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>Title</th>
                                            <th>content</th>
                                            <th>category</th>
                                            <th>Tag</th>
                                            <th>status</th>
                                            <th>author</th>
                                            <th>scheduled_date</th>
                                            <th>created_at</th>
                                            <th>updated_at</th>
                                            <th>views</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <!-- <td>
                                         <span class="badge badge-primary badge-pill">' . $article['tags_name'] . '</span>
                                        </td> -->
                                        <?php  if($_SESSION['user']['role']=="auteur"){
                                            $articles=Article::getArticleByAuteur($_SESSION['user']['id']);
                                        }else{

                                            $articles=Article::getAllArticles();
                                        }
                                       foreach ($articles as $article) {

                                            $tags = explode(',', $article['tags_name']);
                                            

                                        echo '<tr>
                                        
                                        <td>' . $article['title'] . '</td>
                                        <td>' . $article['content'] . '</td>
                                        <td>' . $article['categorie'] . '</td>
                                        <td>';
                                       foreach($tags as $tag) {
                                          echo'  <span class="badge badge-primary mr-1">' . htmlspecialchars($tag) . '</span>';
                                       }
                                        echo'</td>
                                        <td>' . $article['status'] . '</td>
                                        <td>' . $article['auteurName'] . '</td>
                                        <td>' . $article['scheduled_date'] . '</td>
                                        <td>' . $article['created_at'] . '</td>
                                        <td>' . $article['updated_at'] . '</td>
                                        <td>' . $article['views'] . '</td>
                                        <td>
                                            <a href="../Forms/ArticleUpdate.php?id='.$article['articles_id'].'" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                                            <a href="../../classes/Article.php?function=delete&id='.$article['articles_id'].'" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            <a href="../Forms/singleArticle.php?id='.$article['articles_id'].'" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                   </tr>';
                                 
                                                
                                      }
                                        ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php  include './components/footer.php'; ?>
            <!-- End of Footer -->

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

    <!-- Bootstrap core JavaScript-->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./js/demo/datatables-demo.js"></script>

</body>

</html>