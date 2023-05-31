<?php
$action = $_GET["action"];

switch($action){
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


# case prof 

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
      #var_dump($idProf);
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


# case cours

      case "pageAjoutCours":
        $lesProfs = Prof::afficherTous();
        $lesTranches = Heure::afficherHeure();
        $lesJours = Jour::afficherJour();
        $lesNiveaux = Niveau::afficherNiveau();
        include("views/ajoutCours.php");
      break;

      case "ajtCours":
      $cours = new seance();
      $id = Prof::getIdProf($_POST["nomProf"]);
      $cours->setIDPROF($id);
      $cours->setJour($_POST["jour"]);
      $cours->setTranche($_POST["tranche"]);
      $cours->setNIVEAU($_POST["niveau"]);
      $cours->setCapacite($_POST["capacite"]);
      seance::ajouterSeance($cours);
      $lesCours = seance::afficherTous();
      include("views/cours.php");
      break;

      

      case "pageModifCours":
        if(isset($_GET['id'])) {
          $idSeance = $_GET['id'];
          $cours = seance::afficherSeul($idSeance);
        ;

          $lesProfs = Prof::afficherTous();
          $lesTranches = Heure::afficherHeure();
          $lesJours = Jour::afficherJour();
          $lesNiveaux = Niveau::afficherNiveau();
          include ("views/modifCours.php");
        }else{
    
          include ("views/cours.php");
    
        }
        break;

        case "modifCours":
          $cours = new seance();
          $cours->setIDPROF($_POST["idProf"]);
          $cours->setJour($_POST["jour"]);
          $cours->setTranche($_POST["tranche"]);
          $cours->setNIVEAU($_POST["niveau"]);
          $cours->setCapacite($_POST["capacite"]);
          $cours->setNumSeance($_POST["num"]);
          seance::modifierSeance($cours);
          $lesCours = seance::afficherTous();
          include("views/cours.php");
      



    

      case "deleteCours":
        $idDelete = $_GET['id'];
        seance::deleteSeance($idDelete);
        $lesCours = seance::afficherTous();
        include("views/cours.php");
        break;


# case eleve

        case "pageAjoutEleve":
          $lesNiveaux = Niveau::afficherNiveau();
          include("views/ajoutEleve.php");
          break;

        case "ajtEleve":
            $eleve = new eleve();
            $eleve->setNom($_POST["nom"]);
            $eleve->setPrenom($_POST["prenom"]);
            $eleve->setTel($_POST["tel"]);
            $eleve->setMail($_POST["email"]);
            $eleve->setAdresse($_POST["adresse"]);
            $eleve->setNiveau($_POST["niveau"]);
            Eleve::ajouterEleve($eleve);
            $lesEleves = Eleve::afficherTous();
      
            include("views/eleves.php");
            break;

         case "pageModifEleve":
            if(isset($_GET['id'])) {
              $id = $_GET['id'];
              $eleve = Eleve::afficherSeul($id);
              $lesNiveaux = Niveau::afficherNiveau();
              include ("views/modifEleve.php");
            }else{
        
              include ("views/eleves.php");
        
            }
            break;

           case "modifEleve":
              $idEleve = $_POST['id'];

              $eleve = new Eleve();
              $eleve -> setId($idEleve);
              $eleve->setNom($_POST["nom"]);
              $eleve->setPrenom($_POST["prenom"]);
              $eleve->setTel($_POST["tel"]);
              $eleve->setMail($_POST["email"]);
              $eleve->setAdresse($_POST["adresse"]);
              $eleve->setNiveau($_POST["niveau"]);
              Eleve::modifEleve($eleve);
              $lesEleves = Eleve::afficherTous();
              include ("views/eleves.php");
              break;

             
  


        case "deleteEleve":
          if(isset($_POST['delete'])) {
            
            foreach($_POST['delete'] as $idDelete) {
              Eleve::deleteEleve($idDelete);
            }
    
          }
          $lesEleves = Eleve::afficherTous();
          include("views/eleves.php");
          break;


          #ajtelevecours
          case "pageAjoutEleveCours":
            $num = $_GET["id"];
            $lesElevesPasDansLeCours = Eleve::pasDansLeCours($num);
            $lesElevesDansLeCours = Eleve::dansLeCours($num);
            $cours = new seance();
            $cours -> setNumSeance($num);
            $cours -> setIDPROF($_GET["idProf"]);
            include("views/coursEleve.php");
            break;

          case "ajtEleveCours":
            
            if(isset($_POST['add'])) {
        
              foreach($_POST['add'] as $idEleve) {

                $inscription = new Inscription();
                $inscription->setNumSeance($_POST["numSeance"]);
                $inscription->setIdProf($_POST["idProf"]);
                $inscription->setIdEleve($idEleve); 
                Inscription::ajouterInscription($inscription);
                $lesCours = seance::afficherTous();



              }
      
            }
           

              include("views/cours.php");
              break;

  

              case "deleteEleveCours":
            
                if(isset($_POST['add'])) {
            
                  foreach($_POST['add'] as $idEleve) {

                    $inscription = new Inscription();
                    $inscription->setNumSeance($_POST["numSeance"]);
                    $inscription->setIdEleve($idEleve); 
                    Inscription::supprimerInscription($inscription);
                    $lesCours = seance::afficherTous();
    
    
    
                  }
          
                }
    
    
    
                  include("views/cours.php");
                  break;
      




  
    #admin

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


    case "deconect":
      Admin::deconection();
      include("views/connection.php");
      break;
    
      case "pdf":
        $num = $_GET["num"];
        $lesElevesDansLeCours = Eleve::dansLeCours($num);
        
        // Include the PDF generation code
        require("views/pdf.php");
        break;
    





}