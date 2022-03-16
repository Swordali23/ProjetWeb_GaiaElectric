
<?php
include_once ('databaseConn.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$amountToPay = $_GET['uid'];
$_SESSION['amountToPay']=$amountToPay;
?>

<head>
<meta charset="UTF-8">
    <title>Gaïa Electric : Payment page</title>
    <link rel="icon" href="public/images/logoWebsite.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <link rel="stylesheet" media="screen" type="text/css" href="public/css/checkOutPage.css"/>
  
</head>
<form action="payement.php" method="post">
<div class="wrapper">
  <div class="container">
    <div class="title">Checkout</div>
    
    <div class="input-form">
      <div class="sectiona">
        <div class="items">
          <label class="label">card number</label>
          <input type="text" class="input" maxlength="16"  name="cardNumber" placeholder="0000 0000 0000 0000">
        </div>
        <?php if(isset($cardNumberErr)) {?>
                <span style="color:crimson;"> <?php echo $cardNumberErr ?></span>
                <?php }?>
      </div>
      <div class="sectionb">
        <div class="items">
          <label class="label">card holder</label>
          <input type="text" class="input" name="cardHolder" placeholder="Name on the Card">
        </div>
        <?php if(isset($cardHolderErr)) {?>
                <span style="color:crimson;"> <?php echo $cardHolderErr ?></span>
                <?php }?>
      </div>
      <div class="sectionc">
        <div class="items">
          <label class="label">Expire date</label>
          <input type="text" class="input" maxlength="5" name="date" placeholder="MM/YY">
          <?php if(isset($dateErr)) {?>
                <span style="color:crimson;"> <?php echo $dateErr ?></span>
                <?php }?>
        </div>
        
        <div class="items">
          <div class="cvc">
            <label class="label">cvc code</label>
          </div>
          <input type="text" class="input" maxlength="3" name="cvc" data-mask="000" placeholder="000">
          <?php if(isset($cvcErr)) {?>
                <span style="color:crimson;"> <?php echo $cvcErr ?></span>
                <?php }?>
        
        <fieldset>
        <legend>Card Type</legend>
        <div>
            <input type="checkbox" name="visa" value="Visa">
            <label for="visa">Visa</label>
        </div>
        <div>
            <input type="checkbox" name="paypal" value="Paypal">
            <label for="paypal">Paypal</label>
        </div>
        <div>
            <input type="checkbox" name="MasterCard" value="MasterCard">
            <label for="MasterCard">MasterCard</label>
        </div>
        <div>
            <input type="checkbox" name="AmericanExpress" value="AmericanExpress" >
            <label for="AmericanExpress">AmericanExpress</label>
        </div>
        </fieldset>
        <?php if(isset($typeErr)) {?>
                <span style="color:crimson;"> <?php echo $typeErr ?></span>
                <?php }?>
        </div>
      </div>
    </div>
    <input type="submit" class="btn btn-dark" value="Proceed">
    <br>
    <?php if(isset($cardErr)) {?>
                <span style="color:crimson;"> <?php echo $cardErr ?></span>
                <?php }?>
                <?php if(isset($success)) {?>
        <span style="color:lime;"> <?php echo $success ?></span>        <!--message for success-->
        <?php }?>
        <br>

        <p><a href="cartBuyer.php">Go back to your Cart</a></p>
  </div>
</div>
</form>


