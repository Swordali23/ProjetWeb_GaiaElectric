<!--CONTROLLER PAGE-->


<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
session_unset();
session_destroy();

require_once "index.php";

?>