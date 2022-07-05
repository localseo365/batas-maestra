<?php
class Error_ extends Controller
{
    public function __construct($err_num)
    {
        parent::__construct();
        $errName = "err".$err_num;
        $this->$errName();
    }
    public function err1()
    {
        $this->view->mensaje = "Archivo no encontrado";
        $this->view->render('error');
    }
    public function err2()
    {
        $this->view->mensaje = "Metodo no encontrado";
        $this->view->render('error');
    }
}