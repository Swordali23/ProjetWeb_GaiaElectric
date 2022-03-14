<!--VIEW PAGE-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaïa Electric : Sign Up Buyer</title>
    <link rel="icon" href="public/images/logoWebsite.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h2>Register</h2>
            <p>Please fill in all information</p>
            <form action="validationFormRegisterBuyer.php" method="post">
                <label>Last Name *</label>
                <input type="text" class="form-control" name="lastName">
                <?php if(isset($lastNameErr)) {?>
                <span style="color:crimson;"><?php echo $lastNameErr ?></span>
                <?php }?>

                <br><br>

                <label>First Name *</label>
                <input type="text" class="form-control" name="firstName">
                <?php if(isset($firstNameErr)) {?>
                <span style="color:crimson;"> <?php echo $firstNameErr ?></span>
                <?php }?>

                <br><br>

                <label>Address *</label>
                <input type="text" class="form-control" name="address1">
                <?php if(isset($address1Err)) {?>
                <span style="color:crimson;"> <?php echo $address1Err ?></span>
                <?php }?>

                <br><br>

                <label>City *</label>
                <input type="text" class="form-control" name="city">
                <?php if(isset($cityErr)) {?>
                <span style="color:crimson;"> <?php echo $cityErr ?></span>
                <?php }?>

                <br><br>

                <label>Postal code *</label>
                <input type="text" class="form-control" name="postalCode">
                <?php if(isset($postalCodeErr)) {?>
                <span style="color:crimson;"> <?php echo $postalCodeErr ?></span>
                <?php }?>

                <br><br>

                <label>Country *</label>
                <input type="text" class="form-control" name="country">
                <?php if(isset($countryErr)) {?>
                <span style="color:crimson;"> <?php echo $countryErr ?></span>
                <?php }?>

                <br><br>

                <label>Phone*</label>
                <input type="text" class="form-control" name="phone">
                <?php if(isset($phoneErr)) {?>
                <span style="color:crimson;"> <?php echo $phoneErr ?></span>
                <?php }?>

                <br><br>
               
                <label>E-mail*</label>
                <input type="text" class="form-control" name="email">
                <?php if(isset($emailErr)) {?>
                <span style="color:crimson;"> <?php echo $emailErr ?></span>
                <?php }?>

                <br><br>


                <label>Password*</label>
                <input type="password" class="form-control" name="password">
                <?php if(isset($passwordErr)) {?>
                <span style="color:crimson;"> <?php echo $passwordErr ?></span>
                <?php }?>


                <br><br><br>

                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary" value="Reset">

                <br><br>

                <p>Already have an account? <a href="loginBuyer.php">Login here</a></p>

            </form>
        </div>
    </div>

</div>

<html>