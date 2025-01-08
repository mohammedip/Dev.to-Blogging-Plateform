<?php
use App\User;


require_once '../../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- Bootstrap CSS -->
    <link href="../pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../pages/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">

<?php  include '../pages/components/sidebar.php'; ?>

<div class="container" style="width: 50%;">
    <h2 class="text-center mb-4">Formulaire des Utilisateurs</h2>

    <!-- Form for creating, updating, and deleting users -->
    <form action="../../classes/User.php?function=update" method="POST">
        <div class="form-group mb-4">
            <label for="username">Username :</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
            <input type="text" class="form-control d-none" id="id" name="id">
        </div>
        <div class="form-group mb-4">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group mb-4">
            <label for="password_hash">Password :</label>
            <input type="password" class="form-control" id="password_hash" name="password_hash" placeholder="Enter password" required>
        </div>
        <div class="form-group mb-4">
            <label for="bio">Bio :</label>
            <textarea class="form-control" id="bio" name="bio" placeholder="Enter bio"></textarea>
        </div>
        <div class="form-group mb-4">
            <label for="profile_picture_url">Profile Picture URL :</label>
            <input type="text" class="form-control" id="profile_picture_url" name="profile_picture_url" placeholder="Enter profile picture URL">
        </div>
        <div class="form-group mb-4">
            <label for="role">Role :</label>
            <select class="form-control" id="role" name="role">
                <option value="user">User</option>
                <option value="auteur">Auteur</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <!-- Buttons centered -->
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning btn-lg mx-2" name="action" value="update">Update</button>
        </div>
    </form>
</div>
<?php
$user=User::getUser($_GET['id']);
foreach ($user as $user) {

    echo'
    <script>
    document.getElementById("username").value = "' . $user['username'] . '";
        document.getElementById("email").value = "' . $user['email'] . '";
        document.getElementById("bio").value = "' . $user['bio'] . '";
        document.getElementById("profile_picture_url").value = "' . $user['profile_picture_url'] . '";
        document.getElementById("role").value = "' . $user['role'] . '";
        document.getElementById("id").value = "' . $_GET['id'] . '";
    </script>
    ';
 }
?>
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
