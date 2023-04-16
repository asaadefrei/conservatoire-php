<?php
$action = $_GET["action"];


switch($action){
  case "verif":
    $rep = Admin::verifier($_POST["login"], ($_POST["mdp"]));
   # var_dump($rep);
    if($rep==true){
      $_SESSION["autorisation"] ="Ok";
      $lesProfs = Prof::afficherTous();
      $nombreProfesseur = Prof::nombreProf();

      $lesEleves = Eleve::afficherTous();
      $nombreEleves = Eleve::nombreEleve();

      $nombreSeances = seance::nombreSeance();      
      $nombreInstruments = Instrument::nombreInstrument();

      include "views/dashboard.php";
    }else{
      include("views/echecConection.php");
    }
    break;
    case "dashboard":
     # var_dump($rep);
     
      $lesProfs = Prof::afficherTous();
      $nombreProfesseur = Prof::nombreProf();
  
      $lesEleves = Eleve::afficherTous();
      $nombreEleves = Eleve::nombreEleve();
      $nombreSeances = seance::nombreSeance();      
      $nombreInstruments = Instrument::nombreInstrument();
  
      include "views/dashboard.php";
    
      break;
    case "listProf":
      $lesProfs = Prof::afficherTous();
      include("views/prof.php");
      break; 
      
    case "listCours":
      $lesCours = seance::afficherTous();
      include("views/cours.php");
      break;

    case "listEleve":
      $lesEleves = Eleve::afficherTous();
      include("views/eleves.php");
      break;

    case "pageAjoutProf":
      $lesInstrument = Instrument::afficherTous();
      include("views/ajoutProf.php");
      break;

    
    case "ajtProf":
      $profs = new prof();
      $profs->setNom($_POST["nom"]);
      $profs->setPrenom($_POST["prenom"]);
      $profs->setTel($_POST["tel"]);
      $profs->setMail($_POST["email"]);
      $profs->setAdresse($_POST["adresse"]);
      $profs->setRef($_POST["instrument"]);
      $profs->setSalaire($_POST["salaire"]);
      prof::ajouterProf($profs);
      $lesProfs = prof::afficherTous();

      include ("views/prof.php");
      break;
    case "pageModifProf":
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $prof = prof::afficherSeul($id);
        $lesInstrument = Instrument::afficherTous();

        include ("views/modifProf.php");
      }else{

        include ("views/prof.php");

      }
      break;
    case "modifProf":
      $idProf = $_GET['id'];
      var_dump($idProf);
      $profs = new prof();
      $profs -> setID($idProf);
      $profs->setNom($_POST["nom"]);
      $profs->setPrenom($_POST["prenom"]);
      $profs->setTel($_POST["tel"]);
      $profs->setMail($_POST["email"]);
      $profs->setAdresse($_POST["adresse"]);
      $profs->setRef($_POST["instrument"]);
      $profs->setSalaire($_POST["salaire"]);
      prof::modifProf($profs);
      $lesProfs = prof::afficherTous();
      include ("views/prof.php");






    case "deleteProf":
      if(isset($_POST['delete'])) {
        
        foreach($_POST['delete'] as $idProf) {
          prof::deleteProf($idProf);
        }

      }
      $lesProfs = prof::afficherTous();

      include ("views/prof.php");
      break;
  

    case "deconect":
      Admin::deconection();
      include("views/connection.php");
      break;
    






}