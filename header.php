<?php
    require_once 'db/DataBase.php';
    require_once 'library/Session.php';
    Session::init();
    $dao =  new DataBase();
    $data = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Glidejs -->
    <link rel="stylesheet" href="css/glide.core.css">
    <link rel="stylesheet" href="css/glide.theme.css">

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="css/style.css" />
    <title>B-Online</title>
</head>

<body>
<!-- header section starts  -->
<nav class="nav">
    <div class="wrapper container">
        <div class="logo"><a href="index.php">B-Online</a></div>
        <ul class="nav-list float-left">
            <div class="top">
                <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
            </div>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="products.php">Produits</a></li>
            <li><a href="about.php">A-propos</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Connexion</a></li>
            <!-- icons -->
            <li class="icons">
              <span>
                  <a href="cart.php">
                     <img src="images/shoppingBag.svg" alt="" />
                    <small class="count d-flex" style="margin-right:10px;">
                        <?php
                        $cart = count($dao->getCartBySessionId(session_id()));
                        echo  $cart;
                        ?>
                    </small>
                  </a>

              </span>
                <span><img src="images/search.svg" alt="" /></span>
            </li>
        </ul>
        <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>
