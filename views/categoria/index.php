<?php
$categorias = [];
$ficheros = scandir("productos");
foreach($ficheros as $fichero):
    if($fichero != '.' && $fichero != '..'):
        array_push($categorias, str_replace(".json", "", $fichero));
    endif;
endforeach;
$categoria = str_replace("-", " ",$this->categoria);
$categoria = ucwords($categoria);
$productos = json_decode($this->productos);
if($productos == NULL):
    header('Location: '. constant('URL'). 'error');
endif;
//echo $categoria;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="description" content="<?= str_replace("reemplazo", $categoria, $this->config->meta_description_categorias)?>">
    <title><?=$categoria?> | <?=$this->config->dominio?></title>
</head>
<body>
<?php include_once 'views/header.php'; ?>
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=constant('URL')?>">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$categoria?></li>
            </ol>
        </nav>
        <div class="row col-10 m-auto mb-3 p-3 justify-content-center">
            <h1 class="text-center"><?=$categoria?></h1>
            <?= str_replace("reemplazo", $categoria, $this->spin->spin($this->config->spin_categoria))?>
        </div>
        <div class="row col-10 m-auto justify-content-center">
            <?php
                foreach($productos as $producto):
            ?>
                <div class="card col-4 m-3" style="width: 15rem;">
                
                <img src="<?=$producto->imagen?>" class="card-img-top" alt="<?=$producto->titulo?>" width="15rem" height="200px">
                    <div class="card-body">
                        <h5 class="card-title"><?=substr($producto->titulo,0,20)?></h5>
                        
                    </div>
                    <a href="<?=constant('URL').$this->categoria?>/<?=$producto->id?>" class="btn btn-primary m-2">Ver Artículo</a>
                </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>
    <?php include_once 'views/footer.php'; ?>
    <!--COOKIES-->
    <div id="div-cookies" style="display: none;">
            Sólo usamos las cookies necesarias para que la web funcione, pero aun así, debes conocerlas y aceptarlas.
            Si continuas en la web, estarás aceptando su uso. Tienes toda la información en
            <a hreflang="es" href="<?=constant('URL')?>cookies">Cookies</a>
            y la
            <a hreflang="es" href="<?=constant('URL')?>privacidad">Política de Privacidad</a>.
            <br>
            <button type="button" class="btn btn-sm btn-primary m-3" onclick="acceptCookies()">
                Acepto el uso de cookies
            </button>
        </div>
        <style>
        #div-cookies {
            position: fixed;
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 150px;
            background-color: #f8f9fa;
            box-shadow: 0px -5px 15px gray;
            padding: 20px;
            text-align: center;
            z-index: 99;
        }
        </style>
        <script>
        function checkAcceptCookies() {
            if (localStorage.acceptCookies == 'true') {
            } else {
                $('#div-cookies').show();
            }
        }
        function acceptCookies() {
            localStorage.acceptCookies = 'true';
            $('#div-cookies').hide();
        }
        $(document).ready(function() {
            checkAcceptCookies();
        });
        </script>
        <!--COOKIES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>