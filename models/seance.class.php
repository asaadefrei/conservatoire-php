<?php

class seance
{
    private $IDPROF;
    private $NUMSEANCE;
    private $TRANCHE;
	private $NIVEAU;
    private $JOUR;
	private $CAPACITE;
    



	public function setIDPROF($IDPROF) {	
		$this ->IDPROF = $IDPROF;
		return $this;
	}
	

	
		
		
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
	public static function afficherSeul($id){
        $req = MonPdo::getInstance()->prepare("SELECT * FROM seance where numseance=:id");
		$req->bindParam(':id', $id);
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetch();
        return $lesResultats;

    }
	public static function afficherIdProf($id){
        $req = MonPdo::getInstance()->prepare("SELECT idprof FROM seance where numseance=:id");
		$req->bindParam(':id', $id);
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetch();
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
	
	public static function verifierNumeroSeance($numeroSeance, $nomProf) {
		$id=prof::getIdProf($nomProf);
		$pdo = MonPdo::getInstance();
		$req = $pdo->prepare("SELECT COUNT(*) FROM seance WHERE num = :numeroSeance and idProf = :id");
		$req->bindParam(':numeroSeance', $numeroSeance);
		$req->bindParam(':id', $id);


		$req->execute();
		$resultat = $req->fetchColumn();
	
		return $resultat < 0; // Renvoie true si le numéro de séance existe, sinon false
	}







	public static function securiser($donnees){
		$donnees = trim($donnees);
		$donnees = stripslashes($donnees);
		$donnees = htmlspecialchars($donnees);
		return $donnees;

	}

	public static function ajouterSeance(seance $Seance){

		$reqNum = MonPdo::getInstance()->prepare("SELECT MAX(numseance) as maxNum FROM `seance`");
		$reqNum->execute();
		$numeroSeanceMax = $reqNum->fetchColumn();
		$numeroSeanceMax = $numeroSeanceMax + 1;

		$reqSeance=MonPdo::getInstance()->prepare("INSERT INTO `seance` (`IDPROF`, `NUMSEANCE`, `TRANCHE`, `JOUR`, `NIVEAU`, `CAPACITE`) VALUES (:id, :num, :tranche, :jour, :niveau, :capacite);");
		$idProf = $Seance->getIdProf();
		$reqSeance->bindParam(':id', $idProf);
		$numSeance = $Seance->getNumSeance();
		$reqSeance->bindParam(':num', $numeroSeanceMax);
		$jour = $Seance->getJour();
		$reqSeance->bindParam(':jour', $jour);
		$tranche =  $Seance->getTranche();
		$reqSeance->bindParam(':tranche', $tranche);
		$niveau = $Seance->getNIVEAU();
		$reqSeance->bindParam(':niveau', $niveau);
		$capacite = $Seance->getCapacite();
		$reqSeance->bindParam(':capacite', $capacite);

		$nb = $reqSeance->execute();

		return $nb;



	}
	public static function modifierSeance(seance $Seance){

		

        $reqSeance = MonPdo::getInstance()->prepare("UPDATE `seance` SET `IDPROF` = :id, `TRANCHE` = :tranche, `JOUR` = :jour, `NIVEAU` = :niveau, `CAPACITE` = :capacite WHERE `NUMSEANCE` = :num;");
		$idProf = $Seance->getIdProf();
		$reqSeance->bindParam(':id', $idProf);
		$numSeance = $Seance->getNumSeance();
		$reqSeance->bindParam(':num', $numSeance);
		$jour = $Seance->getJour();
		$reqSeance->bindParam(':jour', $jour);
		$tranche =  $Seance->getTranche();
		$reqSeance->bindParam(':tranche', $tranche);
		$niveau = $Seance->getNIVEAU();
		$reqSeance->bindParam(':niveau', $niveau);
		$capacite = $Seance->getCapacite();
		$reqSeance->bindParam(':capacite', $capacite);

		$nb = $reqSeance->execute();

		return $nb;



	}

	public static function deleteSeance($numSeance){

		$reqPayer = MonPdo::getInstance()->prepare("DELETE FROM `payer` WHERE numseance = :num");
		$reqPayer->bindParam(':num', $numSeance);
		$reqPayer->execute();
		
		$reqInscription = MonPdo::getInstance()->prepare("DELETE FROM `inscription` WHERE  numseance = :num");
		$reqInscription->bindParam(':num', $numSeance);
		$reqInscription->execute();

		$reqInscription2 = MonPdo::getInstance()->prepare("DELETE FROM `inscription` WHERE  numseance LIKE :num");
		$reqInscription2->bindParam(':num', $numSeance);
		$reqInscription2 ->execute();



		// Delete records from `payer` table
		$reqPayer = MonPdo::getInstance()->prepare("DELETE FROM `seance` WHERE numseance = :num");
		$reqPayer->bindParam(':num', $numSeance);
		$reqPayer->execute();
		return $numSeance;

		
	}




}









?>