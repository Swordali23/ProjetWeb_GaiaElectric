<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');  //get the connection
session_start();    //start of a session
?>


<?php
//get the id of the transaction to delete it
$transactionId = $_GET["uid"];

$sql2 = "DELETE FROM `transaction` WHERE id='$transactionId'";
mysqli_query($mysqli, $sql2);
   
//session cart get -1 to display how many item you got in the cart
$_SESSION['cart'] = $_SESSION['cart']-1;

//go back to the cart
require_once 'cartBuyer.php';

?>