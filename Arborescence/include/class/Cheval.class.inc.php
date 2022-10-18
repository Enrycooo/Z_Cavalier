<?php 
class Cheval{
	const ermessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all (){
		global $conn;

		$request = "SELECT *
					FROM " .DB_TABLE_CHEVAL. "WHERE id_cheval IS NOT NULL;";
		try {
			$sql =$conn ->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->ermessage.$e->getMessage();
		}
	}
	
	public function db_get_by_id($id_cheval=0){
		$id_cheval = (int) $id_cheval;
		if(!$id_cheval){
			return false;
		}

		global $conn;

		$request = "SELECT * 
					FROM ".DB_TABLE_CHEVAL." WHERE id_cheval = :id_cheval";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id_cheval', $id_cheval, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}

	public function db_create($nom="", $dna="" , $race="", $sexe="", $taille = "", $sire = "", $robe =""){

        global $conn;
        $request = "INSERT INTO cheval(nom_cheval, DNA_cheval, race_cheval, sexe_cheval, taille_cheval, SIRE_cheval, ref_robe)
                VALUES (:nom, :dna, :race, :sex, :taille, :robe);";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':dna', $dna, PDO::PARAM_STR);
        $sql->bindValue(':race', $race, PDO::PARAM_STR);
        $sql->bindValue(':sexe', $sexe, PDO::PARAM_STR);
        $sql->bindValue(':taille', $taille, PDO::PARAM_INT);
        $sql->bindValue(':sire', $sire, PDO::PARAM_INT);
        $sql->bindValue(':robe', $robe, PDO::PARAM_INT);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($id_cheval=0, $nom="", $dna="" , $race="", $sexe="", $taille = "", $sire ="", $robe="" ){
       $id_cheval = (int) $id_cheval;
        if(!$id_cheval){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_CHEVAL."
                 SET nom = :nom, dna = :pre, dna = :dna, mail= :mail, tel= :tel, galop= :galop, nl = :nl  WHERE id_personne = :id_personne";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':pre', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dna', $dna, PDO::PARAM_INT);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':tel', $tel, PDO::PARAM_INT);
        $sql->bindValue(':galop', $galop, PDO::PARAM_INT);
        $sql->bindValue(':nl', $nl, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id_personne=0){
        $id_personne = (int) $id_personne;

        if(!$id_personne) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE." SET actif = 0 WHERE id_personne = :id_personne;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id', $id_personne, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

}

?>