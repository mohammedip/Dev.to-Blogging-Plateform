<?php
use App\Categorie;


require_once '../../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">

<div class="container" style="width: 50%;">
    <h2 class="text-center mb-4">Formulaire des Catégories</h2>

    <!-- Form for creating, updating, and deleting categories -->
    <form action="../../classes/Categorie.php?function=update" method="POST">
        <div class="form-group mb-4">
            <label for="name">Category Name :</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
            <input type="text" class="form-control d-none" id="id" name="id"  >
        </div>

        <!-- Buttons centered -->
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning btn-lg mx-2" name="action" value="update">Update</button>
        </div>
    </form>
</div>
<?php
$categorie=Categorie::getCategorie($_GET['id']);
foreach ($categorie as $categorie) {

    echo'
    <script>
    document.getElementById("name").value="'.$categorie['name'].'"
    document.getElementById("id").value="'.$_GET['id'].'"
    </script>
    ';
 }
?>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
