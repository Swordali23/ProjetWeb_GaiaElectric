<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
session_start();
?>

<?php

$userSeller=$_SESSION["userSeller"];
$userAdmin=$_SESSION["userAdmin"];

$username= $_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$pp=$_FILES['pp']['name'];
$background=$_FILES['background']['name'];
$checkU=0;
$checkE=0;

if(isset($_POST['editSeller'])){

    if (empty($username)){
        $usernameErr='Please enter a new username';
        $username=$_SESSION["userSeller"];
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
        $emailErr='Please enter a new email';
        $email=$_SESSION["emailSeller"];
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
        $passwordErr='Please enter a new password';
        $password=$_SESSION["passwordSeller"];
      }
      elseif(strlen($password)<6){
          $passwordErr='Your password need to have at least 6 characters';
      }
      
      if(isset($pp)){
          $target1="public/images/".basename($_FILES['pp']['name']);
          
      }
      if(empty($pp)){
        $ppErr='Please upload a new profile pic';
        $target1=$_SESSION["photoSeller"];
      }
      
      if(isset($background)){
          $target2="public/images/".basename($_FILES['background']['name']);
          
      }
      if(empty($background)){
          $backgroundErr='Please upload a new profile pic';
          $target2=$_SESSION["backgroundSeller"];
      }
      
      if((empty($username) && empty($email) && empty($password) && empty($pp) && empty($background)) || $checkU==1 || $checkE==1 || strlen($password)<6){
          require_once "editProfileSeller.php";
          exit();
      }
      else{
          $ppErr='';
          $backgroundErr='';
          $usernameErr='';
          $emailErr='';
          $passwordErr='';

          $sql3 = "UPDATE `seller` SET `username`='$username',`email`='$email',`password`='$password', `profilePic`='$target1',`background`='$target2' WHERE username='$userSeller'";
          mysqli_query($mysqli, $sql3);
      
          $_SESSION["userSeller"]=$username;
          $_SESSION["backgroundSeller"]=$target2;
          $_SESSION["photoSeller"]=$target1;
          $_SESSION["passwordSeller"]=$password;
          $_SESSION["emailSeller"]=$email;

          move_uploaded_file($_FILES['pp']['tmp_name'],$target1);
          move_uploaded_file($_FILES['background']['tmp_name'],$target2);

          require_once "editProfileSeller.php";

      }
}

?>