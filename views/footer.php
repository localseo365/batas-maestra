<div class="footer bg-dark text-white mt-5" style="width:100%; min-height:200px;">
            <div class="row col-12 p-4 justify-content-between d-flex flex-wrap">
                <div class="col-3" style="min-width:300px">
                    <p style="">
                        <?=$this->config->aviso_amazon?>
                    </p>
                    
                </div>
                <div class="col-3" style="min-width:300px">
                    <h5>Categorías:</h5>
                    <p>
                    <?php
                        foreach($categorias as $cate):
                            $tit_ = str_replace("-", " ", $cate);
                            $json_cate = json_decode(file_get_contents('productos/'.$cate.".json"));
                            if($json_cate != null):
                    ?>
                    <a href="<?=constant('URL').$cate?>" style="text-decoration: none;"><strong><?=ucfirst($tit_)?></strong></a><br>
                    <?php
                    endif;
                        endforeach;
                    ?>
                    </p>
                </div>
                <div class="col-3" style="min-width:300px">
                    <h5>Enlaces de interés:</h5>
                    <div class="">
                        <p>
                           <a href="<?=constant('URL')?>privacidad" style="text-decoration:none;">Privacidad</a><br>
                           <a href="<?=constant('URL')?>cookies" style="text-decoration:none;">Cookies</a><br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row col-12 copy bg-dark text-center">
                <p class="text-white">&copy 2022 | <?=$this->config->dominio?></p>
            </div>
        </div>