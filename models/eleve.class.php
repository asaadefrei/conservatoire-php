<?php

class Eleve
{
	private $id;
	private $nom;
	private $prenom;
	private $tel;
	private $mail;
	private $adresse;
	private $niveau;
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($Id): self {
		$this->id = $Id;
		return $this;
	}
	
	public function setNom($nom): self {
		$this->nom = $nom;
		return $this;
	}
	
	public function getNom() {
		return $this->nom;
	}
	
	public function setPrenom($prenom): self {
		$this->prenom = $prenom;
		return $this;
	}
	
	public function getPrenom() {
		return $this->prenom;
	}
	
	public function setTel($tel): self {
		$this->tel = $tel;
		return $this;
	}
	
	public function getTel() {
		return $this->tel;
	}
	
	
	public function setMail($mail): self {
		$this->mail = $mail;
		return $this;
	}
	
	public function getMail() {
		return $this->mail;
	}
	
	public function setAdresse($adresse): self {
		$this->adresse = $adresse;
		return $this;
	}
	
	public function getAdresse() {
		return $this->adresse;
	}
	
	public function setNiveau($niveau): self {
		$this->niveau = $niveau;
		return $this;
	}
	
	public function getNiveau() {
		return $this->niveau;
	}
	
	



    public static function afficherTous(){
        $req = MonPdo::getInstance()->prepare("SELECT nom,prenom,niveau,tel,mail,adresse,id FROM eleve JOIN personne ON eleve.IDELEVE = personne.id");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }

	public static function afficherSeul($id){
        $req = MonPdo::getInstance()->prepare("SELECT id,nom,prenom,tel,mail,adresse,niveau FROM eleve JOIN personne ON eleve.IDELEVE = personne.id where idELEVE=:id");
		$req->bindParam(':id', $id);
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req->execute();
        $lesResultats = $req->fetch();
        return $lesResultats;

    }

	public static function pasDansLeCours($num){
        $req = MonPdo::getInstance()->prepare("SELECT personne.nom,personne.prenom,personne.id FROM eleve LEFT JOIN inscription ON eleve.ideleve = inscription.IDELEVE LEFT JOIN personne ON personne.id = eleve.IDELEVE WHERE NOT NUMSEANCE = :num OR inscription.IDELEVE IS NULL;");
		$req->bindParam(':num', $num);   
		$req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }
	public static function dansLeCours($num){
        $req = MonPdo::getInstance()->prepare("SELECT personne.id, nom, prenom FROM `inscription` join personne on personne.id = inscription.ideleve WHERE NUMSEANCE = :num");
		$req->bindParam(':num', $num);   
		$req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }
	




	public static function ajouterEleve(Eleve $eleve){

		$reqPersonne=MonPdo::getInstance()->prepare("INSERT INTO `personne`(`NOM`, `PRENOM`, `TEL`, `MAIL`, `ADRESSE`) VALUES (:nom, :prenom, :tel, :mail, :adresse);");
		$nom = $eleve->getNom();
		$reqPersonne->bindParam(':nom', $nom);
		$prenom = $eleve->getPrenom();
		$reqPersonne->bindParam(':prenom', $prenom);
		$tel = $eleve->getTel();
		$reqPersonne->bindParam(':tel', $tel);
		$mail =  $eleve->getMail();
		$reqPersonne->bindParam(':mail', $mail);
		$adresse = $eleve->getAdresse();
		$reqPersonne->bindParam(':adresse', $adresse);
		$nb = $reqPersonne->execute();

		$reqId = MonPdo::getInstance()->prepare("SELECT MAX(ID) as maxId FROM `personne`");
		$reqId->execute();
		$idPersonneMax = $reqId->fetchColumn();
		

		$reqEleve =MonPdo::getInstance()->prepare("INSERT INTO `eleve`(`IDELEVE`, `NIVEAU`, `BOURSE`) VALUES ( :id, :niveau, NULL)");
		$niveau = $eleve->getNiveau();
		$reqEleve->bindParam(':niveau', $niveau);
		$reqEleve->bindParam(':id', $idPersonneMax);
		$nb2 = $reqEleve->execute();





	}


	public static function modifEleve(Eleve $eleve){
        $req = MonPdo::getInstance()->prepare("UPDATE eleve inner join personne on eleve.IDELEVE=personne.id SET nom=:nom,prenom=:prenom,adresse=:adresse,tel=:tel, mail=:mail,niveau=:niveau WHERE eleve.IDELEVE=:id");
		$nom = $eleve->getNom();
		$req->bindParam(':nom', $nom);
		$prenom = $eleve->getPrenom();
		$req->bindParam(':prenom', $prenom);
		$tel = $eleve->getTel();
		$req->bindParam(':tel', $tel);
		$mail =  $eleve->getMail();
		$req->bindParam(':mail', $mail);
		$adresse = $eleve->getAdresse();
		$req->bindParam(':adresse', $adresse);
		
		$niveau = $eleve->getNiveau();
		$req->bindParam(':niveau', $niveau);
		$idEleve = $eleve -> getId();
		$req->bindParam(':id', $idEleve);
        $req->execute();
		

    }


	public static function deleteEleve($idEleve){


		

		// Delete records from `payer` table
		$reqPayer = MonPdo::getInstance()->prepare("DELETE FROM `payer` WHERE idEleve = :idEleve");
		$reqPayer->bindParam(':idEleve', $idEleve);
		$reqPayer->execute();

		// Delete records from `inscription` table
		$reqInscription = MonPdo::getInstance()->prepare("DELETE FROM `inscription` WHERE idEleve = :idEleve");
		$reqInscription->bindParam(':idEleve', $idEleve);
		$reqInscription->execute();


		// Delete record from `prof` table
		$reqProf = MonPdo::getInstance()->prepare("DELETE FROM `eleve` WHERE idEleve = :idEleve");
		$reqProf->bindParam(':idEleve', $idEleve);
		$reqProf->execute();

		$reqPersonne = MonPdo::getInstance()->prepare("DELETE FROM `personne` WHERE id = :idEleve");
		$reqPersonne->bindParam(':idEleve', $idEleve);
		$reqPersonne->execute();

	}

	public static function nombreEleve(){
        $req = MonPdo::getInstance()->prepare("SELECT COUNT(*) AS nb_eleve FROM eleve");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
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