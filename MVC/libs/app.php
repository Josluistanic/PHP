<?php
require_once 'controllers/errors.php';

class App
{
    function __construct()
    {
        //echo '<div>App</div>';

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        //var_dump($url);

        if (empty($url[0])) {                               //Ingreso sin controlador
            $archivo_controller = 'controllers/main.php';
            require_once $archivo_controller;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        $archivo_controller = 'controllers/' . $url[0] . '.php';

        if (file_exists($archivo_controller)) {       //Cuando existe un controlador
            require_once $archivo_controller;
            $controller = new $url[0];              //Inicializar controlador
            $controller->loadModel($url[0]);        //llamar al modelo
            $num_param = sizeof($url);              //Numero de elementos del array 

            if ($num_param > 1) {
                if ($num_param > 2) {
                    $param = [];
                    for ($i = 2; $i < $num_param; $i++) {
                        array_push($param, $url[$i]);    //Cargar los parametros en un array $param
                    }
                    $controller->{$url[1]}($param);
                } else {
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }
        } else {
            $controller = new Errors();
        }
    }
}
