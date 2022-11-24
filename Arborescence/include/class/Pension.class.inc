<?php 

class Pension{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT * FROM ".DB_TABLE_PENSION.";";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}
                
        public function db_get_by_id($id_pension=0){
		$id_pension = (int) $id_pension;
		if(!$id_pension){
			return false;
		}
                
                global $conn;

		$request = "SELECT * FROM ".DB_TABLE_PENSION." WHERE id_pension = :id";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id', $id_pension, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($lib_pension="", $date_deb_pension="" , $date_fin_pension="", $tarif_pension="", $ref_cheval="", $ref_type_p="", $ref_per=""){

        global $conn;
        $request = "INSERT INTO pension(lib_pension, date_deb_pension, date_fin_pension, tarif_pension, ref_cheval, ref_type_p, ref_per)
                    VALUES (:lib_pension, :date_deb_pension, :date_fin_pension, :tarif_pension, :ref_cheval, :ref_type_p, :ref_per)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':lib_pension', $lib_pension, PDO::PARAM_STR);
        $sql->bindValue(':date_deb_pension', $date_deb_pension, PDO::PARAM_STR);
        $sql->bindValue(':date_fin_pension', $date_fin_pension, PDO::PARAM_STR);
        $sql->bindValue(':tarif_pension', $tarif_pension, PDO::PARAM_STR);
        $sql->bindValue(':ref_cheval', $ref_cheval, PDO::PARAM_STR);
        $sql->bindValue(':ref_type_p', $ref_type_p, PDO::PARAM_STR);
        $sql->bindValue(':ref_per', $ref_per, PDO::PARAM_STR);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_one($lib_pension="", $date_deb_pension="", $date_fin_pension="", $tarif_pension="", $ref_cheval="", $ref_type_p="", $ref_per="" ){
       $id_pension = $_POST['id_pension'];
        if(!$id_pension){
            return false;
        }
        global $conn;

        $request = "UPDATE ".DB_TABLE_PENSION."
                  SET lib_pension = :lib_pension, date_deb_pension = :date_deb_pension, date_fin_pension = :date_fin_pension, tarif_pension = :tarif_pension, ref_cheval = :ref_cheval, ref_type_p = :ref_type_p, ref_per = :ref_per
                  WHERE id_pension = :id_pension";
        $sql = $conn->prepare($request);
        $sql->bindValue(':lib_pension', $lib_pension, PDO::PARAM_STR);
        $sql->bindValue(':date_deb_pension', $date_deb_pension, PDO::PARAM_STR);
        $sql->bindValue(':date_fin_pension', $date_fin_pension, PDO::PARAM_STR);
        $sql->bindValue(':tarif_pension', $tarif_pension, PDO::PARAM_STR);
        $sql->bindValue(':ref_cheval', $ref_cheval, PDO::PARAM_STR);
        $sql->bindValue(':ref_type_p', $ref_type_p, PDO::PARAM_STR);
        $sql->bindValue(':ref_per', $ref_per, PDO::PARAM_STR);
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