<?php
require "../dbBroker.php";
require "../model/aktivnosti.php";

if(isset($_POST['naslov']) && isset($_POST['opis'])){

    $aktivnosti = new Aktivnosti($_POST['id'], $_POST['naslov'], $_POST['opis'], $_POST['user_id']);
    $status = $aktivnosti->izmeni_aktivnost($conn);

    if($status){
        echo "Uspešno";
    }else{
        echo "Neuspešno";
    }
}
?>
