<?php

$password_database = 'ernt3\fP=}/H8gv}';
$password_form = 'ernt3\fP=}/H8gv}';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hashes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Hashes para encriptar contraseñas</h1>
        <h2 class="text-center">Supongamos que tenemos la contraseña '<?= $password_database ?>'</h2>


        <p>Usando password_hash() para generar y password_verify() para validar la contraseña</p>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Algorithm</th>
                        <th>Result</th>
                        <th>Password verify</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">PASSWORD_DEFAULT</td>
                        <td><?= $hash_default = password_hash($password_database, PASSWORD_DEFAULT); ?></td>
                        <td><?= (password_verify($password_form, $hash_default)) ? 'true' : 'false'; ?></td>
                    </tr>
                    <tr>
                        <td scope="row">PASSWORD_BCRYPT</td>
                        <td><?= $hash_bcrypt = password_hash($password_database, PASSWORD_BCRYPT); ?></td>
                        <td><?= (password_verify($password_form, $hash_bcrypt)) ? 'true' : 'false'; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <p>Usando hash( $algorithm , $password )</p>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Algorithm</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (hash_algos() as $algorithm) : ?>
                        <tr>
                            <td scope="row"><?= $algorithm ?></td>
                            <td><?= hash($algorithm, $password_database) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>