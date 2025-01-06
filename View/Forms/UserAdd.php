<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">

<div class="container" style="width: 50%;">
    <h2 class="text-center mb-4">Formulaire des Utilisateurs</h2>

    <!-- Form for creating, updating, and deleting users -->
    <form action="../../classes/User.php" method="POST">
        <div class="form-group mb-4">
            <label for="username">Username :</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
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
            <button type="submit" class="btn btn-primary btn-lg mx-2" name="action" value="create">Add</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
