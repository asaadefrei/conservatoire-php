<?php

class seance
{
    private $IDPROF;
    private $NUMSEANCE;
    private $TRANCHE;
	private $NIVEAU;
    private $JOUR;
	private $CAPACITE;
    


	
		
		
		public function getNIVEAU() {
		return $this->NIVEAU;
		}
		
		public function setNIVEAU($NIVEAU): self {
		$this->NIVEAU = $NIVEAU;
		return $this;
		}

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
	
	public function setTranche($TRANCHE): self {
		$this->TRANCHE = $TRANCHE;
		return $this;
	}
	
	public function getTranche() {
		return $this->TRANCHE;
	}
	
	public function setJour($JOUR): self {
		$this->JOUR = $JOUR;
		return $this;
	}
	
	public function getJour() {
		return $this->JOUR;
	}
	
	
	
	public function setCapacite($CAPACITE): self {
		$this->CAPACITE = $CAPACITE;
		return $this;
	}
	
	public function getCapacite() {
		return $this->CAPACITE;
	}

	
	
	



    
	public static function afficherTous(){
        $req = MonPdo::getInstance()->prepare("SELECT * from seance");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }

	public static function nombreSeance(){
        $req = MonPdo::getInstance()->prepare("SELECT COUNT(*) AS nb_seance FROM seance");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->nb_seance;

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