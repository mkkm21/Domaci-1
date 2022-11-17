<?php
require "../dbBroker.php";
require "../model/aktivnosti.php";

if(isset($_POST['naslov']) && isset($_POST['opis'])){
    $aktivnosti = new Aktivnosti(null, $_POST['naslov'], $_POST['opis'], $_POST['user_id']);
    $status = Aktivnosti::dodaj_aktivnost($aktivnosti, $conn);

    if($status){
        echo "Uspešno";
    }else{
        echo "Neuspešno";
    }
}


?>