<?php

include_once 'pelicula.php';

class ApiPeliculas
{
    function getAll()
    {
        $pelicula = new Pelicula();

        $peliculas = array();
        $peliculas['items'] = array();

        $res = $pelicula->getPeliculas();

        if ($res->rowCount() > 0) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'imagen' => $row['imagen'],
                );

                array_push($peliculas['items'], $item);
            }
            //echo json_encode($peliculas);
            echo $this->arrayToJSON($peliculas);
        } else {
            //echo json_encode(array('mensaje' => 'No hay elementos registrados'));
            $this->error('No hay elementos registrados');
        }
    }

    function getById($id)
    {
        $pelicula = new Pelicula();

        $peliculas = array();
        $peliculas['items'] = array();

        $res = $pelicula->getPeliculaById($id);

        if ($res->rowCount() > 0) {
            $row = $res->fetch();
            $item = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'imagen' => $row['imagen'],
            );

            array_push($peliculas['items'], $item);

            echo $this->arrayToJSON($peliculas);
        } else {
            $this->error('No hay elemtos registrados');
        }
    }

    function error($mensaje)
    {
        //echo "<code>" . json_encode(array('mensaje' => $mensaje)) . "</code>";
        echo json_encode(array('mensaje' => $mensaje));
    }

    function arrayToJSON($array)
    {
        //return "<code>" . json_encode($array) . "</code>";
        return json_encode($array);
    }
}
