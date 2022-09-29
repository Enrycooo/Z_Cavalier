<?php

class Cavalier{

    const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n"; 

    public function db_get_all(){
        global $conn;
        $request = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE actif=1;";

        try{
            $sql = $conn->query($request);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_get_by_id($id=0){
        $id = (int) $id;
        if(!$id){
            return false;
        }

        global $conn;

        $request = "SELECT * FROM ".DB_TABLE_PERSONNE." WHERE id = :id";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);

        try{
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_create($libelle=''){

        if(!$libelle){
            return false;
        }

        global $conn;
        $request = "INSERT INTO ".DB_TABLE_PERSONNE." (nom,prenom,DNA,mail,telephone) VALUES(:nom,:prenom,:dna,:mail,:telephone);";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $libelle, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $libelle, PDO::PARAM_STR);
        $sql->bindValue(':DNA', $libelle, PDO::PARAM_INT);
        $sql->bindValue(':mail', $libelle, PDO::PARAM_STR);
        $sql->bindValue(':telephone', $libelle, PDO::PARAM_INT);

        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_update_lib($id=0, $newnom=''){
        $id = (int) $id;
        if(!!$id || !$newnom){
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE." SET nom =:nom,prenom =:prenom,DNA =:dna,mail =:mail,telephone = :telephone WHERE id = :id";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom', $libelle, PDO::PARAM_STR);
        $sql->bindValue(':prenom', $libelle, PDO::PARAM_STR);
        $sql->bindValue(':DNA', $libelle, PDO::PARAM_INT);
        $sql->bindValue(':mail', $libelle, PDO::PARAM_STR);
        $sql->bindValue(':telephone', $libelle, PDO::PARAM_INT);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_one($id=0){
        $id = (int) $id;

        if(!$id) {
            return false;
        }

        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE." SET actif = 0 WHERE id = :id;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_multi($id_array){
        if(!is_array($id_array)){
            return false;
        }

        foreach ($id_array as $key => $value) {
            if(is_nan($id_array[$key]) || !$id_array[$key]){
                return false;
            }
        }

        global $conn;

        $variables = $id_array;
        $placeholders = str_repeat ('?, ',  count ($variables) - 1) . '?';

        $sql = $conn -> prepare ("UPDATE ".DB_TABLE_PERSONNE." SET actif = 0 WHERE id IN($placeholders)");
        try{
            $sql->execute($variables);
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }

    public function db_soft_delete_all(){
        global $conn;

        $request = "UPDATE ".DB_TABLE_PERSONNE." SET actif = 0";
        $sql = $conn->prepare($request);
        try{
            $sql->execute();
            return true;
        }catch(PDOException $e){
            return $this->errmessage.$e->getMessage();
        }
    }
}
?>