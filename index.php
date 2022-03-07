<!--VIEW PAGE-->



<?php
include_once 'headerBuyer.php';
?>

    <?php
    $index='test';
    include_once 'showItem.php';
    ?>
    <div id="carrousel">
		<div id="slide">
			<div class="image">
				<img src="public/images/carousel1.jpg">
			</div>
			<div class="image">
				<img src="public/images/carousel2.jpg">
			</div>
			<div class="image">
				<img src="public/images/carousel3.jpg">
			</div>
		</div>
	</div> 
    
    <div class="buttonCar">
        <button class="btn" id="b1"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-compact-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z"/>
</svg></button>
        <button class="btn" id="b2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
</svg></button>
    </div>

    <br><br>

  <div class="container">
      <div class="row justify-content-center py-3">
        <div class="col-md-9 col-sm-12">
          <p class="h3">All Items in the store</p>
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
        $itemDuration=$_SESSION["itemDuration"];
        $bestOffer=$_SESSION["thisBestOffer"];

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
            if(empty($itemPrice[$i]) && $bestOffer[$i]=='1'){
                echo '<span class="price h6">Only by Best Offer</span>';
            }
            else{
                echo '<span class="price h4">£';
                echo $itemPrice[$i];
                echo '</span>';
            }
            if(isset($itemDuration[$i])){
                echo '<span class="price h6">Auction Available !</span>';
                }

            if(isset($itemDuration[$i]) && $itemDuration[$i]- time()<0){
                echo '<a class="btn btn-success text-light" role="button" onclick=alertFinish() >';
                echo 'Add to Cart';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>';
                echo '</a>';
            }
            
            elseif(isset($_SESSION["userBuyer"])){
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


<script type="text/javascript">

    function goToItem(monId)
    {
        window.location.href="showCurrItem.php?uid="+monId+"";
    }
      

function addToCart(idItem){
go(idItem);
}

function alertFinish(){
alert('This item is no longer available.');
}



function getXhr(){
    var xhr = null; 
    if(window.XMLHttpRequest) // Firefox et autres
       xhr = new XMLHttpRequest(); 
    else if(window.ActiveXObject){ // Internet Explorer 
       try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
    }
    else { // XMLHttpRequest non supporté par le navigateur 
       alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
       xhr = false; 
    } 
    return xhr
};

function go(idItem){
    var xhr = getXhr()
    // On définit ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est OK
        if(xhr.readyState == 4 && xhr.status == 200){
            alert(xhr.responseText);
        }
    }
    <?php $idBuyer = $_SESSION["idBuyer"];?>
    var IdBuyer = <?php echo $idBuyer?>;
    xhr.open("POST","SendClassicTransaction.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("Id=" + encodeURI(idItem) + "&IdBuyer=" + encodeURI(IdBuyer) );
    location.reload();
};

var currentImage = 0;


$(document).ready(function myLoop(){
	setTimeout(function(){

		if(currentImage<2){
			$('#slide').animate({'margin-left': '-=1200'},1000);
			currentImage++;
		}
		else{
			$('#slide').css('margin-left',0);
			currentImage=0;
		}
		myLoop();

	}, 6000);
});


$(document).ready(function(){
	$("#b1").click(function(){
		if(currentImage > 0){
			$('#slide').animate({'margin-left': '+=1200'},1000);
			currentImage--;
		}

	});
	$("#b2").click(function(){
		if(currentImage<2){
			$('#slide').animate({'margin-left': '-=1200'},1000);
			currentImage++;
		}

	});
});


</script>

<?php
include_once 'footer.php';
?>