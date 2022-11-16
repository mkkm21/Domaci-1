<?php

    class Kategorije{
        public $katID;
        public $nazivKat;

        public function __construct($katID = null, $nazivKat = null)
        {
           $this->katID = $katID;
           $this->nazivKat = $nazivKat;
           
        }

        public static function dodaj_kategoriju(Kategorije $kategorije, mysqli $conn)
        {
            $query = "INSERT INTO kategorije(nazivKat) VALUES ('$kategorije->nazivKat')";
            return $conn->query($query);
        }
    }

?>