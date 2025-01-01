<?php

    class cmdUserSearch
    {
        public function execute($params)
        {
            extract($_REQUEST);

            if (count($params) == 0)
            $response = [
                "result" => "fail",
                "data" => "",
                "message" => "Faltan parametros."
            ];
            else {
                $idUser = $params[0];
                
                $u = new userControl();
                $result = $u->searchUser($idUser);

                if (is_array($result)) {
                    $response = [
                        "result" => "success",
                        "data" => $result,
                        "message" => "Usuario Encontrado."
                    ];
                }

                if ($result == 0) {
                    $response = [
                        "result" => "fail",
                        "data" => "",
                        "message" => "Datos incompletos."
                    ];
                }

                if ($result == 1) {
                    $response = [
                        "result" => "fail",
                        "data" => "",
                        "message" => "Usuario no encontrado."
                    ];
                }
            }

            
            if (!CALL_API == true) // Debe mostrar una pantalla HTML
                $response["view"] = "users/edit";

            return $response;
            // print_r(json_encode($response));
        }
    }
?>