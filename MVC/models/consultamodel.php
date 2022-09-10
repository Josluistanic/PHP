<?php

include_once 'models/alumno.php';

class ConsultaModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM alumnos");

            while ($row = $query->fetch()) {
                $item = new Alumno();

                $item->matricula    = $row['matricula'];
                $item->nombre       = $row['nombre'];
                $item->apellido     = $row['apellido'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    function getAlumnnoByMatricula($matricula)
    {
        $alumno = new Alumno();
        $query = $this->db->connect()->prepare("SELECT * FROM alumnos WHERE matricula = :matricula");
        try {
            $query->execute(['matricula' => $matricula]);

            while ($row = $query->fetch()) {
                $alumno->matricula    = $row['matricula'];
                $alumno->nombre       = $row['nombre'];
                $alumno->apellido       = $row['apellido'];
            }
            return $alumno;
        } catch (PDOException $e) {
            return null;
        }
    }

    function update($param)
    {
        $query = $this->db->connect()->prepare("UPDATE alumnos SET nombre = :nombre,apellido = :apellido WHERE matricula =:matricula");

        try {
            $query->execute([
                'nombre' => $param['nombre'],
                'apellido' => $param['apellido'],
                'matricula' => $param['matricula']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($param)
    {
        $query = $this->db->connect()->prepare("DELETE FROM alumnos WHERE matricula = :matricula");
        try {
            $query->execute([
                'matricula' => $param,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
