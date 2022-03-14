<!--VIEW PAGE-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaïa Electric : Sign Up Seller</title>
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
            <h2>Sign In</h2>
            <p>Please fill in all information</p>
            <form action="validationFormLoginSeller.php" method="post">
                <label>E-mail or Username</label>
                <input type="text" class="form-control" name="emailUsername">
                <?php if(isset($emailUsernameErr)) {?>
                <span style="color:crimson;"> <?php echo $emailUsernameErr ?></span>
                <?php }?>

                <br><br>

                <label>Password</label>
                <input type="password" class="form-control" name="password">
                <?php if(isset($passwordErr)) {?>
                <span style="color:crimson;"> <?php echo $passwordErr ?></span>
                <?php }?>

                <br><br><br>

                <input type="submit" class="btn btn-warning" name="itemsSeller" value="Login">
                <input type="reset" class="btn btn-secondary" value="Reset">

                <br><br>

                <p>Want to become a Seller ? <a href="registerSeller.php">Register here</a></p>

            </form>
        </div>
    </div>

</div>

<html>