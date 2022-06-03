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
    foreach(json_decode($this->productos) as $producto):
        if($producto->id == $this->data):
            $product = $producto;
            break;
        endif;
    endforeach;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="<?=$this->config->index_products?>">
    <meta name="description" content="<?php echo str_replace("reemplazo", $product->titulo, $this->config->meta_description_producto)?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?=substr($product->titulo,0,15)?> | <?=$categoria?></title>
</head>
<body>
<?php include_once 'views/header.php';?>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=constant('URL')?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?=constant('URL')?><?=$this->categoria?>"><?=$categoria?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=substr($product->titulo,0,15)?></li>
        </ol>
    </nav>
    <div class="row col-12 m-auto mb-3 p-3">
        <div class="d-flex justify-content-around flex-wrap">
            <div class="card principal m-3 p-3 shadow-sm" style="width: 25rem;">
                <img src="<?=$product->imagen?>" class="card-img-top" width="370px" height="370px" alt="...">
            </div>
            <div class="description col-5 m-3 p-2" style="min-width: 300px">
                <h1><?=ucwords(substr($product->titulo,0,30))?></h1>
                <p>
                    <?= str_replace("reemplazo", $product->titulo, $this->spin->spin($this->config->spin_producto))?>
                </p>
                <a href="<?=$producto->link_aff?>" class="btn btn-primary"><?php if($this->config->ver_precio === "1"): echo $this->config->mensaje_boton_precio." ".$product->precio; else: echo $this->config->mensaje_boton_precio; endif;?></a>
            </div>
        </div>
    </div>
        <div class="row col-10 m-auto justify-content-start">
            <h3 class="mb-4" style="font-size: 22px">Productos relaccionados de <a href="<?=constant('URL').$this->categoria?>" style="text-decoration:none"><strong>"<?=$categoria?>"</strong></a></h3>
            <?php
            $k = 0;
                foreach(json_decode($this->productos) as $producto):
            ?>
                <a href="<?=constant('URL').$this->categoria?>/<?=$producto->id?>" class="col-4 mb-5" style="min-width: 12rem;">
                    <div class="card p-2">
                    
                    <img src="<?=$producto->imagen?>" class="card-img-top" alt="<?=$producto->titulo?>" width="12rem" height="120px">
                    </div>
                </a>
            <?php
                $k++;
                if($k >= 5):
                    break;
                endif;
                endforeach;
            ?>
        </div>
        <div class="row col-10 m-auto justify-content-start">
            <h3 class="mb-4" style="font-size: 22px">También tenemos otras categorías que pueden ayudarte en <?=$this->config->dominio?></h3>
            <?php
            $k = 0;
                foreach($categorias as $cate):
                    $json_cate = json_decode(file_get_contents('productos/'.$cate.".json"));
                    if($json_cate != null):
                    foreach($json_cate as $imagen):
                        $cate_img = $imagen->imagen;
                        break;
                    endforeach;
                
            ?>
                <a href="<?=constant('URL').$cate?>" class="col-4 mb-5" style="width: 12rem;">
                    <div class="card p-2">
                    
                    <img src="<?=$cate_img?>" class="card-img-top" alt="<?=$producto->titulo?>" width="12rem" height="120px">
                    </div>
                </a>
            <?php
                $k++;
                if($k >= 5):
                    break;
                endif;
            else:
            endif;
                endforeach;
            ?>
        </div>
    </div>
        <?php include_once 'views/footer.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>