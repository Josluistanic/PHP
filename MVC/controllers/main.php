<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        //echo '<div>Nuevo controlador Main</div>';
    }

    function render() {
        $this->view->render('main/index');
    }

    function saludo() {
        echo '<div>Saludo</div>';
    }
}
?>