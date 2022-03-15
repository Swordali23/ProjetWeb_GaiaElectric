<!--VIEW PAGE-->



<?php
session_start();
?>


<!DOCTYPE html>

<html lang="en">

    <head> 
        <title>Gaïa Electric: Homepage for Seller</title> 
        <link rel="icon" href="public/images/logoWebsite.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="public/css/homepageSeller.css" rel="stylesheet" type="text/css"/>
    </head> 
    
   <body>
       
           <div class="container-fluid navbar navbar-expand-lg navbar-info bg-info sticky-top justify-content-center text-center ">
               <div class="col-xl-4 col-md-4 col-sm-12 col-xs-12" id="avatar">
                   <div class="profil-header">
                       <img src="<?php echo $_SESSION["photoSeller"]; ?>" width="130" height="130" class="mb-2 img-thumbnail"><br>
                       <a href="editProfileSeller.php" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
                   </div>
                   &emsp;
                   <div class="media-body mb-5 text-dark">
                       <h4 class="mt-5 mb-0">
                       <?php 
                       echo $_SESSION["userSeller"];
                       ?>
                       </h4>
                       <p class="small mb-4"> Seller</p>
                    </div>
               </div>

               <div class="col-xl-4 col-md-4 col-sm-12 col-xs-12" id="side">
                   <ul class="navbar-nav">
                       <li class="nav-item">
                           <a class="nav-link h5 text-dark" href="index.php">Buy</a>
                        </li>
                        &emsp;
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle h5 text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Your Account</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="editProfileSeller.php">My Infos</a>
                                <form action="showItem.php" method="post">
                                    <input type="submit" class="dropdown-item" name="itemsSeller" value="My Items">
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </li>
                    </ul>
               </div>
            </div>
            <div class="wrapper" style="background:url(<?php echo $_SESSION["backgroundSeller"]; ?>);background-repeat:no-repeat;background-size: 100% 100%;">
            <!--Background-->

            <br><br>