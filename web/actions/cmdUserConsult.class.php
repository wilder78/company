<?php

    class cmdUserConsult
    {
        public function execute()
        {
            $u = new userControl();

            $result = $u->listOfUsers();
            $response = [
                "result" => "success",
                "data" => $result,
                "message" => "listado generado."
            ];

            if (!CALL_API == true) // Debe mostrar una pantalla HTML
                $response["view"] = "users/index";

            return $response;
        }
    }
?>
