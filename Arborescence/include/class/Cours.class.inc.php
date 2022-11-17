<?php 

class Cours{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_COURS." WHERE duree_cours != 0;";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}
        
        public function db_get_by_id($id_cours=0){
		$id_cours = (int) $id_cours;
		if(!$id_cours){
			return false;
		}

		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_COURS." WHERE id_cours = :id";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id', $id_cours, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($lib_cours = "", $date_cours = "", $duree_cours = 0){

        global $conn;
        $request = "INSERT INTO cours(lib_cours, date_cours, duree_cours)
                    VALUES (:lib, :date, :duree)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':lib', $lib_cours, PDO::PARAM_STR);
        $sql->bindValue(':date', $date_cours, PDO::PARAM_STR);
        $sql->bindValue(':duree', $duree_cours, PDO::PARAM_INT);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($lib_cours = "", $date_cours = "", $duree_cours = 0){
       $id_cours = $_POST['id_cours'];
        if(!$id_cours){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_COURS."
                  SET lib_cours = :lib, date_cours = :date, duree_cours = :duree
                  WHERE id_cours = :id_cours";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_cours', $id_cours, PDO::PARAM_INT);
        $sql->bindValue(':lib', $lib_cours, PDO::PARAM_STR);
        $sql->bindValue(':date', $date_cours, PDO::PARAM_STR);
        $sql->bindValue(':duree', $duree_cours, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id_cours=0){
        $id_cours = (int) $_POST['id_cours'];

        if(!$id_cours) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_COURS." SET duree_cours = 0 WHERE id_cours = :id_cours;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_cours', $id_cours, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

}

?>