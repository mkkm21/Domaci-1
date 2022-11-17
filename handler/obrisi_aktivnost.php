<?php
require "../dbBroker.php";
require "../model/aktivnosti.php";

if(isset($_POST['id'])){
    $aktivnosti = new Aktivnosti($_POST['id']);
    $status = $aktivnosti->obrisi_aktivnost($conn);

    if($status){
        echo "Uspešno";
    }else{
        echo "Neuspešno";
    }
}
?>
