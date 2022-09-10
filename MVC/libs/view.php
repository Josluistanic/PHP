<?php
class View
{
    function __construct()
    {
        //echo '<div>Vista base</div>';
    }

    function render($nombre)
    {
        require 'views/' . $nombre . '.php';
    }
}
