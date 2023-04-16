<?php

class Instrument
{
  

	private $ref;

	public function getRef() {
		return $this->ref;
	}
	
		
	
    
	public static function afficherTous(){
        $req = MonPdo::getInstance()->prepare("SELECT ref from instrument");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'instrument');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }
	

	public static function nombreInstrument(){
        $req = MonPdo::getInstance()->prepare("SELECT COUNT(*) AS nb_instrument FROM instrument");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'instrument');
        $req->execute();
        $lesResultats = $req->fetch();
		return $lesResultats->nb_instrument;

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