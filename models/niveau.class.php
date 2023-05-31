<?php

class Niveau
{
      private $NIVEAU;
	

	
	public function getNiveau() {
		return $this->NIVEAU;
	}
	

	



    
    public static function afficherNiveau(){
        $req = MonPdo::getInstance()->prepare("SELECT * from niveau");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'niveau');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }

	

}









?>