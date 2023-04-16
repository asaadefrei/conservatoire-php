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
	
	public function setNumSeance($NUMSEANCE): self {
		$this->NUMSEANCE = $NUMSEANCE;
		return $this;
	}
	
	public function getNumSeance() {
		return $this->NUMSEANCE;
	}
	

	

	

	
	
	



    
	public static function afficherTous(){
        $req = MonPdo::getInstance()->prepare("SELECT * from inscription");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'inscription');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }

	public static function nombreInscriptionParSeance($id){
        $req = MonPdo::getInstance()->prepare("SELECT COUNT(*) AS nb_eleve FROM inscription where NUMSEANCE = $id");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'inscription');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->nb_eleve;

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