        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?=constant('URL')?>"><?=$this->config->dominio?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            foreach($categorias as $cate):
                                $tit_ = str_replace("-", " ", $cate);
                                $json_cate = json_decode(file_get_contents('productos/'.$cate.".json"));
                                if($json_cate != null):
                        ?>
                        <li><a class="dropdown-item" href="<?=constant('URL').$cate?>"><?=ucfirst($tit_)?></a></li>
                        <?php
                        endif;
                            endforeach;
                        ?>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>