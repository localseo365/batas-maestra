<?php
$categorias = [];
$ficheros = scandir("productos");
foreach($ficheros as $fichero):
    if($fichero != '.' && $fichero != '..'):
        array_push($categorias, str_replace(".json", "", $fichero));
    endif;
endforeach;

//echo $categoria;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="description" content="<?= $this->config->meta_description_home?>">
    <title>Inicio | <?=$this->config->dominio?></title>
</head>
<body>
<?php include_once 'views/header.php'; ?>
    <div class="container mt-3">
        
        <div class="row col-10 m-auto mb-3 p-3 justify-content-center">
            <h1 class="text-center"><?=$this->config->dominio?></h1>
                <p>
                    <?= $this->config->primer_texto_home?>
                </p>
        </div>
        
        <div class="row col-10 m-auto justify-content-center">
            <?php
                foreach($categorias as $categoria):
                    $json_cate = json_decode(file_get_contents('productos/'.$categoria.".json"));
                    if($json_cate != null):
                    foreach($json_cate as $cluster):
                        $cate_link = $categoria;
                        $cate_img = $cluster->imagen;
                        $cate_name = $categoria;
                        break;
                    endforeach;
                    $cate_name = str_replace("-", " ", $cate_name);

            ?>
            <a href="<?=constant('URL').$cate_link?>" class="col-4 mb-5"  style="width: 18rem; text-decoration: none; color: black">
                <div class="card p-2">
                <img src="<?=$cate_img?>" class="card-img-top" alt="<?=$cate_name?>" width="18rem" height="200px">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?=ucwords($cate_name)?></h5>
                        
                    </div>
                </div>
                </a>
            <?php
                        else:
                        endif;
                endforeach;
            ?>
        </div>
        <div class="row col-10 m-auto justify-content-center">
            <?= $this->config->texto_home_bajo_categorias?>
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