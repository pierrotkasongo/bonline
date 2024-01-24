<?php require_once  'header.php'?>
    <section class="section products">
    <div class="products-layout container">
      <div class="col-1-of-4">
        <div>
          <div class="block-title">
            <h3>Categories</h3>
          </div>

          <ul class="block-content">
            <?php
            $row = $dao->getallCategories();
            if ($row){
                foreach ($row as $value){
                    ?>
                <li>
                  <input type="checkbox" name="" id="">
                  <label for="">
                    <span><?= $value->nom_cat?></span>
                    <small>(10)</small>
                  </label>
                </li>
            <?php } }?>

          </ul>
        </div>

        <div>
          <div class="block-title">
            <h3>Marques</h3>
          </div>

          <ul class="block-content">
            <?php
            $row = $dao->getallMarques();
            if ($row){
                foreach ($row as $value){
                    ?>
                <li>
                  <input type="checkbox" name="" id="">
                  <label for="">
                    <span><?= $value->marque?></span>
                    <small>(7)</small>
                  </label>
                </li>
            <?php } }?>


          </ul>
        </div>
      </div>
      <div class="col-3-of-4">
        <form action="">
          <div class="item">
            <label for="sort-by">Sort By</label>
            <select name="sort-by" id="sort-by">
              <option value="title" selected="selected">Name</option>
              <option value="number">Price</option>
              <option value="search_api_relevance">Relevance</option>
              <option value="created">Newness</option>
            </select>
          </div>
          <div class="item">
            <label for="order-by">Order</label>
            <select name="order-by" id="sort-by">
              <option value="ASC" selected="selected">ASC</option>
              <option value="DESC">DESC</option>
            </select>
          </div>
          <a href="">Apply</a>
        </form>

        <div class="product-layout">

           <?php
               $row = $dao->getallProduit();
               if ($row){
                foreach ($row as $value){
           ?>
              <div class="product">
                <div class="img-container">
                  <img src="<?= substr($value->photo,3,50)?>" alt="" />
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

        <!-- PAGINATION -->
        <ul class="pagination">
          <span>1</span>
          <span>2</span>
          <span class="icon">››</span>
          <span class="last">Last »</span>
        </ul>
      </div>
    </div>
  </section>
<?php require_once  'footer.php'?>