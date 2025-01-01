<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de usuarios</title>
</head>

<body>
    <h3>listado de usuarios </h3>
    <table border=1>
        <thead>
            <th>id</th>
            <th>email</th>
            <th>password</th>
            <th>estado</th>
        </thead>
        <?php
        foreach ($d->data as $usuario)
        {
            print_r("<tr>");
                print_r("<td>$usuario->idUser</td>");
                print_r("<td>$usuario->email</td>");
                print_r("<td>$usuario->password</td>");
                print_r("<td>$usuario->state</td>");
                // print_r($usuario->idUser . " - " . $usuario->email . "<br>");
            print_r("</tr>");
        }
        ?>
    </table>
</body>

</html>