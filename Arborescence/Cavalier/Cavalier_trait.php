<?php
include_once('../include/defines.inc.php');
if (isset($_POST["create"])) {
    if ($_POST['nom_cav'] != ""  && $_POST['prenom_cav'] != ""  && $_POST['DNA_cav'] != ""  && $_POST['mail_cav'] != ""  && $_POST['telephone_cav'] != "") {
        /* Cavalier et/ou Responsable */
        $nom_cav = $_POST['nom_cav'];
        $prenom_cav = $_POST['prenom_cav'];
        $dna_cav = $_POST['DNA_cav'];
        $mail_cav = $_POST['mail_cav'];
        $tel_cav = $_POST['telephone_cav'];
        $galop = $_POST['gal_cav'];
        $nl = $_POST['num_lic'];
        $rue_cav = $_POST['rue_cav'];
        $cp_cav = $_POST['cp_cav'];
        $ville_cav = $_POST['ville_cav'];
        /* Responsable */
        $nom_resp = $_POST['nom_resp'];
        $prenom_resp = $_POST['prenom_resp'];
        $dna_resp = $_POST['DNA_resp'];
        $mail_resp = $_POST['mail_resp'];
        $tel_resp = $_POST['telephone_resp'];
        $rue_resp = $_POST['rue_resp'];
        $cp_resp = $_POST['cp_resp'];
        $ville_resp = $_POST['ville_resp'];
        /* Requête */
        $sql = $conn->prepare("SELECT id_personne FROM personne WHERE nom = :nom");
        $sql->bindValue(':nom', $_POST["nom"], PDO::PARAM_STR);
        $sql->execute();
        $req = $oCavalier->db_create($nom_cav, $prenom_cav, $dna_cav, $mail_cav, $tel_cav, $rue_cav, $cp_cav, $ville_cav, $galop, $nl, $nom_resp, $prenom_resp, $dna_resp, $mail_resp, $tel_resp, $rue_resp, $cp_resp, $ville_resp);
        if ($req) {
?>
            <script>
                alert("Cela a fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("La création n'a pas fonctionné")
                window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Veuillez remplir tout les champs !")
            die;
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php?nav=create");
        </script>
    <?php
    }
} elseif (isset($_POST["update"])) {
    $req = $oCavalier->db_update_one($_POST["nom"], $_POST["prenom"], $_POST["dna"], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST["mail"], $_POST["telephone"], $_POST['gal_cav'], $_POST['num_lic']);
    if ($req) {
    ?>
        <script>
            alert("Cela a fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("La modification n'a pas fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    }
} elseif (isset($_POST["delete"])) {
    $req = $oCavalier->db_soft_delete_one();
    if ($req) {
    ?>
        <script>
            alert("Cela a fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("La suppression n'a pas fonctionné")
            window.location.replace("http://localhost/Z_Cavalier/Arborescence/Cavalier/Cavalier_Affiche.php");
        </script>
<?php
    }
}
