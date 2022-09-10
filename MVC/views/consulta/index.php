<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>

</head>
<body>
    <?php require 'views/header.php' ?>


    <div id="main">
        <h1 class="center">Esta es la vista de consulta</h1>
        <div id="respuesta" class="center"></div>
        <table class="w-100">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody id="tbody-alumnos">
                <?php foreach ($this->alumnos as $alumno) :?>
                <tr id="fila-<?= $alumno->matricula; ?>">
                    <td><?=  $alumno->matricula;    ?></td>
                    <td><?=  $alumno->nombre;       ?></td>
                    <td><?=  $alumno->apellido;     ?></td>
                    <td><a href="<?= filter_var(constant('URL').'consulta/readAlumno/'.$alumno->matricula,FILTER_SANITIZE_URL); ?>">Editar</a></td>
                    <!-- <td><a href="<?= filter_var(constant('URL').'consulta/deleteAlumno/'.$alumno->matricula,FILTER_SANITIZE_URL); ?>">Eliminar</a></td> -->
                    <td><button class="bEliminar" data-matricula="<?= $alumno->matricula; ?>"'>Eliminar</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <?php require 'views/footer.php' ?>

    <script src="<?= filter_var(constant('URL').'public/js/main.js',FILTER_SANITIZE_URL); ?>"></script>
</body>
</html>