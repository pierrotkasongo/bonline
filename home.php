<div class="hero">
    <div class="left">
        <span>Ventes exclusives</span>
        <h2>JUSQU'À 50% DE RÉDUCTION SUR LES VENTES</h2>
        <small>Recevez toutes les offres exclusives de la saison</small>
        <a href="products.php">Detail </a>
    </div>
    <div class="right">
        <img src="images/hero.png" alt="" />
    </div>
</div>
<!-- Promotion -->
<section class="section promotion">
    <div class="title">
        <h2>Collections de la boutique</h2>
        <span>Choisissez parmi les produits haut de gamme et économisez beaucoup d'argent</span>
    </div>

    <div class="promotion-layout container">

        <?php
        $row = $dao->getallProduit();
        if ($row){
        foreach ($row as $value){
        ?>
            <div class="promotion-item">
                <img src="<?= substr($value->photo,3,50)?>" alt="" />
                <div class="promotion-content">
                    <h3><?= $value->nom?></h3>
                    <a href="productdetails.php?id=<?= $value->id_produit?>">Acheter</a>
                </div>
            </div>
        <?php } }?>

    </div>
</section>
<!-- Products -->
<section class="section products">
    <div class="title">
        <h2>Nouveaux Produits</h2>
        <span>Choisissez parmi les marques de produits haut de gamme et économisez beaucoup d'argent.</span>
    </div>

    <div class="product-layout">
        <?php $row = $dao->getallProduit();
        if ($row){
            foreach ($row as $value){ ?>
                <div class="product">
                    <div class="img-container">
                        <img src="<?= substr($value->photo,3,50)?>" style="height: 294px;width: 294px" alt="">
                        <div class="addCart">
                            <i class="fas fa-shopping-cart"></i>
                        </div>

                        <ul class="side-icons">
                            <span><i class="fas fa-search"></i></span>
                            <span><i class="far fa-heart"></i></span>
                            <span><i class="fas fa-sliders-h"></i></span>
                        </ul>
                    </div>
                    <div class="bottom">
                        <a href="productdetails.php?id=<?= $value->id_produit?>"><?= $value->nom?></a>
                        <div class="price">
                            <span><?= $value->prixunitaire?>$</span>
                        </div>
                    </div>
                </div>
        <?php } }?>

    </div>
</section>
<!-- ADVERT -->
<section class="section advert">
    <div class="advert-layout container">
        <div class="item ">
            <img src="./images/promo7.jpg" alt="">
            <div class="content left">
                <span>Ventes exclusives</span>
                <h3>Collections de printemps</h3>
                <a href="products.php">Collections</a>
            </div>
        </div>
        <div class="item">
            <img src="./images/promo8.jpg" alt="">
            <div class="content  right">
                <span>Nouvelle tendance</span>
                <h3>Sacs de créateurs</h3>
                <a href="products.php">Acheter</a>
            </div>
        </div>
    </div>
</section>

