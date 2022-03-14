<!--CONTROLLER PAGE-->



<?php
include_once ('databaseConn.php');
?>


<?php
$lastName= $_POST['lastName'];
$firstName=$_POST['firstName'];
$email=$_POST['email'];
$password=$_POST['password'];
$address1= $_POST['address1'];
$postalCode=$_POST['postalCode'];
$country=$_POST['country'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$check=0;

if (empty($lastName)){
  $lastNameErr='Please enter your last name';
}
if (empty($firstName)){
  $firstNameErr='Please enter your first name';
}

if (empty($email)){
  $emailErr='Please enter your email';
} else{
    $sql = "SELECT * FROM buyer WHERE email='$email';";
    $result = mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        $emailErr='This email is already taken';
        $check=1;
    }
}

if (empty($address1)){
    $address1Err='Please enter your address';
}

if (empty($postalCode)){
    $postalCodeErr='Please enter your postal code';
}

if (empty($country)){
    $countryErr='Please enter your country';
}

if (empty($city)){
    $cityErr='Please enter your city';
}

if (empty($phone)){
    $phoneErr='Please enter your phone number';
} elseif (!is_numeric($phone) || strlen($phone)<10){
    $phoneErr='Your phone number should have only numbers and at least 10 numbers';
}

if (empty($password)){
  $passwordErr='Please enter a password';
}
elseif(strlen($password)<6){
    $passwordErr='Your password need to have at least 6 characters';
}

if(empty($lastName) || empty($firstName) || empty($email) || empty($password) || empty($address1) || empty($postalCode) || empty($country) || empty($city) || (!is_numeric($phone) || strlen($phone)<10) || (strlen($password)<6) || $check==1 ){
    require_once "registerBuyer.php";
    exit();
}
else{
    $sql2 = "INSERT INTO buyer(lastName, firstName, email, password, phone, address1, city, postalCode, country) VALUES ('$lastName', '$firstName', '$email', '$password', '$phone', '$address1', '$city','$postalCode','$country');";
    mysqli_query($mysqli, $sql2);

    session_start();

    $sql3 = "SELECT * FROM buyer WHERE email LIKE '$email';";
    $result = mysqli_query($mysqli, $sql3);
    $resultCheck = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION["idBuyer"]=$row['id'];
        $_SESSION["userBuyer"]=$row['firstName']." ".$row['lastName'];
    }

    require_once "index.php";
    exit();
}
?>

