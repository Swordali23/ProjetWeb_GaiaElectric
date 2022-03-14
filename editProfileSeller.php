<!--VIEW PAGE-->



<!--Header for sellers-->
<?php
include_once 'headerSeller.php';
?>

<!--Content of the index page-->

<form action="validationFormEditProfile.php" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <div class="row justify-content-center text-center">
        <div class="col-md-4">
            <h2>Edit Your Profile</h2>
            <br>
            <label>Change your Username</label>
            <input type="text" class="form-control" name="username">
            <?php if(isset($usernameErr)) {?>
            <span style="color:crimson;"><?php echo $usernameErr ?></span>
            <?php }?>

            <br><br>

            <label>Change your Email (Your actual is : <?php echo $_SESSION["emailSeller"];?>)</label>
            <input type="text" class="form-control" name="email">
            <?php if(isset($emailErr)) {?>
            <span style="color:crimson;"><?php echo $emailErr ?></span>
            <?php }?>

            <br><br>

            <label>Change your password (Your actual is : <?php echo $_SESSION["passwordSeller"];?>)</label>
            <input type="password" class="form-control" name="password">
            <?php if(isset($passwordErr)) {?>
            <span style="color:crimson;"><?php echo $passwordErr ?></span>
            <?php }?>

            <br><br>

            <label class="py-3">Change your Profile Picture</label>
            <div class="form-group">
                <label for="pp">Profile Pic :</label>
                <input type="file" class="form-control-file" name="pp" id="pp">
            </div>
            <?php if(isset($ppErr)) {?>
            <span style="color:crimson;"> <?php echo $ppErr ?></span>
            <?php }?>

            <br>

            <label class="py-3">Change your Background</label>
            <div class="form-group">
                <label for="background">Background :</label>
                <input type="file" class="form-control-file" name="background" id="background">
            </div>
            <?php if(isset($backgroundErr)) {?>
            <span style="color:crimson;"> <?php echo $backgroundErr ?></span>
            <?php }?>

            <br><br>
        </div>

    <div class="row justify-content-center text-center">
        <div class="col-md-3">
            <input type="submit" class="btn btn-primary" name="editSeller" value="Edit">
            <input type="reset" class="btn btn-secondary" value="Reset">
        </div>
    </div>
</div>
</form>
      
<?php
include_once 'footer.php';
?>
