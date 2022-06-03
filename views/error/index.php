<?php
$categorias = [];
$ficheros = scandir("productos");
foreach($ficheros as $fichero):
    if($fichero != '.' && $fichero != '..'):
        array_push($categorias, str_replace(".json", "", $fichero));
    endif;
endforeach;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="index,follow">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
        <title>404 | <?=$this->config->dominio?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="height: 100vh">
    <?php require_once 'views/header.php'; ?>
    <div class="textos m-auto pt-4 mt-5" style="max-width: 700px">
                <h1 class="display-1 text-center text-muted pt-4" style="font-size: 80px">
                    404
                </h1>
                <p class="text-center" style="font-size: 35px">
                    Vaya! Parece que no encontramos la página que estás buscando...😅  
                </p>
                <p class="text-center">
                Todos nos hemos perdido alguna vez, pero siempre puedes volver al <a href="<?=constant('URL')?>">inicio</a>
                </p>
                <div class="container" style="width: 100%; height: 350px; background-image: url('https://c.tenor.com/5R1whvx7pOkAAAAC/lost-johntravolta.gif'); background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
            </div>
    <div class="jio" style="position: absolute; bottom:0; top:100vh; width:100%">
            <?php require_once 'views/footer.php'; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>