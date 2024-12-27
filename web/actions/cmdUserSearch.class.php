<?php

    class cmdUserSearch
    {
        public function execute($params)
        {
            extract($_REQUEST);

            $idUser = $params[0];
            
            $u = new userControl();
            $result = $u->searchUser($idUser);

            if (is_array($result)) {
                $response = [
                    "result" => "ok",
                    "data" => $result,
                    "message" => "Usuario Encontrado."
                ];
            }

            if ($result == 0) {
                $response = [
                    "result" => "bad",
                    "data" => "",
                    "message" => "Datos incompletos."
                ];
            }

            if ($result == 1) {
                $response = [
                    "result" => "bad",
                    "data" => "",
                    "message" => "Usuario no encontrado."
                ];
            }

            print_r(json_encode($response));
        }
    }
?>