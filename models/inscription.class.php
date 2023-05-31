<?php

class Inscription
{
    private $IDPROF;
    private $NUMSEANCE;
    private $IDELEVE;
	private $DATEINSCRIPTION;
  
    


	
		
		
	
	public function getIdProf() {
		return $this->IDPROF;
	}
	public function getIdEleve() {
		return $this->IDELEVE;
	}
	
	
	public function setNumSeance($NUMSEANCE): self {
		$this->NUMSEANCE = $NUMSEANCE;
		return $this;
	}
	
	public function getNumSeance() {
		return $this->NUMSEANCE;
	}
	
	public function setIdProf($idProf): self {
		$this->IDPROF = $idProf;
		return $this;
	}
	public function setIdEleve($idEleve): self {
		$this->IDELEVE = $idEleve;
		return $this;
	}
	
	

	

	
	
	



    
	public static function afficherTous(){
        $req = MonPdo::getInstance()->prepare("SELECT * from inscription");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'inscription');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }





	public static function nombreInscriptionParSeance($num){
        $req = MonPdo::getInstance()->prepare("SELECT COUNT(*) AS nb_eleve FROM inscription where NUMSEANCE = $num");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'inscription');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->nb_eleve;

    }




	public static function ajouterInscription(Inscription $inscription){
		$idProf = $inscription->getIdProf();
		$idEleve = $inscription->getIdEleve();
		$numSeance = $inscription->getNumSeance();
	
		$reqInscription = MonPdo::getInstance()->prepare("INSERT INTO `inscription`(`IDPROF`, `IDELEVE`, `NUMSEANCE`, `DATEINSCRIPTION`) VALUES (:idProf, :idEleve, :numSeance, :dateInscription)");
		$reqInscription->bindParam(':idProf', $idProf);
		$reqInscription->bindParam(':idEleve', $idEleve);
		$reqInscription->bindParam(':numSeance', $numSeance);
		$dateInscription = date('Y-m-d'); // Format: 'YYYY-MM-DD'
		$reqInscription->bindParam(':dateInscription', $dateInscription);
		
		$reqInscription->execute();
		return $reqInscription;
		
	


	}
	public static function supprimerInscription(Inscription $inscription) {
		
		$idEleve = $inscription->getIdEleve();
		$numSeance = $inscription->getNumSeance();

		$req = MonPdo::getInstance()->prepare("DELETE FROM `payer` WHERE ideleve = :ideleve and numseance =:num");
		$req->bindParam(':ideleve', $idEleve);
		$req->bindParam(':num', $numSeance);

		$req2 = MonPdo::getInstance()->prepare("DELETE FROM `inscription` WHERE ideleve = :ideleve and numseance =:num");
		$req2->bindParam(':ideleve', $idEleve);
		$req2->bindParam(':num', $numSeance);

		$req->execute();
		$req2->execute();
		return $idEleve;
	}
	

	public static function rechercheProduit($bonbon){
        $req = MonPdo::getInstance()->prepare("select * from produit where lower(nom) like :bonbon");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'produit');
        $req->execute(array(':bonbon'=>$bonbon.'%'));
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }
	public static function securiser($donnees){
		$donnees = trim($donnees);
		$donnees = stripslashes($donnees);
		$donnees = htmlspecialchars($donnees);
		return $donnees;

	}

	public static function ajouter(produit $produit){

		$req=MonPdo::getInstance()->prepare("insert into produit(nom, prix, photo) values(:nom, :prix, :photo)");
		$req->bindParam('nom', $produit->getNom());
		$req->bindParam('prix', $produit->getPrix());
		$req->bindParam('photo', $produit->getPhoto());
		$nb = $req->execute();
		return $nb;

	}


}









?>