<?php 

class Robe{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_ROBE.";";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($lib_robe=""){

        global $conn;
        $request = "INSERT INTO robe(lib_robe)
                    VALUES (:lib_robe)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':lib_robe', $lib_robe, PDO::PARAM_STR);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($lib_robe=""){
       $id_robe = $_POST['id_personne'];
        if(!$id_robe){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE."
                  SET nom = :nom, prenom = :pre, DNA = :dna, rue = :rue, code_postal = :cp, ville = :ville, mail= :mail, telephone = :tel, gal_cav= :gal_cav, num_lic = :num_lic  
                  WHERE id_personne = :id_personne";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_robe', $id_robe, PDO::PARAM_INT);
        $sql->bindValue(':lib_robe', $lib_robe, PDO::PARAM_STR);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id_robe=0){
        $id_robe = (int) $_POST['id_robe'];

        if(!$id_robe) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_ROBE." SET actif = 0 WHERE id_robe = :id_robe;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_robe', $id_robe, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

}

?>