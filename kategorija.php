<?php

class Kategorija{
    
    public $id;
    public $naziv;

    public function __construct($id=null,$naziv=null)
    {
        $this->id=$id;
        $this->naziv=$naziv;
    }
    public static function getAll(mysqli $dblink){
        $q = "SELECT * FROM kategorija";
        return $dblink->query($q);
    }
    function getId(){
        return $this->id;
    }
    function getNaziv(){
        return $this->naziv;
    }
}

?>