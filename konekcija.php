<?php


    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zastava";
    
   
    $dblink = new mysqli($hostname, $username, $password, $dbname);
    
    if ($dblink->connect_error) {
      die("Konekcija nije uspela: " . $dblink->connect_error);
    }

?>