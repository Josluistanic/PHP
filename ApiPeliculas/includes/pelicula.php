<?php
include_once 'db.php';

class Pelicula extends DB
{


    function getPeliculas()
    {
        $query  = $this->connect()->query("SELECT * FROM pelicula");
        return $query;
    }


    function getPeliculaById($id)
    {
        $query = $this->connect()->prepare("SELECT * FROM pelicula WHERE id = :id");
        $query->execute(['id' => $id]);

        return $query;
    }
}
?>