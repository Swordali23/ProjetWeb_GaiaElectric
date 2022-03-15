<!--CONTROLLER AND VIEW PAGE-->

<?php
include_once 'headerBuyer.php';   //header for buyer
include_once ('databaseConn.php'); //get the connection
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } //start of a session
?>


<style>

</style>

<?php 
$idBuyer = $_SESSION['idBuyer'];

$sql = "SELECT * FROM transaction WHERE idBuyer='$idBuyer';";
$query = mysqli_query($mysqli, $sql);
$resultCheck = mysqli_num_rows($query);
$_SESSION['cart']=$resultCheck;

$sql2 = "SELECT i.id, i.image1, i.title, i.price, t.idBuyer, t.id AS idTransaction, t.priceTransaction,t.idItem FROM item AS i CROSS JOIN transaction AS t WHERE t.idBuyer='$idBuyer' AND t.idItem=i.id AND i.price IS NOT NULL;";
$query2 = mysqli_query($mysqli, $sql2);
?>

      
<div class="container">
  <div class="row text-lg-start d-flex justify-content-center">
    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
      <div class="cart">
        <div class="d-flex flex-row mx-2">
          <h4>To Buy Now</h4>
        </div>
        <div class="dropdown-divider"></div>

        <?php 
        $totalAmount=0;
        while($row = mysqli_fetch_assoc($query2)){ 
            echo '<div class="cart d-flex flex-row border-bottom border-dark">';
            echo '<div class="d-flex flex-row justify-content-between"><div class="body d-flex flex-row">';
            echo '<button style="border:none; padding:0px; max-width: 25%; height: auto;" onclick=goToItem(this.id) id="';
            echo $row['id'];
            echo '"><img src="';
            echo $row['image1'];
            echo '" id="myItem" alt="image1"></button>';
            echo '<p class="title mx-2 text-dark h5 mt-2">';
            echo $row['title'];
            echo '</p>';
            echo '</div>';
            echo '<div class="body d-flex flex-row">';
            echo '<p class="title text-dark mx-3 h6 mt-2">£';
            echo $row['price'];
            echo '</p>';
            echo '<div class="py-1 d-flex">';
            echo '<button type="submit" class="btn" onclick=deleteTransaction(this.id) id="';
            echo $row['idTransaction'];
            echo '">';
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>';
            echo '</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<br>';
            $totalAmount+=$row['price'];
        }
        ?>

      </div>
      </div>
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <div class="summary">
                <div class="d-flex flex-row mx-2">
                    <h4>Summary</h4>
                </div>
                <div class="dropdown-divider"></div>
                <div class="body">
                    <p class="title text-dark text-italic h5 mx-2 py-2">Product</p>
                    <p class="card-text text-secondary h6 mx-2 py-2">Total</p>
                    <span class="price h4"><?php echo $totalAmount?>£</span>
                    <div class="dropdown-divider"></div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning w-50 d-flex justify-content-center" onclick=goToPay(this.id) id="<?php echo $totalAmount?>">Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</div>



<script type="text/javascript">

    function goToPay(monId)
    {
        window.location.href="checkOutPage.php?uid="+monId+"";
    }

function goToItem(monId)
    {
        window.location.href="showCurrItem.php?uid="+monId+"";
    }

function deleteTransaction(monId)
{
    window.location.href="deleteTransaction.php?uid="+monId+"";
};

</script>

<?php
include_once 'footer.php';
?>