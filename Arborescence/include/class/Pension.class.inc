<?php 

class Pension{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT id_pension, lib_pension FROM ".DB_TABLE_PENSION.";";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($lib_pension=""){

        global $conn;
        $request = "INSERT INTO pension(lib_pension)
                    VALUES (:lib_pension)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':lib_pension', $lib_pension, PDO::PARAM_STR);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($lib_pension=""){
       $id_pension = $_POST['id_pension'];
        if(!$id_pension){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PENSION."
                  SET lib_pension = :lib_pension 
                  WHERE id_pension = :id_pension";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_pension', $id_pension, PDO::PARAM_INT);
        $sql->bindValue(':lib_pension', $lib_pension, PDO::PARAM_STR);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id_pension=0){
        $id_pension = (int) $_POST['id_pension'];

        if(!$id_pension) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PENSION." WHERE id_pension = :id_pension;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_pension', $id_pension, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

}

?>