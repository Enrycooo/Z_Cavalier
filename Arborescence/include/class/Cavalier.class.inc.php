<?php

class Cavalier
{
    const errmessage = "Une erreur s'est produite, signalez la à l'administrateur \n";

    public function db_get_all()
    {
        global $conn;

        $request = "SELECT * FROM " . DB_TABLE_PERSONNE . " WHERE actif = 1;";
        try {
            $sql = $conn->query($request);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function db_get_by_id($id_personne = 0)
    {
        $id_personne = (int) $id_personne;
        if (!$id_personne) {
            return false;
        }

        global $conn;

        $request = "SELECT * FROM " . DB_TABLE_PERSONNE . " WHERE id_personne = :id";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id', $id_personne, PDO::PARAM_INT);
        try {
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }


    public function db_create(
        /* Cavalier Et/Ou Responsable */
        $nom_cav = "",
        $prenom_cav = "",
        $dna_cav = "",
        $mail_cav = "",
        $tel_cav = "",
        $rue_cav = "",
        $cp_cav = "",
        $ville_cav = "",
        $galop = "",
        $nl = "",
        /* Reponsable */
        $nom_resp = "",
        $prenom_resp = "",
        $dna_resp = "",
        $mail_resp = "",
        $tel_resp = "",
        $rue_resp = "",
        $cp_resp = "",
        $ville_resp = ""

    ) {

        global $conn;
        /* Cavalier et/ou Responsable */
        $request = "INSERT INTO personne(nom, prenom, DNA, rue, code_postal, ville, mail, actif, telephone, photo, gal_cav, num_lic)
                    VALUES (:nom_cav, :pre_cav, :dna_cav, :rue_cav, :cp_cav, :ville_cav, :mail_cav, 1, :tel_cav, 1, :gal_cav, :num_lic)";
        $sql = $conn->prepare($request);
        $sql->bindValue(':nom_cav', $nom_cav, PDO::PARAM_STR);
        $sql->bindValue(':pre_cav', $prenom_cav, PDO::PARAM_STR);
        $sql->bindValue(':dna_cav', $dna_cav, PDO::PARAM_STR);
        $sql->bindValue(':rue_cav', $rue_cav, PDO::PARAM_STR);
        $sql->bindValue(':cp_cav', $cp_cav, PDO::PARAM_STR);
        $sql->bindValue(':ville_cav', $ville_cav, PDO::PARAM_STR);
        $sql->bindValue(':mail_cav', $mail_cav, PDO::PARAM_STR);
        $sql->bindValue(':tel_cav', $tel_cav, PDO::PARAM_STR);
        $sql->bindValue(':gal_cav', $galop, PDO::PARAM_INT);
        $sql->bindValue(':num_lic', $nl, PDO::PARAM_STR); 
        /* Reponsable */
        $request2 = "INSERT INTO personne(nom, prenom, DNA, rue, code_postal, ville, mail, actif, telephone, photo)
                    VALUES (:nom_resp, :pre_resp, :dna_resp, :rue_resp, :cp_resp, :ville_resp, :mail_resp, 1, :tel_resp, 1)";
        $sql2 = $conn->prepare($request2);
        $sql2->bindValue(':nom_resp', $nom_resp, PDO::PARAM_STR);
        $sql2->bindValue(':pre_resp', $prenom_resp, PDO::PARAM_STR);
        $sql2->bindValue(':dna_resp', $dna_resp, PDO::PARAM_STR);
        $sql2->bindValue(':rue_resp', $rue_resp, PDO::PARAM_STR);
        $sql2->bindValue(':cp_resp', $cp_resp, PDO::PARAM_STR);
        $sql2->bindValue(':ville_resp', $ville_resp, PDO::PARAM_STR);
        $sql2->bindValue(':mail_resp', $mail_resp, PDO::PARAM_STR);
        $sql2->bindValue(':tel_resp', $tel_resp, PDO::PARAM_STR);
        /* Try de la requête */
        try {
            $sql->execute();
            if ($nom_resp != "" && $prenom_resp != "" && $dna_resp != "" && $rue_resp != "" && $cp_resp != "" && $ville_resp != "" && $mail_resp != "" && $tel_resp != "") {
                $sql2->execute();
            }
            return true;
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function db_update_one($nom = "", $prenom = "", $dna = "", $rue = "", $cp = "", $ville = "", $mail = "", $tel = "", $galop = 0, $nl = "")
    {
        $id_personne = $_POST['id_personne'];
        if (!$id_personne) {
            return false;
        }

        global $conn;

        $request = "UPDATE " . DB_TABLE_PERSONNE . "
                  SET nom = :nom, prenom = :pre, DNA = :dna, rue = :rue, code_postal = :cp, ville = :ville, mail= :mail, telephone = :tel, gal_cav= :gal_cav, num_lic = :num_lic  
                  WHERE id_personne = :id_personne";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
        $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
        $sql->bindValue(':pre', $prenom, PDO::PARAM_STR);
        $sql->bindValue(':dna', $dna, PDO::PARAM_STR);
        $sql->bindValue(':rue', $rue, PDO::PARAM_STR);
        $sql->bindValue(':cp', $cp, PDO::PARAM_STR);
        $sql->bindValue(':ville', $ville, PDO::PARAM_STR);
        $sql->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sql->bindValue(':tel', $tel, PDO::PARAM_STR);
        $sql->bindValue(':gal_cav', $galop, PDO::PARAM_INT);
        $sql->bindValue(':num_lic', $nl, PDO::PARAM_STR);
        try {
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }

    public function db_soft_delete_one($id_personne = 0)
    {
        $id_personne = (int) $_POST['id_personne'];

        if (!$id_personne) {
            return false;
        }

        global $conn;

        $request = "UPDATE " . DB_TABLE_PERSONNE . " SET actif = 0 WHERE id_personne = :id_personne;";
        $sql = $conn->prepare($request);
        $sql->bindValue(':id_personne', $id_personne, PDO::PARAM_INT);
        try {
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            return $this->errmessage . $e->getMessage();
        }
    }
}
