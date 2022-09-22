<?php
class Cavalier{
    private $nom;
    private $prenom;
    private $datedenaissance;
    private $mail;
    private $telephone;
    private $galop;
    private $numerolicence;
    
    public function __construct($n,$p,$dna,$mail,$tel,$g,$nl){
        $this -> nom = $n;
        $this -> prenom = $p;
        $this -> datedenaissance = $dna;
        $this -> mail = $mail;
        $this -> telephone = $tel;
        $this -> galop = $g;
        $this -> numerolicence = $nl;
    }
    public function get_nom (){
        Return $this -> nom;
    }
    public function set_nom ($n){
        $this -> nom = $n;
    }
    
    public function get_prenom () {
        Return $this -> prenom;
    }
    public function set_prenom ($p) {
        $this -> prenom = $p;
    }
    public function get_datedenaissance () {
        Return $this -> datedenaissance;
    }
    public function set_datedenaissance ($dna) {
        $this -> datedenaissance = $dna;
    }
    public function get_mail () {
        Return $this -> mail;
    }
    public function set_mail ($mail) {
        $this -> mail = $mail;
    }
    public function get_telephone () {
        Return $this -> telephone;
    }
    public function set_telephone ($tel) {
        $this -> telephone = $tel;
    }
    public function get_galop () {
        Return $this -> galop;
    }
    public function set_galop ($g) {
        $this -> galop = $g;
    }
    public function get_numerolicence () {
        Return $this -> numerolicence;
    }
    public function set_numerolicence($nl) {
        $this -> numerolicence = $nl;
    }
}
?>