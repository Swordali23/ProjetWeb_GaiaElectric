<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
?>


<?php

$email=$_POST['email'];
$password=$_POST['password'];

if (empty($email)){
    $emailErr='Please enter your email';
    require_once "loginBuyer.php";
    exit();
}


$sql = "SELECT * FROM buyer WHERE email LIKE '$email';";
$result = mysqli_query($mysqli, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck == 0){
    $emailErr='This email does not exist';
    require_once "loginBuyer.php";
    exit();
}

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($password!=$row['password']){
            $passwordErr='The password is not correct';
            require_once "loginBuyer.php";
            exit();
        }
        else{
            session_start();
            $_SESSION["idBuyer"]=$row['id'];
            $_SESSION["userBuyer"]=$row['firstName']." ".$row['lastName'];
            $idCheck=$_SESSION["idBuyer"];

            $sql2 = "SELECT * FROM transaction WHERE idBuyer='$idCheck';";
            $query = mysqli_query($mysqli, $sql2);
            $resultCheck = mysqli_num_rows($query);
            $_SESSION['cart']=$resultCheck;


            require_once "index.php";
            exit();
        }
    }
}
?>

