<!--VIEW PAGE-->



<?php
session_start();
?>


<!DOCTYPE html>

<html lang="en">

    <head> 
        <title>GaïaElectric : Homepage for Buyer</title> 
        <link rel="icon" href="public/images/logoWebsite.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

        <style>
          /*Carousel*/

#carrousel{
    position:relative;
    height:688px;
    width:1200px;
    margin:auto;
    overflow: hidden;
}
#slide{
	width: 3600px;
	height: 688px;
	margin-left: 0px;
}
.image{
	float:left
}
.image img{
  width:1200px;
  height: 688px; 
}


.buttonCar>#b2{
  position: absolute;
  left: 1250px;
  top: 570px;
}
.buttonCar>#b1{
  position: absolute;
  left: 130px;
  top: 570px;
}

/*Items*/
#myItem{
	max-width: 100%;
	height: auto;
}
#myItem1{
	max-width: 25%;
	height: auto;
}






/*Responsive*/

@media(max-width:800px){
	.navbar-brand>img{
		width:90px;
		height:90px;
	}
	#carrousel{
		border: solid;
		position:relative;
		height:300px;
		width:600px;
		margin:auto;
		overflow: hidden;
	}
	#slide{
		width: 4200px;
		height: 600px;
		margin-left: 0px;
	}
	.image{
		float:left
	}
	.image img{
		width: 600px;
		height: 300px;
	}
}

@media(max-width:700px){
	.navbar-brand>img{
		width:70px;
		height:70px;
	}
	.navbar-toggler{
		margin: 0 auto;
	}
	#carrousel{
		border: solid;
		position:relative;
		height:200px;
		width:450px;
		margin:auto;
		overflow: hidden;
	}
	#slide{
		width: 2800px;
		height: 450px;
		margin-left: 0px;
	}
	.image{
		float:left
	}
	.image img{
		width: 450px;
		height: 200px;
	}
}
        </style>
    </head> 
    
   <body>

       <!--- Navigation -->
       <div class="container-fluid navbar navbar-expand-lg navbar-light bg-light sticky-top py-0">
           
                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12 text-center">
                    <a class="navbar-brand" href="index.php"><img src="public/images/logoWebsite.png" width="140" height="140"></a>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 dropdown d-flex justify-content-end" >
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                      Review Categories 
                    </button>
                    <div class="dropdown-menu">
                      <form action="showItem.php" method="post">
                        <input type="submit" class="dropdown-item" name="monocristallin" value="Monocristallin">
                        <input type="submit" class="dropdown-item" name="polycristallin" value="Polycristallin">
                      </form>
                    </div>
                </div>
 
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-10">
                    <form class="form-inline d-flex flex-row" action="showItem.php" id="searchBar" method="post">
                        <input class="form-control" type="search" name="searchMode" placeholder="Search"> 
                        <button class="btn btn-outline-success " type="submit" name="searchM">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                        </button>
                     </form>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#list">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                <div class="col-lg-3 col-md-3 col-sm-1 col-xs-2 collapse navbar-collapse justify-content-end" id="list">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                      <?php
                      if(isset($_SESSION["userSeller"])){
                        echo '<a class="nav-link h5" role="button" href="homepageSeller.php">Sell</a>';
                      }
                      else{
                        echo '<a class="nav-link h5" role="button" href="loginSeller.php">Sell</a>';
                      }
                      ?>                      
                      </li>
                      &emsp;
                      <?php
                      if(isset($_SESSION["userBuyer"])){
                        echo "<li class='nav-item dropdown'>";
                        echo '<a class="nav-link h5 dropdown-toggle" role="button" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $_SESSION["userBuyer"];
                        echo '</a>';
                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        echo '<a class="dropdown-item" href="#">My Infos</a>';
                        echo '<a class="dropdown-item" href="#">My Orders</a>';
                        echo '<div class="dropdown-divider"></div>';
                        echo '<a class="dropdown-item" href="logout.php">Log Out</a>';
                        echo '</div></li>';
                        echo '&emsp;';
                        echo '<li class="nav-item d-flex flex-row">';
                        echo '<a class="nav-link" href="cartBuyer.php"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">';
                        echo '<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
                        echo '</svg></a>';
                        if (isset($_SESSION['cart'])){
                            $count = $_SESSION['cart'];
                            echo "<span id=\"cart_count\" class=\"text-warning \">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning \">0</span>";
                        }
                        echo '</li></ul>';
                      } 
                      else{
                        echo "<li class='nav-item'>";
                        echo '<a class="nav-link h5" href="loginBuyer.php">Your account</a>';
                        echo '</li>';
                        echo '&emsp;';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="loginBuyer.php"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">';
                        echo '<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
                        echo '</svg></a>';
                        echo '</li></ul>';
                      }      
                      ?>
                </div>
              </div>

              <div class="wrapper">

              

              <br><br><br>