<?php
    require_once 'db/DataBase.php';
    require_once 'library/Format.php';
    require_once 'library/Session.php';
    Session::checkLogin();

    $dao =  new DataBase();
    if (isset($_POST['connexion']) && !empty($_POST['connexion'])){

        $email = strtolower($_POST['email']);
        $password = strtolower($_POST['password']);

        $value = $dao->loginAdmin($email,$password);


        if($value){
            Session::set("adminLogin",true);
            Session::set("adminId",$value->id);
            Session::set("adminNom",$value->nom);
            Session::set("adminPrenom",$value->postnom);
            header("Location:admin/index.php");
        }

    }

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap5.0.min.css">
    <link rel="stylesheet" href="css/style-login.css">
<!--    <link rel="stylesheet" href="css/bootstrap-icons.css">-->
    <title>Login</title>
</head>
<body>

<!-- blue circle background -->
<div class="d-none d-md-block ball login bg-primary bg-gradient position-absolute rounded-circle"></div>
<!-- Login Section -->
<div class="container login__form active">
    <div class="row vh-100 w-100 align-self-center">
        <div class="col-12 col-lg-6 col-xl-6 px-5">
            <div class="row vh-100">
                <div class="col align-self-center p-5 w-100">
                    <h3 class="fw-bolder">BIENVENUE !</h3>
                    <p class="fw-lighter fs-6">Veuillez saisir vos information,</p>
                    <!-- form login section -->
                    <form action="" class="mt-5" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" name="password" class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3">
                                <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                            </div>
                        </div>
                        <div class="col text-center">
                            <button type="submit" value="connexion" name="connexion" class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100">Connexion</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
            <div class="row vh-100 p-5">
                <div class="col align-self-center p-5 text-center">
                    <img src="images/login1.png" class="bounce" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/script.js"></script>

</body>

</html>