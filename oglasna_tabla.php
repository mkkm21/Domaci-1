<?php
require "dbBroker.php";
require "model/aktivnosti.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    die();
}

$data = Aktivnosti::prikazi_aktivnosti($conn);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Oglasna tabla</title>
</head>
<body>
<div id="form-bg" class="form-bg ">
        <div id="form-prikaz" class="container form pt-0" >
            <form id="form" action="">
                <div class="flex-wrapper">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                        <input name = "id" id="form-id" type="hidden">
                        <div style="flex:1">
                            <label for="naslov">Naslov:</label>
                            <input id="form-naslov" class="form-control" name="naslov" type="text">
                        </div>
                        <div style="flex:1">
                            <label for="opis">Opis:</label>
                            <textarea id="form-opis" class="form-control" name="opis" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="break"></div>
                    <div style="flex:1"><input type="submit" class="btn btn-primary mb-4" style="margin-left:3rem" value="Potvrdi"></div>
                    <div style="flex:1"><input type="reset" class="btn btn-primary mb-4" style="margin-left:3rem" value="Poništi" onclick="ponisti();"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center text-white mt-5">Oglasna tabla</h2>
        <div id="task-container">
            <div class="taks-wrapper p-3 flex-wrapper">
                <div style="flex:2">
                    <button class="btn btn-primary" onclick="prikazi();">Dodaj novu aktivnost</button>
                </div>
                <div style="flex:1">
                    <form action="">
                        <label style="margin-right:10px" for="pretraga">Pretraži</label>
                        <input id="pretraga" oninput="pretrazi();" class="ml-1" name="pretraga" type="text">
                    </form>
                </div>
            </div>
            <div class="task-wrapper flex-wrapper border-top text-center" style="font-weight: bold;">
                <div style="flex:1">Naslov</div>
                <div style="flex:2; padding-left:10px; padding-right:10px;">Opis</div>
                <div onclick="sortirajPoKorisniku();" style="flex:1; cursor: pointer;">SORT</div>
                <div style="flex:1; cursor: pointer;">Kategorija</div>
                <div style="flex:1">Izmeni</div>
            </div>
            <div id="data">
                <?php
                    foreach(array_reverse($data) as $row):
                ?>
                <div class="task-wrapper flex-wrapper align-items-center">
                    <div id="naslov" class="text-center" style="flex:1; font-weight:bolder; color:royalblue"><?php echo $row['naslov'] ?></div>
                    <div id="opis" class="opis" style="flex:2; padding-left:10px; padding-right:10px;"><?php echo $row['opis'] ?></div>
                    <div class="text-center" style="flex:1"><?php echo $row['username'] ?></div>
                    <div class="text-center" style="flex:1">
                        <div>
                            <button class="btn btn-primary" 
                            onclick="uredi(<?php echo $row['id'] ?>, '<?php echo $row['naslov'] ?>', '<?php echo $row['opis'] ?>');">Izmeni</button>
                            <div class="break"></div>
                            <button class="btn btn-danger" onclick="obrisi(<?php echo $row['id'] ?>);">Obriši</button>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>

<?php


?>