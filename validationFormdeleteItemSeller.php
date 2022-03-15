<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<?php

$itemId = $_GET["uid"];

    
    $sql = "SELECT * FROM item WHERE id='$itemId';";
    $result = mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $photo1=$row['image1'];
        $photo2=$row['image2'];
        $photo3=$row['image3'];
    }
    
    $sql2 = "DELETE FROM `item` WHERE id='$itemId'";
    mysqli_query($mysqli, $sql2);

    $sql3 = "DELETE FROM `transaction` WHERE idItem='$itemId'";
    mysqli_query($mysqli, $sql3);



    $id=$_SESSION["userIdSeller"];

$sql3 = "SELECT * FROM item WHERE idSeller LIKE '$id';";
$result = mysqli_query($mysqli, $sql3);
$resultCheck = mysqli_num_rows($result);

$itemId = array();
$itemTitle = array();
$itemPrice = array();
$itemPhoto = array();
//$itemPurchase = array()

while($row = mysqli_fetch_assoc($result)){
    $itemId[]=$row['id'];
    $itemTitle[]=$row['title'];
    $itemPrice[]=$row['price'];
    $itemPhoto[]=$row['image1'];
}

$_SESSION["numberItem"]=$resultCheck;
$_SESSION["itemId"]=$itemId;
$_SESSION["itemTitle"]=$itemTitle;
$_SESSION["itemPrice"]=$itemPrice;
$_SESSION["itemPhoto"]=$itemPhoto;

require_once 'homepageSeller.php';


?>

