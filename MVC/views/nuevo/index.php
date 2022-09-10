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
        <h1>Esta es la vista de nuevo</h1>

        <div class="center"><?= $this->mensaje; ?></div>

        <form action="<?= constant('URL') ?>nuevo/registrarAlumno" method="POST">
            <p>
                <label for="matricula">Matricula</label><br>
                <input type="text" name="matricula" id="matricula" required>
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" id="nombre" required>
            </p>
            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" id="apellido" required>
            </p>
            <p>
                <input type="submit" value="Registrar nuevo alumno">
            </p>
        </form>
    </div>


    <?php require 'views/footer.php' ?>
</body>
</html>