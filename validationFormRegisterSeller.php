<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
?>


<?php
$username= $_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$checkU=0;
$checkE=0;

if (empty($username)){
  $usernameErr='Please enter your username';
}else{
    $sql = "SELECT * FROM seller WHERE username='$username';";
    $result = mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        $usernameErr='This username is already taken';
        $checkU=1;
    }
}

if (empty($email)){
  $emailErr='Please enter your email';
} else{
    $sql2 = "SELECT * FROM seller WHERE email='$email';";
    $result = mysqli_query($mysqli, $sql2);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        $emailErr='This email is already taken';
        $checkE=1;
    }
}

if (empty($password)){
  $passwordErr='Please enter a password';
}
elseif(strlen($password)<6){
    $passwordErr='Your password need to have at least 6 characters';
}

if(empty($username) || empty($email) || empty($password) || $checkU==1 || $checkE==1 || strlen($password)<6){
    if(isset($_POST['itemsSeller'])){
        require_once "registerSeller.php";
        exit();
    }
    if(isset($_POST['addSellers'])){
        require_once "showSellers.php";
        exit();
    }
}
else{
    $photo='public/images/defaultPP.jpeg';
    $sql3 = "INSERT INTO seller(username, email, password, profilePic) VALUES ('$username', '$email', '$password', '$photo');";
    mysqli_query($mysqli, $sql3);

    $sql4 = "SELECT * FROM seller WHERE email='$email';";
    $result = mysqli_query($mysqli, $sql4);
    $resultCheck = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $photo=$row['profilePic'];
        $username=$row['username'];
        $email=$row['email'];
        $password=$row['password'];
        $background=$row['background'];
    }
    
    session_start();
    $_SESSION["photoSeller"]=$photo;
    $_SESSION["userSeller"]=$username;
    $_SESSION["userIdSeller"]=$id;
    $_SESSION["backgroundSeller"]=$background;
    $_SESSION["passwordSeller"]=$password;
    $_SESSION["emailSeller"]=$email;

    if(isset($_POST['itemsSeller'])){
        require_once "showItem.php";
        exit();
    }
    if(isset($_POST['addSellers'])){
        require_once "showSellers.php";
        exit();
    }
}
?>

