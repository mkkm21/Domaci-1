<?php
require "../dbBroker.php";
require "../model/aktivnosti.php";

if(isset($_POST['Opis'])){

    $aktivnosti = new Aktivnosti($_POST['id'], $_POST['Opis'], $_POST['katID']);
    $status = $aktivnosti->izmeni($conn);

    if($status){
        echo "Uspešno";
    }else{
        echo "Neuspešno";
    }
}
?>
