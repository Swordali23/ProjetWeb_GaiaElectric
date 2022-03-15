<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>


<?php
    $idCurrItem = $_GET["uid"];

    $sql = "SELECT s.username, i.id, i.title, i.description, i.category, i.price, i.image1, i.image2, i.image3 FROM seller AS s CROSS JOIN item AS i WHERE i.idSeller=s.id AND i.id=$idCurrItem;";
    $result = mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)){
        $sellerUsername=$row['username'];
        $itemId=$row['id'];
        $itemTitle=$row['title'];
        $itemDescription=$row['description'];
        $itemCategory=$row['category'];
        $itemPrice=$row['price'];
        $itemPhoto1=$row['image1'];
        $itemPhoto2=$row['image2'];
        $itemPhoto3=$row['image3'];
        $itemPhoto3=$row['image3'];
    }
    $sql2 = "SELECT * FROM item WHERE idSeller IS NULL AND id=$idCurrItem;";
    $result = mysqli_query($mysqli, $sql2);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
    while($row = mysqli_fetch_assoc($result)){
        $sellerUsername='GaiaElectric';
        $itemId=$row['id'];
        $itemTitle=$row['title'];
        $itemDescription=$row['description'];
        $itemCategory=$row['category'];
        $itemPrice=$row['price'];
        $itemPhoto1=$row['image1'];
        $itemPhoto2=$row['image2'];
        $itemPhoto3=$row['image3'];
    }}

    $_SESSION["sellerUsernameCurrItem"]=$sellerUsername;
    $_SESSION["currItemId"]=$itemId;
    $_SESSION["currItemTitle"]=$itemTitle;
    $_SESSION["currItemDescription"]=$itemDescription;
    $_SESSION["currItemCategory"]=$itemCategory;
    $_SESSION["currItemPrice"]=$itemPrice;
    $_SESSION["currItemPhoto1"]=$itemPhoto1;
    
    $check1=substr($itemPhoto2, 14);
    $check2=substr($itemPhoto3, 14);
    if($check1!=""){
        $_SESSION["currItemPhoto2"]=$itemPhoto2;
    }
    else{
        $_SESSION["currItemPhoto2"]="non";
    }
    if($check2!=""){
        $_SESSION["currItemPhoto3"]=$itemPhoto3;
    }
    else{
        $_SESSION["currItemPhoto3"]="non";
    }
        require_once 'itemBuyer.php';
