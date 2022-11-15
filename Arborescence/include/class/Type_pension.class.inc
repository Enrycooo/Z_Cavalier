<?php 

class Type_pension{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT id_type_p, lib_type_p FROM ".DB_TABLE_TYPE_PENSION.";";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}
        
                public function db_get_by_id($id_type_p=0){
		$id_type_p = (int) $id_type_p;
		if(!$id_type_p){
			return false;
		}
                
                global $conn;

		$request = "SELECT * FROM ".DB_TABLE_TYPE_PENSION." WHERE id_type_p = :id";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id', $id_type_p, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($lib_type_p=""){

        global $conn;
        $request = "INSERT INTO type_pension(lib_type_p)
                    VALUES (:lib_type_p)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':lib_type_p', $lib_type_p, PDO::PARAM_STR);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($lib_type_p=""){
       $id_type_p = $_POST['id_type_p'];
        if(!$id_type_p){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_TYPE_PENSION."
                  SET lib_type_p = :lib_type_p 
                  WHERE id_type_p = :id_type_p";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_type_p', $id_type_p, PDO::PARAM_INT);
        $sql->bindValue(':lib_type_p', $lib_type_p, PDO::PARAM_STR);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id_type_p=0){
        $id_type_p = (int) $_POST['id_type_p'];

        if(!$id_type_p) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_TYPE_PENSION." WHERE id_type_p = :id_type_p;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_type_p', $id_type_p, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

}

?>