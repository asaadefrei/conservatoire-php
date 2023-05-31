<?php

class Heure
{
      private $TRANCHE;
	
    


	
		
		
	
	
	
	public function getHeure() {
		return $this->TRANCHE;
	}
	

	



    
	public static function afficherHeure(){
        $req = MonPdo::getInstance()->prepare("SELECT * from heure");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'heure');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;

    }

	

}









?>