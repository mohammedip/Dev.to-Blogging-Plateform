

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <!-- Centered Container -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <!-- Login Card -->
        <div class="card o-hidden border-0 shadow-lg" style="width: 100%; max-width: 400px;">
            <div class="card-body p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                <form class="user" action="../../classes/User.php?function=logIn" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password_hash" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div id="error-message" class="alert alert-danger d-none" role="alert">
                        Password or email is incorrect.
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                    
                </form>
                <hr>
                
                <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                </div>
            </div>
        </div>
    </div>
    <?php

if (isset($_GET['logIn']) && $_GET['logIn'] == 'erreur') {
    echo "<script>
        document.getElementById('error-message').classList.remove('d-none');
    </script>";
}
?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
