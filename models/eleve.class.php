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