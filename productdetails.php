<?php require_once  'header.php'?>

<?php
if (
    isset($_GET['productId']) && !empty($_GET['productId'])
    && isset($_GET['quantite']) && !empty($_GET['quantite'])
)
{
    $productId = $_GET['productId'];
    $quantite = $_GET['quantite'];
    $sId = session_id();
    $id = null;
    $id = $_GET['productId'];
    $dao->addCart($productId,$quantite,$sId);
    //$data = $dao->getproductbyid($productId);
}

?>
    <!-- Product Details -->
    <section class="section product-detail">
    <div class="details container">

      <div class="left">
        <?php

        if (isset($_GET['id']) && !empty($_GET['id']))
        {
            $id = $_GET['id'];
            $data = $dao->getproductbyid($id);
        }
        if (isset($_GET['productId']) && !empty($_GET['productId']) )
        {
           $id = $_GET['productId'];
           $data = $dao->getproductbyid($id);
        }
        if ($data){
            foreach ($data as $row){ ?>
        <div class="main">
          <img src="<?= substr($row->photo,3,50)?>" alt="" />
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="./images/product2.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product3.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product4.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product5.jpg" alt="" />
          </div>
        </div>
      <?php } }?>
      </div>

      <div class="right">
         <?php
         if (isset($_GET['id']) && !empty($_GET['id']))
         {
             $id = $_GET['id'];
             $data = $dao->getproductbyid($id);
         }
         if (isset($_GET['productId']) && !empty($_GET['productId']) )
         {
             $id = $_GET['productId'];
             $data = $dao->getproductbyid($id);
         }
         $data = $dao->getproductbyid($id);

           if ($data){
               foreach ($data as $row){

         ?>
<!--        <span>Home/T-shirt</span>-->
        <h1><?= $row->nom?></h1>
        <div class="price"><?= $row->prixunitaire?>$</div>
        <form class="form" method="get">
          <input type="text" placeholder="1" name="quantite" value="1"/>
          <input type="hidden" name="productId" value="<?= $row->id_produit?>" />
          <button  class="addCart">Panier</button>
        </form>
        <h3>Detail Produits </h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima
          delectus nulla voluptates nesciunt quidem laudantium, quisquam
          voluptas facilis dicta in explicabo, laboriosam ipsam suscipit!
        </p>
       <?php } }?>
      </div>

    </div>
  </section>
    <!-- Related Products -->
    <section class="section related-products">
    <div class="title">
      <h2>Produits Connexes</h2>
      <span>Choisissez parmi les marques de produits haut de gamme et économisez beaucoup d'argent.</span>
    </div>
    <div class="product-layout container">
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
<?php require_once  'footer.php'?>
