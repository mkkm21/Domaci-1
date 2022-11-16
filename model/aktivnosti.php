<?php

    class Aktivnosti{
        public $id;
        public $Opis;
        public $katID;

        public function __construct($id = null, $Opis = null, $katID = null)
        {
            $this->id = $id;
            $this->Opis = $Opis;
            $this->katID = $katID;
        }

        public static function dodaj_aktivnost(Aktivnosti $aktivnosti, mysqli $conn)
        {
            $query = "INSERT INTO aktivnosti(Opis, katID) VALUES('$aktivnosti->Opis', '$aktivnosti->katID')";
            return $conn->query($query);
        }
        
        public static function prikazi(mysqli $conn){
            $query = "SELECT A.id, A.Opis, K.katID FROM aktivnosti A 
            INNER JOIN kategorije K on A.katID=K.katID";
    
            $myArray = array();
            $result = $conn->query($query);
    
            if($result){
                while($row = $result->fetch_array()){
                    $myArray[] = $row;
                }
            }
            return $myArray;
        }
    }

?>