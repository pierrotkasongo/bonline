<?php require_once  'header.php'?>
<?php
   if (isset($_GET['remove']) && !empty($_GET['remove'])){
       $dao->deleteproduitpanierbyidandsession($_GET['remove'],session_id());
   }
?>
    <!-- Cart Items -->
    <div class="container cart">
      <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>
        <?php
            $row = $dao->getCartByIdSession(session_id());
            $som = 0;
            $total = 0;
            if ($row){
                foreach ($row as $value){?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?= substr($value->photo,3,50)?>" alt="" />
                        <div>
                            <p><?= $value->nom?></p>
                            <span>Prix: <?= $value->prixunitaire?>$</span>
                            <br />
                            <a href="?remove=<?= $value->idPanier ?>">remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" value="1" min="1" /></td>
                <td><?php
                    $som = $value->prixunitaire * $value->quantite;
                    echo  $som;
                    $total += $som;
                    ?>$</td>
            </tr>
         <?php } }?>
        </tbody>


      </table>

      <div class="total-price">
        <table>
          <tr>
            <td>Subtotal</td>
            <td><?= $total?>$</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>$10</td>
          </tr>
          <tr>
            <td>Total</td>
            <td><?= $total?>$</td>
          </tr>
        </table>
<!--        <a href="#" class="checkout btn">Proceed To Checkout</a>-->
      </div>
    </div>

<?php require_once  'footer.php'?>