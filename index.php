<?php
require "dbBroker.php";
require "model/korisnik.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){

    $ime = $_POST['username'];
    $sifra = $_POST['password'];

    $user = new Korisnik(null, $ime, $sifra);
    $response = Korisnik::logInUser($user, $conn);

    if($response->num_rows==1){

        $_SESSION['user_id'] = $response->fetch_array()['id'];
        header('Location: oglasna_tabla.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Oglasna tabla</title>
</head>
<body>
    <div id = "login">
        <h1 class="text-center text-black pt-5 mt-5">Prijava</h1>
        <div class = "container"> 
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" action="" method="post">
                        <div class="form-group">
                            <label for="username" >Korisničko ime:</label><br>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" >Šifra:</label><br>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-grop mt-4 text-white">
                          <input type="submit" name="submit" style="color: black;" class="btn btn-info btn-md" value="Potvrdi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
