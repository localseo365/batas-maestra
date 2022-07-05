<?php
    class categoria extends Controller
        {
        public function __construct($categoria){
            $this->categoria = $categoria;
            parent::__construct();
        }
        function render(){
            $this->view->categoria = $this->categoria;
            $this->view->productos = $this->findProducts($this->categoria);
            if($this->view->productos === NULL):
                $this->view->render('error');
            else:
            $this->view->render('categoria');
            endif;
        }
        function getCategories()
        {
            $ficheros = scandir(constant('URL')."productos");
            foreach($ficheros as $fichero):
                echo $fichero."\n";
                //if($fichero == '.' || $fichero == '..')
            endforeach;
        }
        function producto($id)
        {
            $this->view->data = $id;
            $this->view->categoria = $this->categoria;
            $this->view->productos = $this->findProducts($this->categoria);
            $this->view->render('producto');
        }
        function findProducts($categoria)
        {
            $path = constant('URL')."productos/$categoria.json";
            if(file_exists("productos/$categoria.json")):
                return file_get_contents(constant('URL')."productos/$categoria.json");
            endif;
        }
    }
?>