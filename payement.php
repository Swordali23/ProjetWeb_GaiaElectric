<?php
include_once ('databaseConn.php');
session_start();
?>


<?php 
$cardType = $_POST["cardType"];
$cardNumber = $_POST["cardNumber"];
$cardHolder = $_POST["cardHolder"];
$cvc = $_POST["cvc"];
$date = $_POST["date"];
$idBuyer = $_SESSION['idBuyer'];

$visa = $_POST["visa"];
$paypal = $_POST["paypal"];
$MasterCard = $_POST["MasterCard"];
$AmericanExpress = $_POST["AmericanExpress"];


  if (empty($cardNumber)){
    $cardNumberErr='Please enter your card number';
  }
  if (empty($cardHolder)){
    $cardHolderErr='Please the name of the card holder';
  }
  if (empty($cvc)){
    $cvcErr='Please the cvc';
  }
  if (empty($date)){
    $dateErr='Please enter the expiration of the card';
  }
  if(empty($visa) && empty($paypal) && empty($AmericanExpress) && empty($MasterCard)){
    $typeErr='Please select a card type';

}

if(empty($cardNumber) || empty($cardHolder) || empty($cvc) || empty($date) || (empty($visa) && empty($paypal) && empty($AmericanExpress) && empty($MasterCard)) ){
    require_once "checkOutPage.php";
    exit();
}

$sql0 = "SELECT * FROM card WHERE idBuyer='$idBuyer';";
$query0 = mysqli_query($mysqli, $sql0);
$resultCheck = mysqli_num_rows($query0);
if($resultCheck > 0){
    if($cardNumber!=$row['cardNumber'] && $cardType!=$row['cardType'] && $cardHolder!=$row['cardName'] && $date!=$row['cardExpiration'] && $cvs!=$row['cardCode']){
    $cardErr="This card doesn't exist !";
    require_once "checkOutPage.php";
    exit();
    }
}else{
    // ajout de la carte
$sql = "INSERT INTO card(idBuyer, cardType, cardNumber, cardName, cardExpiration, cardCode) VALUES ('$idBuyer', 'Visa', '$cardNumber', '$cardHolder', '$date', '$cvc');";
mysqli_query($mysqli, $sql) or die('SQL Error !'.$sql.'<br>'.mysqli_error($sql));


$sql2 = "DELETE FROM transaction WHERE idBuyer='$idBuyer'";
mysqli_query($mysqli, $sql2);

$success="Payment accepted, thank you for your order! TOTAL AMOUNT : ".$_SESSION['amountToPay'];

require_once "checkOutPage.php";
exit();
}
$sql2 = "DELETE FROM transaction WHERE idBuyer='$idBuyer'";
mysqli_query($mysqli, $sql2);

$success="Payment accepted, thank you for your order! TOTAL AMOUNT : ".$_SESSION['amountToPay'];

require_once "checkOutPage.php";
exit();


// recherche du id seller, si non null alors supprime l'item et transa sinon laisse


?>


