<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
?>


<?php
$emailUsername=$_POST['emailUsername'];
$password=$_POST['password'];

if (empty($emailUsername)){
    $emailUsernameErr='Please enter your email';
    require_once "loginSeller.php";
    exit();
}

$sql = "SELECT * FROM seller WHERE email LIKE '$emailUsername' OR username LIKE '$emailUsername';";
$result = mysqli_query($mysqli, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck == 0){
    $emailUsernameErr='This email/username does not exist';
    require_once "loginSeller.php";
    exit();
}

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($password!=$row['password']){
            $passwordErr='The password is not correct';
            require_once "loginSeller.php";
            exit();
        }
        else{
            $id=$row['id'];
            $photo=$row['profilePic'];
            $username=$row['username'];
            $email=$row['email'];
            $password=$row['password'];
            $background=$row['background'];
            
            session_start();
            $_SESSION["photoSeller"]=$photo;
            $_SESSION["userSeller"]=$username;
            $_SESSION["userIdSeller"]=$id;
            $_SESSION["backgroundSeller"]=$background;
            $_SESSION["passwordSeller"]=$password;
            $_SESSION["emailSeller"]=$email;


            require_once "showItem.php";
            exit();
        }
    }
}
?>

