<?php 

class Cheval{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_CHEVAL." WHERE actif_chev = 1;";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($nom_cheval="", $DNA_cheval="" , $race_cheval="", $sexe_cheval="", $taille_cheval="", $SIRE_cheval="", $ref_robe=""){

        global $conn;
        $request = "INSERT INTO cheval (nom_cheval, DNA_cheval, race_cheval, sexe_cheval, taille_cheval, SIRE_cheval, ref_robe, actif_cheval)
                    VALUES (:nom, :dna, :race, :sexe, :taille, :sire, :robe, 1)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $nom_cheval, PDO::PARAM_STR);
        $sql->bindValue(':dna', $DNA_cheval, PDO::PARAM_STR);
        $sql->bindValue(':race', $race_cheval, PDO::PARAM_STR);
        $sql->bindValue(':sexe', $sexe_cheval, PDO::PARAM_STR);
        $sql->bindValue(':taille', $taille_cheval, PDO::PARAM_STR);
        $sql->bindValue(':sire', $SIRE_cheval, PDO::PARAM_STR);
        $sql->bindValue(':robe', $ref_robe, PDO::PARAM_STR);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($id_cheval=0, $nom_cheval="", $DNA_cheval="" , $race_cheval="", $sexe_cheval="", $taille_cheval="", $SIRE_cheval="", $ref_robe=""){
       $id_cheval = $_POST['id_cheval'];
        if(!$id_cheval){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_CHEVAL."
                  SET nom_cheval = :nom, DNA_cheval = :dna, race_cheval = :race, sexe_cheval = :sexe, taille_cheval = :taille, SIRE_cheval = :sire, ref_robe= :robe, actif = :actif
                  WHERE id_cheval = :id_cheval";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_cheval', $id_cheval, PDO::PARAM_INT);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':dna', $dna, PDO::PARAM_STR);
        $sql->bindValue(':race', $race, PDO::PARAM_STR);
        $sql->bindValue(':sexe', $sexe, PDO::PARAM_STR);
        $sql->bindValue(':taille', $taille, PDO::PARAM_STR);
        $sql->bindValue(':sire', $sire, PDO::PARAM_STR);
        $sql->bindValue(':robe', $robe, PDO::PARAM_STR);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id_cheval=0){
        $id_cheval = (int) $_POST['id_cheval'];

        if(!$id_cheval) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_CHEVAL." SET actif_cheval = 0 WHERE id_cheval = :id_cheval;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_cheval', $id_cheval, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }
}

?>