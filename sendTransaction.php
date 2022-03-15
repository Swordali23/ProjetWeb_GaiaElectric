



<?php
include_once ('databaseConn.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>


<?php

    //$idItem = $_POST['Id'];
    $idItem = $_GET["uid"];
    //$idBuyer = $_POST['IdBuyer'];
    $idBuyer = $_SESSION["idBuyer"]; 


    $sql0 = "SELECT i.id, i.image1, i.title, i.price, t.idBuyer, t.id AS idTransaction, t.priceTransaction,t.idItem FROM item AS i CROSS JOIN transaction AS t WHERE t.idBuyer='$idBuyer' AND i.id='$idItem' AND t.idItem=i.id AND t.idSeller IS NOT NULL";
    $query0 = mysqli_query($mysqli, $sql0);
    $row0 = mysqli_fetch_assoc($query0);

    if($row0>0){

        //echo "<script type='text/javascript'>alert('This item is already in your cart');</script>";
        require_once 'index.php';
    }

    else{
        $sql3 = "SELECT * FROM item WHERE id='$idItem';";
        $query3 = mysqli_query($mysqli, $sql3);
        $row3 = mysqli_fetch_assoc($query3);
        $price = $row3['price'];
        $idSeller = $row3['idSeller'];
    
        if(empty($idSeller)){
            if(empty($price)){
                $sql2 = "INSERT INTO transaction(idItem, idBuyer) VALUES ('$idItem', '$idBuyer');";
                mysqli_query($mysqli, $sql2) ;
            }else{
                $sql2 = "INSERT INTO transaction(idItem, idBuyer, priceTransaction) VALUES ('$idItem', '$idBuyer', ' $price');";
                mysqli_query($mysqli, $sql2) ;
            }
        }else{
            if(empty($price)){
                $sql2 = "INSERT INTO transaction(idItem, idBuyer, idSeller) VALUES ('$idItem', '$idBuyer', '$idSeller');";
                mysqli_query($mysqli, $sql2);
            }else{
                $sql2 = "INSERT INTO transaction(idItem, idBuyer, idSeller, priceTransaction) VALUES ('$idItem', '$idBuyer', '$idSeller', ' $price');";
                mysqli_query($mysqli, $sql2);
            }
        }
        
        $UpdateItem="UPDATE item SET idBuyer='$idBuyer' WHERE id='$idItem'";
        $resultat=mysqli_query($mysqli, $UpdateItem) or die('SQL Error !'.$UpdateItem.'<br>'.mysqli_error($UpdateItem));
    
        $_SESSION['cart'] = $_SESSION['cart']+1;
    }

    require_once 'index.php';

    ?>

                