<?php

class Errors extends Controller{
    function __construct(){
        parent::__construct(); 
        $this->view->mensaje = 'Error en la solicitud';
        $this->view->render('errors/index');
        //echo '<div>Error al cargar recurso</div>';
    }
}

?>