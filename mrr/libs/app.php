<?php
require_once 'controllers/errors.php';

class App{
    function __construct(){
        //echo '<div>App</div>';

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        //var_dump($url);

        if (empty($url[0])) {
            $archivo_controller = 'controllers/main.php';
            require_once $archivo_controller;
            $controller = new Main(); 
            return false;
        }

        $archivo_controller = 'controllers/'.$url[0].'.php';

        if(file_exists($archivo_controller)){
            require_once $archivo_controller;
            $controller = new $url[0]; 

            if(isset($url[1])){
                $controller->{$url[1]}();
            }

            
        }else{
            $controller = new Errors();
        }
    }
}
?>