<!--VIEW PAGE-->



<!--Header for sellers-->
<?php
include_once 'headerSeller.php';
?>

<!--Content of the index page-->

<div class="container">
    <div class="row text-center justify-content-center py-5">
        <div class="col-md-4 col-sm-12">
            <a class="btn btn-outline-dark my-2 py-2" href="addItemSeller.php" role="button"><p class="h3">Add an Item to Sell</p></a>
        </div>
    </div>
    <div class="row text-center justify-content-center py-2">
        <div class="col-md-4 col-sm-12">
            <p class="h3">Your current items</p>
            <div class="dropdown-divider"></div>
        </div>
    </div>
    <div class="row text-center justify-content-center py-2">
        <?php
        $itemId=$_SESSION["itemId"];
        $itemTitle=$_SESSION["itemTitle"];
        $itemPrice=$_SESSION["itemPrice"];
        $itemPhoto=$_SESSION["itemPhoto"];
        $numberItem=$_SESSION["numberItem"];
        for($i=0; $i<$numberItem; $i++){
            echo '<div class="col-md-4 col-sm-6 py-5 px-3">';
            echo '<div class="card">';
            echo '<div><img src="';
            echo $itemPhoto[$i];
            echo '" id="myItem" alt="image1" ></div>';
            echo '<div class="card body">';
            echo '<p class="title text-dark text-italic h5 mt-2">';
            echo $itemTitle[$i];
            echo '</p>';
            if($itemPrice[$i]==""){
                echo '<span class="price h4">Only by Best Offer</span>';
            }
            else{
                echo '<span class="price h4">£';
                echo $itemPrice[$i];
                echo '</span>';
            }
            echo '<button type="submit" class="btn btn-danger" name="itemSeller" onclick="getId(this.id)" id="';
            echo $itemId[$i];
            echo '">';
            echo 'Delete this item';
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>';
            echo '</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';      
        }
        ?>
    </div>
</div>

<script type="text/javascript">
    function getId(monId)
    {
        window.location.href="validationFormDeleteItemSeller.php?uid="+monId+"";
    }
</script>
      
      
<?php
include_once 'footer.php';
?>
