<?php

$username = $_SESSION['user']['username'] ;
$userId = $_SESSION['user']['id'] ;
$userRole = $_SESSION['user']['role'] ;

?>

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" id="brand" href="http://localhost/Dev.to-Blogging-Plateform/index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-blog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DevBlog Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" id="divider1">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" id="dashboard">
                <a class="nav-link" href="http://localhost/Dev.to-Blogging-Plateform/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/scrolingArticle.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home page</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Content Management
            </div>

            <!-- Nav Item - Articles Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArticles"
                    aria-expanded="true" aria-controls="collapseArticles">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Articles</span>
                </a>
                <div id="collapseArticles" class="collapse" aria-labelledby="headingArticles" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Article Management:</h6>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/ArticleTable.php">View All Articles</a>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/Forms/ArticleAdd.php">Add New Article</a>
                        <a class="collapse-item" id="articleDrafte" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/ArticleDraft.php">Draft</a>
                       
                       
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Categories -->
            <li class="nav-item" id="nav-item-category">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                    aria-expanded="true" aria-controls="collapseCategories">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Categories</span>
                </a>
                <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Category Management:</h6>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/CategorieTable.php">View All Categories</a>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/Forms/CategorieAdd.php">Add New Category</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tags -->
            <li class="nav-item" id="nav-item-tag">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTags"
                    aria-expanded="true" aria-controls="collapseTags">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Tags</span>
                </a>
                <div id="collapseTags" class="collapse" aria-labelledby="headingTags" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tag Management:</h6>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/TagTable.php">View All Tags</a>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/Forms/TagAdd.php">Add New Tag</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User Management
            </div>

            <!-- Nav Item - Authors -->
            <li class="nav-item" id="nav-item-user">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuthors"
                    aria-expanded="true" aria-controls="collapseAuthors">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseAuthors" class="collapse" aria-labelledby="headingAuthors" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Management:</h6>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/UserTable.php">View All Users</a>
                        <a class="collapse-item" href="http://localhost/Dev.to-Blogging-Plateform/View/Forms/UserAdd.php">Add New Users</a>
                    
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" id="divider4">

            <!-- Nav Item - Your Profile -->
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/profile.php?id=<?php echo $userId ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Your Profile</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

<?php if($userRole==='auteur'){

echo '<script>
document.getElementById("nav-item-category").classList.add("d-none");
document.getElementById("nav-item-tag").classList.add("d-none");
document.getElementById("nav-item-user").classList.add("d-none");
document.getElementById("divider4").classList.add("d-none");
document.getElementById("articleDrafte").classList.add("d-none");
document.getElementById("divider1").classList.add("d-none");
document.getElementById("brand").href="#";
document.getElementById("dashboard").classList.add("d-none");


</script>';
}
?>