<?php

class Prof
{
	private $id;
	private $nom;
	private $prenom;
	private $tel;
	private $ref;
	private $mail;
	private $adresse;
	private $salaire;
	
	
	public function getId() {
		return $this->id;
	}
	public function setID($id): self {
		$this->id = $id;
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
	
	public function setRef($ref): self {
		$this->ref = $ref;
		return $this;
	}
	
	public function getRef() {
		return $this->ref;
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
	
	public function setSalaire($salaire): self {
		$this->salaire = $salaire;
		return $this;
	}
	
	public function getSalaire() {
		return $this->salaire;
	}
	




    public static function afficherTous(){
        $req = MonPdo::getInstance()->prepare("SELECT id,nom,prenom,tel,ref,mail,adresse,salaire FROM prof JOIN personne ON prof.IDPROF = personne.id");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }

	public static function afficherSeul($id){
        $req = MonPdo::getInstance()->prepare("SELECT id,nom,prenom,tel,ref,mail,adresse,salaire FROM prof JOIN personne ON prof.IDPROF = personne.id where idprof=:id");
		$req->bindParam(':id', $id);
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->execute();
        $lesResultats = $req->fetch();
        return $lesResultats;

    }
	public static function nombreProf(){
        $req = MonPdo::getInstance()->prepare("SELECT COUNT(*) AS nb_prof FROM prof");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->nb_prof;

    }
	public static function getNomProf($id){
        $req = MonPdo::getInstance()->prepare("SELECT nom FROM `personne` where id = $id");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->nom;

    }
	public static function getPrenomProf($id){
        $req = MonPdo::getInstance()->prepare("SELECT prenom FROM `personne` where id = $id");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->nom;

    }
	public static function getIdProf($nomPrenom){
		$nomPrenomArray = explode(' ', $nomPrenom);
		$nom = $nomPrenomArray[0];
		$prenom = $nomPrenomArray[1];
	
		$req = MonPdo::getInstance()->prepare("SELECT id FROM `personne` WHERE nom = :nom AND prenom = :prenom");
		$req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');

		$req->bindParam(':nom', $nom);
		$req->bindParam(':prenom', $prenom);
		$req->execute();
		$lesResultats = $req->fetch();
		return $lesResultats->id;
	}
	

	public static function getInstrumentProf($id){
        $req = MonPdo::getInstance()->prepare("SELECT ref FROM `prof` where idprof = $id");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->ref;

    }

	public static function ajouterProf(prof $profs){

		$reqPersonne=MonPdo::getInstance()->prepare("INSERT INTO `personne`(`NOM`, `PRENOM`, `TEL`, `MAIL`, `ADRESSE`) VALUES (:nom, :prenom, :tel, :mail, :adresse);");
		$nom = $profs->getNom();
		$reqPersonne->bindParam(':nom', $nom);
		$prenom = $profs->getPrenom();
		$reqPersonne->bindParam(':prenom', $prenom);
		$tel = $profs->getTel();
		$reqPersonne->bindParam(':tel', $tel);
		$mail =  $profs->getMail();
		$reqPersonne->bindParam(':mail', $mail);
		$adresse = $profs->getAdresse();
		$reqPersonne->bindParam(':adresse', $adresse);
		$nb = $reqPersonne->execute();

		$reqId = MonPdo::getInstance()->prepare("SELECT MAX(ID) as maxId FROM `personne`");
		$reqId->execute();
		$idPersonneMax = $reqId->fetchColumn();
		

		$reqProf=MonPdo::getInstance()->prepare("INSERT INTO `prof`(`IDPROF`, `REF`, `SALAIRE`) VALUES (:id,:ref,:salaire)");
		$ref = $profs->getRef();
		$reqProf->bindParam(':ref', $ref);
		$salaire = $profs->getSalaire();
		$reqProf->bindParam(':salaire', $salaire);
		$reqProf->bindParam(':id', $idPersonneMax);
		$nb2 = $reqProf->execute();





	}

	public static function deleteProf($idProf){


		

		// Delete records from `payer` table
		$reqPayer = MonPdo::getInstance()->prepare("DELETE FROM `payer` WHERE idProf = :idProf");
		$reqPayer->bindParam(':idProf', $idProf);
		$reqPayer->execute();

		// Delete records from `inscription` table
		$reqInscription = MonPdo::getInstance()->prepare("DELETE FROM `inscription` WHERE idprof = :idProf");
		$reqInscription->bindParam(':idProf', $idProf);
		$reqInscription->execute();

		// Delete records from `seance` table
		$reqSeance = MonPdo::getInstance()->prepare("DELETE FROM `seance` WHERE idProf = :idProf");
		$reqSeance->bindParam(':idProf', $idProf);
		$reqSeance->execute();

		// Delete record from `prof` table
		$reqProf = MonPdo::getInstance()->prepare("DELETE FROM `prof` WHERE idprof = :idProf");
		$reqProf->bindParam(':idProf', $idProf);
		$reqProf->execute();

		$reqPersonne = MonPdo::getInstance()->prepare("DELETE FROM `personne` WHERE id = :idProf");
		$reqPersonne->bindParam(':idProf', $idProf);
		$reqPersonne->execute();

	}

	public static function modifProf(prof $profs){
        $req = MonPdo::getInstance()->prepare("UPDATE prof inner join personne on prof.IDPROF=personne.id SET nom=:nom,prenom=:prenom,adresse=:adresse,tel=:tel, mail=:mail, `REF`=:ref,`SALAIRE`=:salaire WHERE prof.IDPROF=:id");
		$nom = $profs->getNom();
		$req->bindParam(':nom', $nom);
		$prenom = $profs->getPrenom();
		$req->bindParam(':prenom', $prenom);
		$tel = $profs->getTel();
		$req->bindParam(':tel', $tel);
		$mail =  $profs->getMail();
		$req->bindParam(':mail', $mail);
		$adresse = $profs->getAdresse();
		$req->bindParam(':adresse', $adresse);
		$ref = $profs->getRef();
		$req->bindParam(':ref', $ref);
		$salaire = $profs->getSalaire();
		$req->bindParam(':salaire', $salaire);
		$idProf = $profs -> getId();
		$req->bindParam(':id', $idProf);
        $req->execute();
		

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