<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../pages/img/dev-letter-logo-design-in-illustration-logo-calligraphy-designs-for-logo-poster-invitation-etc-vector-removebg-preview.png" alt="Logo" width="70"/>
                Dev.to Blogging
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item" id="dashboard-btn">
                        <a class="btn btn-outline-light" href="http://localhost/Dev.to-Blogging-Plateform/View/pages/scrolingArticle.php">Home page</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Centered Container -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <!-- Registration Card -->
        <div class="card o-hidden border-0 shadow-lg" style="width: 100%; max-width: 500px;">
            <div class="card-body p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" action="../../classes/User.php?function=registre" method="POST">
                    <!-- Username Field -->
                    <div class="form-group mb-3">
                        <input type="text" name="username" class="form-control form-control-user" id="exampleUsername" placeholder="Username" required>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                    </div>

                    <!-- Password and Confirm Password -->
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="password_hash" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <!-- Bio (Textarea for a longer description) -->
                    <div class="form-group mb-3">
                        <textarea class="form-control form-control-user square-border" id="exampleBio" name="bio" placeholder="Bio" rows="3"></textarea>
                    </div>

                    <!-- Profile Picture URL -->
                    <div class="form-group mb-3">
                        <input type="text" name="profile_picture_url" class="form-control form-control-user" id="exampleProfilePic" placeholder="Profile Picture URL">
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="btn btn-primary btn-user btn-block" >
                        Register Account
                    </button>

                </form>

                <hr>
                
                <div class="text-center">
                    <a class="small" href="login.php">Already have an account? Login!</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
