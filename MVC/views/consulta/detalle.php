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
        <h1>Detalle de <?= $this->alumno->matricula; ?></h1>

        <div class="center"><?php echo (isset($this->mensaje)) ?  $this->mensaje :  '' ; ?></div>

        <form action="<?= constant('URL') ?>consulta/updateAlumno" method="POST">
            <p>
                <label for="matricula">Matricula</label><br>
                <input type="text" name="matricula" id="matricula" value="<?= htmlspecialchars($this->alumno->matricula) ?>" disabled required>
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($this->alumno->nombre) ?>" required>
            </p>
            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" id="apellido" value="<?= htmlspecialchars($this->alumno->apellido) ?>"required>
            </p>
            <p>
                <input type="submit" value="Guardar cambios">
            </p>
        </form>
    </div>


    <?php require 'views/footer.php' ?>
</body>
</html>