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
                "result" => "success",
                "data" => $result,
                "message" => "Usuario Valido!",
                "view" => "home"


            ];

            // require "views/home.php";
        }

        if ($result == 0) {
            $response = [
                "result" => "fail",
                "data" => "",
                "message" => "Datos incompletos",
                "view" => "login"
            ];

            // require "views/login.php";
        }

        if ($result == 1) {
            $response = [
                "result" => "fail",
                "data" => "",
                "message" => "Usuario Invalido",
                "view" => "login"
            ];

            // require "views/login.php";
        }
        return $response;
    }
}
