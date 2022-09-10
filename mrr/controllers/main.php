<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();  
        $this->view->render('main/index');
        //echo '<div>Nuevo controlador Main</div>';
    }

    function saludo() {
        echo '<div>Saludo</div>';
    }
}
?>