<?php
class Controller
{
    public function __construct(){
        session_start();
        $this->view = new View();
        $this->view->config = json_decode(file_get_contents("config/config.json"));
    }

    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require_once $url;
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
    function loadClass($class){
        $url = 'models/'.$class.'model.php';
        $this->class = [];
        if(file_exists($url)){
            require_once $url;
            $className = $class.'Model';
            $this->class = new $className();
            return $this->class;
        }
    }
}
?>