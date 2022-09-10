<?php

class Controller{
    function __construct(){
        //echo '<p> Ejecutando el constructor de mi clase Controller que sirve de clase padre</p>';
        $this->view = new View();
    }


    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require $url;
            $model_name = $model.'Model';
            $this->model = new $model_name();
        }
    }
}

?>