<!--VIEW PAGE-->


<!--Header for buyer-->
<?php
include_once 'headerBuyer.php';
?>
    <div class="container">

    <!--DISPLAY ALL THE ITEMS OF CATEGORY CLOTHING IN THE STORE-->
        <div class="row justify-content-center py-2">
            <div class="col-md-9 col-sm-12">
                <p class="h3">Polycristallin</p>
                <div class="dropdown-divider"></div>
            </div>
        </div>
        <div class="row text-center justify-content-center py-2">

        <!--Section where all the items are displayed-->
        <?php 
        //Get all the array that contains the information for the items coming from showItem.php
        $itemId=$_SESSION["itemId"];
        $itemTitle=$_SESSION["itemTitle"];
        $itemPrice=$_SESSION["itemPrice"];
        $itemPhoto=$_SESSION["itemPhoto"];
        $numberItem=$_SESSION["numberItem"];

        //Iteration to displays all the items
        for($i=0; $i<$numberItem; $i++){
            
            echo '<div class="col-md-4 col-sm-6 py-5 px-3">';
            echo '<div class="card">';
            echo '<div><button style="border:none; padding:0px;" onclick=goToItem(this.id) id="';
            echo $itemId[$i];
            echo '">';
            echo '<img src="';
            echo $itemPhoto[$i];
            echo '" id="myItem" alt="image1" ></button></div>';
            echo '<div class="card body">';
            echo '<p class="title text-dark text-italic h5 mt-2">';
            echo $itemTitle[$i];
            echo '</p>';
            echo '<span class="price h4">£';
            echo $itemPrice[$i];
            echo '</span>';
            
            if(isset($_SESSION["userBuyer"])){ //if the seller has logged in 
                echo '<button type="submit" class="btn btn-success" name="itemSeller" onclick=addToCart(this.id) id="';
                echo $itemId[$i];
                echo '">';
                echo 'Add to Cart';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>';
                echo '</button>';
              }
            
              else{
                echo '<a class="btn btn-success text-light" role="button" href="loginBuyer.php">';
                echo 'Add to Cart';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>';
                echo '</a>';
              }
            echo '</div>';
            echo '</div>';
            echo '</div>';      
            
        }
?>       
        </div>
    </div>


<script type="text/javascript">
//function to go to the item page with the id
function goToItem(monId)
    {
        window.location.href="showCurrItem.php?uid="+monId+"";
    }

//function to add the item to the cart
function addToCart(idItem)
    {
        window.location.href="sendTransaction.php?uid="+idItem+"";
    }

</script>




<!--footer-->

<?php
include_once 'footer.php';
?>
