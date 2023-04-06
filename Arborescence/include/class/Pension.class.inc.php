<?php 

class Pension{
	const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

	public function db_get_all(){
		global $conn;

		$request = "SELECT P.id_pension, C.nom_cheval, P.date_deb_pension, P.date_fin_pension, tarif_pension, T.lib_type_p, PE.nom, PE.prenom, P.ref_per
        FROM ".DB_TABLE_PENSION." P
        INNER JOIN ".DB_TABLE_PERSONNE." PE ON P.ref_per=PE.id_personne 
        INNER JOIN ".DB_TABLE_CHEVAL." C ON P.ref_cheval=C.id_cheval 
        INNER JOIN ".DB_TABLE_TYPE_PENSION." T ON P.ref_type_p=T.id_type_p 
        WHERE actif_pen = 1;";
		try{
			$sql = $conn->query($request);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}
                
        public function db_get_by_id($id_pers=0){
		$id_pers = (int) $id_pers;
		if(!$id_pers){
			return false;
		}
                
                global $conn;

		$request = "SELECT P.id_pension, C.nom_cheval, P.date_deb_pension, P.date_fin_pension, tarif_pension, T.lib_type_p, PE.nom, PE.prenom 
        FROM ".DB_TABLE_PENSION." P 
        INNER JOIN ".DB_TABLE_PERSONNE." PE ON P.ref_per=PE.id_personne 
        INNER JOIN ".DB_TABLE_CHEVAL." C ON P.ref_cheval=C.id_cheval 
        INNER JOIN ".DB_TABLE_TYPE_PENSION." T ON P.ref_type_p=T.id_type_p
        WHERE id_pension = :id";
		$sql = $conn->prepare($request);
		$sql->bindValue(':id', $id_pers, PDO::PARAM_INT);
		try{
			$sql->execute();
			return $sql->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return $this->errmessage.$e->getMessage();
		}
	}


	public function db_create($lib_pension="", $date_deb_pension="" , $date_fin_pension="", $tarif_pension="", $ref_cheval="", $ref_type_p="", $ref_per=""){

        global $conn;
        $request = "INSERT INTO pension(lib_pension, date_deb_pension, date_fin_pension, tarif_pension, ref_cheval, ref_type_p, ref_per,actif_pen)
                    VALUES (:lib_pension, :date_deb_pension, :date_fin_pension, :tarif_pension, :ref_cheval, :ref_type_p, :ref_per,1)";
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
        $sql->bindValue(':id_pension', $id_pension, PDO::PARAM_INT);
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

        $request = "UPDATE ".DB_TABLE_PENSION." SET actif_pen = 0 WHERE id_pension = :id_pension;";
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