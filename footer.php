<!--VIEW PAGE-->


<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
<div class="container-fluid ">
  <div class="row bg-secondary text-center text-lg-start">
    <div class="col-lg-6 col-md-12 my-4 text-center">
      <h5 class="text-uppercase">About Us</h5>
      <p class="py-2">
        FootX is an online shop specializing in football and streetwear. It's a platform allowing e-commerce sales by auction and by best offer.
        Our mission is what drives us to do everything possible to expand human potential. We do that by creating groundbreaking sport innovations, by making our products more sustainably, by building a creative and diverse global team and by making a positive impact in communities where we live and work.
      <?php
      if(!isset($_SESSION["userAdmin"])){
        echo '<form action="logout.php" method="post">';
        echo '<input type="submit" class="btn btn-outline-warning" name="logAdmin" value="I am an admin">';
        echo '</form>';
        
      }
      else{
        echo '<form action="showItem.php" method="post">';
        echo '<input type="submit" class="btn btn-outline-warning" name="itemsAdmin" value="I am an admin">';
        echo '</form>';
      }
      ?>
    </div>
    <div class="col-lg-6 col-md-6 my-4 text-center">
      <h5 class="text-uppercase">Categories</h5>

      <ul class="list-unstyled ">
        <form action="showItem.php" method="post">
        <li>
          <input type="submit" class="btn btn-outline-dark my-2" name="clothing" value="Clothing">
        </li>
        <li>
        <input type="submit" class="btn btn-outline-dark" name="shoes" value="Shoes">
        </li>
        </form>
      </ul>
    </div>
  </div>
  <div class="row bg-dark text-center p-3">
      <div class="copyright d-flex flex-row justify-content-center">
          <p class="text-secondary">© 2021 Copyright :</p>
          &ensp;
          <a class="text-secondary" href="index.php">FootX Store</a>
        </div>
  </div>
</div>
  
</body>
       

</html>