<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="" method="post">
        <?= isset($errorLogin) ? $errorLogin : '' ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: </p>
        <br><input type="text" name="username">
        <p>Password: </p>
        <br><input type="password" name="password">
        <p class="center">
            <input type="submit" value="Iniciar sesión">
        </p>
    </form>
</body>

</html>