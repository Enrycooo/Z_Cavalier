<?php 

class Robe{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT id_robe, lib_robe FROM ".DB_TABLE_ROBE." WHERE actif_robe = 1;";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}

                public function db_get_by_id($id_robe=0){
		$id_robe = (int) $id_robe;
		if(!$id_robe){
			return false;
		}
                
                global $conn;

		$request = "SELECT * FROM ".DB_TABLE_ROBE." WHERE id_robe = :id";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id', $id_robe, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}

	public function db_create($lib_robe=""){

        global $conn;
        $request = "INSERT INTO robe(lib_robe,actif_robe)
                    VALUES (:lib_robe,1)";
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
       $id_robe = $_POST['id_robe'];
        if(!$id_robe){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_ROBE."
                  SET lib_robe = :lib_robe  
                  WHERE id_robe = :id_robe";
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

        $request = "UPDATE ".DB_TABLE_ROBE." SET actif_robe = 0 WHERE id_robe = :id_robe;";
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