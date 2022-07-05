<?php
    class App
    {
        public function __construct()
        {
            require_once 'controllers/error_.php';

            $url = isset($_GET['url']) ? $_GET['url']: null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            //Cuando no se define controlador
            if(empty($url[0])){
                $controllerFile = 'controllers/home.php';
                require_once $controllerFile;
                $controller = new Home;
                $controller->render();
                return false;
            }
            if($url[0] === 'cookies'):
                $controllerFile = 'controllers/cookies.php';
                require_once $controllerFile;
                $controller = new cookies();
                $controller->render();
                return false;
            elseif($url[0] === 'privacidad'):
                $controllerFile = 'controllers/privacidad.php';
                require_once $controllerFile;
                $controller = new privacidad();
                $controller->render();
                return false;
            else:

                $controllerFile = 'controllers/categoria.php';

                if(file_exists($controllerFile)){
                    require_once $controllerFile;
                    # Inicializamos categoria
                    $controller = new categoria($url[0]);
                    # Pasamos variable de la categoría
                    $url0 = str_replace("-", '_', $url[0]);
                    # Parametros = Producto
                    $nparams = sizeof($url);
                    if($nparams > 1){
                        $url1 = $url[1];
                        if($nparams > 2)
                        {
                            $controller->producto($url1);
                        }else{
                            $controller->producto($url1);
                        }
                    }else{
                        $controller->render();
                    }
                }
                else{
                    $controller = new Error_(1);
                    return false;
                }
                
            endif;
            }
    }