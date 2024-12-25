<?php
    require_once "db/dataBase.php";
    require_once "model/userModel.php";
    // echo "Hello World...!"

    extract($_REQUEST);

    // print_r("<pre>");
    // print_r($_REQUEST);

    // print_r($action);

    // print_r("<pre>");
    // print_r($cedula);

    if (!isset($action)) {
        print_r("No se ha enviado un evento a ejecutar");
        exit();
    } else {
        switch($action) {
            case "consultarUsuarios":
                // print_r("Estos son todos los usuarios");
                $u = new userModel();
                
                $misDatos = $u->getAllUsers();
                
                print_r(json_encode($misDatos));
            break;

            case "buscarUsuario":
                // print_r("Este es el usuario que buscas");
                $u = new userModel();

                $result = $u->getById($idUser);
                
                print_r(json_encode($result));
            break;

            default:
                print_r("error en la petición");
        }
    }

?>