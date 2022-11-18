<?php
require "../dbBroker.php";
require "../model/aktivnosti.php";
session_start();

if(isset($_POST['id'])){
    if($_SESSION['user_id'] == 1){
        
    $aktivnosti = new Aktivnosti($_POST['id']); 
    
    $status = $aktivnosti->obrisi_aktivnost($conn);
    
    if($status){
        echo "Uspešno";
    }else{
        echo "Neuspešno";
    }
}
}
?>
