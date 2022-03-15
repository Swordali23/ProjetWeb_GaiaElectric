<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
session_start();
?>


<?php

if(isset($_POST['monocristallin'])){
    $category=1;

    $sql = "SELECT * FROM item WHERE category LIKE $category;";
    $result = mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);

    $itemId = array();
    $itemTitle = array();
    $itemPrice = array();
    $itemPhoto = array();

    while($row = mysqli_fetch_assoc($result)){
        $itemId[]=$row['id'];
        $itemTitle[]=$row['title'];
        $itemPrice[]=$row['price'];
        $itemPhoto[]=$row['image1'];
    }

    $_SESSION["itemId"]=$itemId;
    $_SESSION["numberItem"]=$resultCheck;
    $_SESSION["itemTitle"]=$itemTitle;
    $_SESSION["itemPrice"]=$itemPrice;
    $_SESSION["itemPhoto"]=$itemPhoto;

    require_once 'monocristallin.php';

}

elseif(isset($_POST['polycristallin'])){
    $category=2;

    $sql = "SELECT * FROM item WHERE category LIKE $category;";
    $result = mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);

    $itemId = array();
    $itemTitle = array();
    $itemPrice = array();
    $itemPhoto = array();
    $bestOffer = array();

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

    require_once 'polycristallin.php';

}
elseif(isset($_POST['searchM'])){
    
    $search=$_POST['searchMode'];
    $_SESSION["currentSearch"]=$search;

        $sql = "SELECT * FROM item WHERE title LIKE '%$search%';";
        $result = mysqli_query($mysqli, $sql);
        $resultCheck = mysqli_num_rows($result);

        $itemId = array();
        $itemTitle = array();
        $itemPrice = array();
        $itemPhoto = array();

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

        require_once 'searchbar.php';
    }

elseif(isset($_POST['itemsSeller'])){

    $id=$_SESSION["userIdSeller"];

    $sql = "SELECT * FROM item WHERE idSeller LIKE '$id';";
    $result = mysqli_query($mysqli, $sql);
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
}

if(isset($index)){

    $sql = "SELECT * FROM item;";
    $result = mysqli_query($mysqli, $sql);
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

    require_once 'index.php';
}
?>



