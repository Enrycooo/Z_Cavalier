<?php 

class Cavalier{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE actif = 1;";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}

	public function db_get_by_id($id_personne=0){
		$id_personne = (int) $id_personne;
		if(!$id_personne){
			return false;
		}

		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE id_personne = :id_personne";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}

	public function db_create($nom="", $prenom="" , $dna="", $mail="", $tel = 0, $galop = 0, $nl=0){

        global $conn;
        $request = "INSERT INTO personne(nom, prenom, DNA, mail, actif, telephone, photo, galop, numerolicence)
                VALUES (:nom, :pre, :dna, :mail, 1, :tel, 1, :galop, :nl);";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':pre', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dna', $dna, PDO::PARAM_STR);
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

    public function db_update_one($id_personne=0, $nom="", $prenom="" , $dna="", $mail="", $tel = 0, $galop = 0, $nl=0){
       $id_personne = (int) $id_personne;
        if(!$id_personne){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE." P INNER JOIN ".DB_TABLE_CAVALIER." C ON P.id_personne = C.ref_pers 
                 SET nom = :nom, prenom = :pre, dna = :dna, mail= :mail, tel= :tel, galop= :galop, nl = :nl  WHERE id_personne = :id_personne";
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