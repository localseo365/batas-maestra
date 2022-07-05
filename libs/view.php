<?php
class View
{
    public function __construct(){
        $this->productos = '';
        $this->mensaje = '';
        $this->categoria = '';
        $this->data = [];
        require_once 'classes/spin.php';
        $this->spin = new Spinner;
    }
    public function render($vista){
        require 'views/' . $vista . '/index.php';
    }
}
?>