<!--CONTROLLER PAGE-->


<?php
include_once ('databaseConn.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<?php
$idSeller=$_SESSION["userIdSeller"];

$title= $_POST['title'];
$description=$_POST['description'];
$category=$_POST['category'];
$buyItNow= $_POST['buyItNow'];
$price=$_POST['price'];
$image1=$_FILES['image1']['name'];
$image2=$_FILES['image2']['name'];
$image3=$_FILES['image3']['name'];
$checkImage=1;
$checkPurchase=1;
$checkPrice=1;
$checkTime=1;


if (empty($title)){
  $titleErr='Please give a title to your product';
}
if (empty($description)){
  $descriptionErr='Please give a description to your product';
}

if (empty($image1) && empty($image2) && empty($image3)) {
    // No file was selected for upload
    $imageErr='You need to upload at least one image of your product';
    $checkImage=0;
}
if(isset($image1)){
    $target1="public/images/".basename($_FILES['image1']['name']);
}else{
    $target1="";
}
if(isset($image2)){
    $target2="public/images/".basename($_FILES['image2']['name']);
}else{
    $target2="";
}
if(isset($image3)){
    $target3="public/images/".basename($_FILES['image3']['name']);
}else{
    $target3="";
}

if((empty($image1) && isset($image2) && isset($image3)) || (empty($image1) && isset($image2) && empty($image3))){
    $target1=$target2;
    $target2=$target3;
    $target3="";
}
elseif(isset($image1) && empty($image2) && isset($image3)){
    $target2=$target3;
    $target3="";
}
elseif(empty($image1) && empty($image2) && isset($image3)){
    $target1=$target3;
    $target2="";
    $target3="";
}


if(empty($buyItNow)){
    $purchaseErr='Please select a purchase process';
    $checkPurchase=0;

}

if(isset($buyItNow)){
    if(empty($price)){
        $priceErr='Please set up a price';
        $checkPrice=0;
    }
    elseif(!is_numeric($price)){
        $priceErr='Incorrect value';
        $checkPrice=0;
    } 
}


if(empty($title) || empty($description) || $checkImage==0 || $checkPrice==0 || $checkTime==0  || $checkPurchase==0){
    require_once "addItemSeller.php";
    exit();
}
else{

    $sql = "INSERT INTO item(idSeller, title, description, price, category, image1, image2, image3) VALUES ('$idSeller', '$title', '$description', '$price', '$category', '$target1', '$target2', '$target3');";
    mysqli_query($mysqli, $sql);
    
    $success='Item added successfully !';

    move_uploaded_file($_FILES['image1']['tmp_name'],$target1);
    move_uploaded_file($_FILES['image2']['tmp_name'],$target2);
    move_uploaded_file($_FILES['image3']['tmp_name'],$target3);

    require_once "addItemSeller.php";
}

?>

