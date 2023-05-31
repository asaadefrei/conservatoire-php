<?php

class Jour
{
      private $JOUR;
	

	
	public function getJour() {
		return $this->JOUR;
	}
	

	



    
    public static function afficherJour(){
        $req = MonPdo::getInstance()->prepare("SELECT * from jour");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'jour');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }

	

}









?>