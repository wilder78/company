<?php

    class cmdDefault
    {
        public function execute()
        {
            $response = [
                "result" => "success",
                "data" => "",
                "message" => "",
                "view" => "login"
            ];
            return $response;
        }
    }
?>