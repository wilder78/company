<?php
    require_once "db/dataBase.php";
    require_once "config/db.inc";
    require_once "control/userControl.php";
    require_once "model/userModel.php";

    // echo "Hello World...!"

    extract($_REQUEST);

    // print_r("<pre>");
    // print_r($_REQUEST);

    // print_r($action);

    // print_r("<pre>");
    // print_r($cedula);

    // A "yes" condition is generated to confirm that the action method is called. 
    // Se genera una condidión "SI" para confirmar que se llama el metodo acción. 
    if (!isset($action)) {
        require "views/login.php";
    } else {
        switch($action) {
            // Authentication case. --//-- Caso de autenticación.
            case "autenticar":
                $u = new userControl();
                $result = $u->authenticate($email, $password);

                if (is_array($result)){
                    $response = [
                        "result" => "ok",
                        "data"=>$result,
                        "message" => "Usuario Valido!"
                    ];

                    // require "views/home.php";
                }

                if ($result == 0) {
                    $response = [
                        "result" => "bad",
                        "data"=>"",
                        "message" => "Datos incompletos"
                    ];

                    // require "views/login.php";
                }

                if ($result == 1) {
                    $response = [
                        "result" => "bad",
                        "data"=>"",
                        "message" => "Usuario Invalido"
                    ];

                    // require "views/login.php";
                }

                print_r(json_encode($response));
            break;


            // Case of consulting all users. --//-- Caso de consultar todos los usuarios.
            case "consultarUsuarios":
                $u = new userControl();

                $result = $u->listOfUsers();
                
                print_r(json_encode($result));
            break;


            // Case to search for a user. --//-- Caso para buscar un usuario.
            case "buscarUsuario":
                $u = new userControl();
                $result = $u->searchUser($idUser);

                if (is_array($result)){
                    $response = [
                        "result" => "ok",
                        "data"=>$result,
                        "message" => "Usuario Encontrado."
                    ];
                }

                if ($result == 0) {
                    $response = [
                        "result" => "bad",
                        "data"=>"",
                        "message" => "Datos incompletos."
                    ];
                }

                if ($result == 1) {
                    $response = [
                        "result" => "bad",
                        "data"=>"",
                        "message" => "Usuario no encontrado."
                    ];
                }

                print_r(json_encode($response));
            break;


            // Case to register a new user. --//-- Caso para registrar un nuevo usuario.
            case "registrar":
                $u = new userControl();
                $result = $u->registerUser($idUser,$email,$password,$state);

                switch ($result)
                {
                    case 0:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Faltan datos."
                        ];
                    break;

                    case 1:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Usuario ya existe con el mismo email."
                        ];
                    break;

                    case 2:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Usuario no creado."
                        ];
                    break;

                    case 3:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Usuario creado."
                        ];
                    break;
                }
                print_r("Falta finalizar.");
            break;


            // Case to update a user. --//-- Caso para actualizar un usuario.
            case "actualizarUsuario":
                $u = new userControl();
                $result = $u->modifyUser($idUser, $email, $state);

                switch ($result)
                {
                    case 0:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Faltan datos."
                        ];
                    break;

                    case 1:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Usuario no existe."
                        ];
                    break;

                    case 2:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Usuario no actualizado."
                        ];
                    break;

                    case 3:
                        $response =[
                            "result" => "bad",
                            "data"=>"",
                            "message" => "Usuario actualizado."
                        ];
                    break;
                }
                print_r("Falta finalizar.");
            break;


            // Default case that does not meet any case. --//-- Caso por default que no cumple ningun caso.
            default:
                // print_r("error en la petición");
                require "views/login.php";
        }
    }

?>