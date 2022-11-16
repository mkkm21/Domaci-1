<?php

    class Aktivnosti{
        public $id;
        public $opis;
        public $katID;

        public function __construct($id = null, $opis = null, $katID = null)
        {
            $this->id = $id;
            $this->opis = $opis;
            $this->katID = $katID;
        }

        public static function dodaj_aktivnost(Aktivnosti $aktivnosti, mysqli $conn)
        {
            $query = "INSERT INTO aktivnosti(opis, katID) VALUES('$aktivnosti->opis', '$aktivnosti->katID')";
            return $conn->query($query);
        }
        
        public static function prikazi(mysqli $conn){
            $query = "SELECT A.id, A.opis, K.katID FROM aktivnosti A 
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

        public function obrisi(mysqli $conn){
            $query = "DELETE FROM aktivnosti WHERE id = $this->id";
            return $conn->query($query);
        }

        public function izmeni(mysqli $conn){
            $query = "UPDATE aktivnosti SET opis ='$this->opis', katID ='$this->katID' 
            WHERE id='$this->id'";
           
            return $conn->query($query);
        }
    }

?>