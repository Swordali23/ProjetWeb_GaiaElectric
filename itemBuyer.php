<!--VIEW AND CONTROLLER PAGE-->



<?php
include_once 'headerBuyer.php';
include_once ('databaseConn.php');

?>
  <div class="container">
    <div class="row text-lg-start d-flex justify-content-center">
      <?php
      $idItem = $_SESSION["currItemId"];
      $sql = "SELECT * FROM item WHERE id='$idItem';";
      $query = mysqli_query($mysqli, $sql);
      $row = mysqli_fetch_assoc($query);

      $sqlTransa = "SELECT * FROM transaction WHERE idItem='$idItem';";
      $queryTransa = mysqli_query($mysqli, $sqlTransa);
      $rowTransa = mysqli_fetch_assoc($queryTransa);
      

      
      $idSeller = $row['idSeller'];
      $idBuyer = $_SESSION["idBuyer"];
        if($idBuyer==null){
        $idBuyer=0;     // Pour que l'affichage du decompte ne bug pas quand personne n'est connecter
                      // avant un bid on test si idBuyer==0, si oui on annule la transa et on demande 
                      // a l'utilisateur de se connecter 
        }
        /*if($idSeller==null){
          $idSeller=0;     // Pour que l'affichage du decompte ne bug pas quand personne n'est connecter
                        // avant un bid on test si idBuyer==0, si oui on annule la transa et on demande 
                        // a l'utilisateur de se connecter 
          }*/
      if($_SESSION["currItemPhoto2"]!="non"){
        echo '<div class="col-lg-4 col-md-12 mb-4 mb-md-0">';
        echo '<div class="cart">';
        echo '<div><img src="';
        echo $_SESSION["currItemPhoto1"];
        echo '" id="myItem" alt="image1">';
        echo '</div></div></div>';
        echo '<div class="col-lg-4 col-md-12 mb-4 mb-md-0">';
        echo '<div class="cart">';
        echo '<div><img src="';
        echo $_SESSION["currItemPhoto2"];
        echo '" id="myItem" alt="image1">';
        echo '</div></div></div>';
      }else{
        echo '<div class="col-lg-6 col-md-12 mb-4 mb-md-0">';
        echo '<div class="cart">';
        echo '<div><img src="';
        echo $_SESSION["currItemPhoto1"];
        echo '" id="myItem" alt="image1">';
        echo '</div></div></div>';
        }
       ?>

      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        <div class="summary">
          <div class="d-flex justify-content-between mx-2">
            <h4><?php echo $_SESSION["currItemTitle"]; ?></h4>
            &ensp;
            <?php
            if($_SESSION["currItemPrice"]!=NULL){
              echo '<p class="price h4">£';
              echo $_SESSION["currItemPrice"];
              echo '</p>';
            }
            ?>
          </div>
          <div class="dropdown-divider"></div>
            <div class="body">
              <p class="h5 mx-2 py-2"><?php if($_SESSION["currItemCategory"]=='1'){echo 'Monocristallin';}elseif($_SESSION["currItemCategory"]=='2'){echo 'Polycristallin';} ?></p>
              <p class="card-text text-secondary h6 mx-2 py-2"><?php echo $_SESSION["currItemDescription"]; ?></p>
              <div class="dropdown-divider"></div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success w-50 " name="addCart" onclick=addToCart(this.id) id="<?php echo $_SESSION["currItemId"];?>">Add to cart</button>
              </div>

              <br><br>
              <p class="card-text text-info mx-2 py-2">Sold by <?php echo $_SESSION["sellerUsernameCurrItem"]; ?></p>
              
            </div>
          </div>
        </div>
      </div>
    </div>

      <?php
      if($_SESSION["currItemPhoto3"]!="non"){
        echo '<br>';
        echo '<div class="container">';
        echo '<div class="row text-lg-start d-flex justify-content-start">';
        echo '<div class="col-lg-4 col-md-12 mb-4 mb-md-0">';
        echo '<div class="cart">';
        echo '<div><img src="';
        echo $_SESSION["currItemPhoto3"];
        echo '" id="myItem" alt="image1">';
        echo '</div></div></div>';
        echo '<div class="col-lg-4 col-md-12 mb-4 mb-md-0">';
        echo '</div>';
        echo '<div class="col-lg-4 col-md-12 mb-4 mb-md-0">';

        echo '</div>';
        echo '</div>';
      }
        ?>

  </div>


  <script type="text/javascript">

function addToCart(idItem)
    {
        window.location.href="sendTransaction.php?uid="+idItem+"";
    }

</script>

<?php
include_once 'footer.php';
?>

