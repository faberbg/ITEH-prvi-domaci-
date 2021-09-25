<?php
    include "kategorija.php";

    class Kolaci{

        public $id;
        public $naziv;
        public $opis;
        public $cena;
        public $posno;
        public $kategorija;
        
        

        public function __construct($id = null, $naziv=null, $opis=null, $cena=null,$posno=null,$kategorija=null)
        {
            $this->id = $id;
            $this->naziv = $naziv;
            $this->opis = $opis;
            $this->cena = $cena;
            $this->posno = $posno;
            $this->kategorija=$kategorija;
            
        }

        public static function getAll(mysqli $dblink){
            $q = "SELECT * FROM kolaci";
            return $dblink->query($q);
        }

        public static function getSpojene(mysqli $dblink){
            $q = "SELECT k.id, k.naziv, k.opis, k.cena, k.posno, k1.naziv as nazivKat FROM kolaci k join kategorija k1 on (k.kategorija=k1.id)";
            return $dblink->query($q);
        }

        public static function add( $naziv, $opis, $cena, $posno, $kategorija, mysqli $dblink) { 
            $q = "INSERT INTO kolaci(naziv, opis, cena, posno, kategorija) values('$naziv','$opis',
                    '$cena', '$posno', '$kategorija' )";
            return $dblink->query($q);
        }

    }
?>