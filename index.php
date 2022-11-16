<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oglasna tabla</title>
</head>
<body>
    <div id = "login">
        <h1>Prijava</h1>
        <div class = "container"> 
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" action="" method="post">
                        <div class="form-group">
                            <label for="username" >Korisničko ime:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" >Šifra:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-grop mt-4 text-white">
                          <input type="submit" name="submit" style="color: white;" class="btn btn-info btn-md" value="Potvrdi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
