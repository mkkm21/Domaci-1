<?php
require "../dbBroker.php";
require "../model/aktivnosti.php";

if(isset($_POST['opis'])){
    $aktivnosti = new Aktivnosti(null, $_POST['opis'], $_POST['katID']);
    $status = Aktivnosti::dodaj_aktivnost($aktivnosti, $conn);

    if($status){
        echo "Uspešno";
    }else{
        echo "Neuspešno";
    }
}


?>