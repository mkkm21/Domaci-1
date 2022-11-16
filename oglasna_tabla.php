<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oglasna tabla</title>
</head>
<body>
<div id="form-bg" class="form-bg ">
        <div id="form-prikaz" class="container form pt-0" >
            <form id="form" action="">
                <div class="flex-wrapper">
                        <input name = "id" id="form-id" type="hidden">
                        
                        <div style="flex:1">
                            <label for="opis">Opis:</label>
                            <textarea id="form-opis" class="form-control" name="opis" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                   
                    <div class="break"></div>
                    <div style="flex:1"><input type="submit" class="btn btn-primary mb-4" style="margin-left:3rem" value="Potvrdi"></div>
                    <div style="flex:1"><input type="reset" class="btn btn-primary mb-4" style="margin-left:3rem" value="Poništi"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center text-white mt-5">Oglasna tabla</h2>
        <div id="task-container">
            <div class="taks-wrapper p-3 flex-wrapper">
                <div style="flex:2">
                    <button class="btn btn-primary">Dodaj novu aktivnost</button>
                </div>
                <div style="flex:1">
                    <form action="">
                        <label style="margin-right:10px" for="pretraga">Pretraži</label>
                        <input id="pretraga"  class="ml-1" name="pretraga" type="text">
                    </form>
                </div>
            </div>
            <div class="task-wrapper flex-wrapper border-top text-center" style="font-weight: bold;">
                
                <div style="flex:2; padding-left:10px; padding-right:10px;">Opis</div>
                
                <div style="flex:1; cursor: pointer;">Kategorija</div>
                <div style="flex:1">Izmeni</div>
            </div>
            
        </div>
    </div>
    
</body>
</html>