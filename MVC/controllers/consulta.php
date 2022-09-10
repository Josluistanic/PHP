<?php
class Consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
        $alumnos = [];
    }
    /**
     * The function render() is called from the controller, which calls the model to get the data, and
     * then calls the view to display the data
     */
    function render()
    {
        $alumnos = $this->model->get();
        $this->view->alumnos = $alumnos;
        $this->view->render('consulta/index');
    }

    function readAlumno($param = null)
    {
        $matricula = $param[0];
        $alumno = $this->model->getAlumnnoByMatricula($matricula);

        session_start();
        $_SESSION['matriculaAlumno'] = $alumno->matricula;

        $this->view->alumno = $alumno;
        $this->view->render('consulta/detalle');
    }
    function updateAlumno()
    {
        session_start();
        $matricula    = $_SESSION['matriculaAlumno'];
        $nombre       = $_POST['nombre'];
        $apellido     = $_POST['apellido'];


        unset($_SESSION['matriculaAlumno']);

        if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            $alumno = new Alumno();
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;

            $this->view->alumno = $alumno;
            $this->view->mensaje = 'Se ha actualizado el alumno';
        } else {
            $this->view->mensaje = 'Error al actualizar el alumno';
        }
        $this->view->render('consulta/detalle');
    }
    function deleteAlumno($param = null)
    {
        $matricula = $param[0];

        if ($this->model->delete($matricula)) {
            $mensaje = 'Se ha eliminado el alumno';
        } else {
            $mensaje = 'Error al eliminar el alumno';
        }
        //$this->render();

        echo $mensaje ;
    }
}
