<?php

    class cmdUserConsult
    {
        private $default_request_method = "GET";

        public function execute()
        {
            // Validate the "POST" or "GET" call method. --//-- Validar el metodo de llamado "POST" o "GET".
            valid_method($this->default_request_method);

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
