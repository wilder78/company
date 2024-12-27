<?php

class cmdUserAuthenticate
{
    public function execute()
    {
        extract($_REQUEST);
        
        $u = new userControl();
        $result = $u->authenticate($email, $password);

        if (is_array($result)) {
            $response = [
                "result" => "ok",
                "data" => $result,
                "message" => "Usuario Valido!"


            ];

            // require "views/home.php";
        }

        if ($result == 0) {
            $response = [
                "result" => "bad",
                "data" => "",
                "message" => "Datos incompletos"
            ];

            // require "views/login.php";
        }

        if ($result == 1) {
            $response = [
                "result" => "bad",
                "data" => "",
                "message" => "Usuario Invalido"
            ];

            // require "views/login.php";
        }

        print_r(json_encode($response));
    }
}
