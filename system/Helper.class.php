<?php

    function showError($error, $abort = false)
    {

        $data = [
            "status" => "fail",
            "message" => $error
        ];

        print_r(json_encode($data));
        if ($abort)
            exit();
    }


    function valid_method($method)
    {
        // Request server method.--//-- método de solicitud del servidor
        $request_server_method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : null;

        if ($request_server_method != $method) {
            showError("Petición invalida", true);
        }
    }
?>