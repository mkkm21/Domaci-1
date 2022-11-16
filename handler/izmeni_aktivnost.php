<?php
require "../dbBroker.php";
require "../model/aktivnosti.php";

if(isset($_POST['opis'])){

    $aktivnosti = new Aktivnosti($_POST['id'], $_POST['opis'], $_POST['katID']);
    $status = $aktivnosti->izmeni($conn);

    if($status){
        echo "Uspešno";
    }else{
        echo "Neuspešno";
    }
}
?>
