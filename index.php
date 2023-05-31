<?php

session_start();



include ("views/header.php");
include("models/inscription.class.php");

include("models/eleve.class.php");
include("models/seance.class.php");
include("models/instrument.class.php");
include("models/heure.class.php");
include("models/jour.class.php");
include("models/niveau.class.php");



include("models/prof.class.php");
include("models/admin.class.php");
include("models/monPdo.php");


if(empty($_GET["uc"])){
  $uc="connection";

}else{
  $uc=$_GET["uc"];

}



switch($uc){
  case "connection":
    include "views/connection.php";
      break;
    case "admin":
      include("controleurs/controleurAdmin.php");
      break;
    case "accueil":
      include("controleurs/controleurAdmin.php");
      break;
    case "prof":
      include("controleurs/controleurAdmin.php");
      break;
    case "cours":
      include("controleurs/controleurAdmin.php");
       break;
    case "eleve":
      include("controleurs/controleurAdmin.php");
       break;
    
    


  


}


include "views/footer.php";




?>