<?php

    class Aktivnosti{
        public $id;
        public $naslov;
        public $opis;
        public $user_id;

        public function __construct($id = null, $naslov = null, $opis = null, $user_id = null)
        {
            $this->id = $id;
            $this->naslov = $naslov;
            $this->opis = $opis;
            $this->user_id = $user_id;
        }

        public static function dodaj_aktivnost(Aktivnosti $aktivnosti, mysqli $conn)
        {
            $query = "INSERT INTO aktivnosti(naslov, opis, user_id) VALUES('$aktivnosti->naslov', '$aktivnosti->opis', '$aktivnosti->user_id')";
            return $conn->query($query);
        }
        
        public static function prikazi_aktivnosti(mysqli $conn){
            $query = "SELECT A.id, A.naslov, A.opis, K.username FROM aktivnosti A 
            INNER JOIN korisnik K on A.user_id=K.id";
    
            $myArray = array();
            $result = $conn->query($query);
    
            if($result){
                while($row = $result->fetch_array()){
                    $myArray[] = $row;
                }
            }
            return $myArray;
        }

        public function obrisi_aktivnost(mysqli $conn){
            $query = "DELETE FROM aktivnosti WHERE id = $this->id and user_id = '$_SESSION[user_id]'";
            return $conn->query($query);
        }

        public function izmeni_aktivnost(mysqli $conn){
            $query = "UPDATE aktivnosti SET naslov ='$this->naslov', opis ='$this->opis', user_id ='$this->user_id' 
            WHERE id='$this->id'";
           
            return $conn->query($query);
        }
    }

?>