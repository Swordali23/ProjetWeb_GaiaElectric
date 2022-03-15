<?php
/*MODEL PAGE

<!--get the connection with the database-->
<!--include this file at the beginning of all CONTROLLER PAGES-->*/
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "root";
  $db_db = "WebProject";
  $db_port = 8889;

  $mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_db);
	
  /* Vérification de la connexion */
if (mysqli_connect_errno()) {
  printf("Échec de la connexion : %s\n", mysqli_connect_error());
  exit();
}

?>