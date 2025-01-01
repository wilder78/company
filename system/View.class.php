<?php

    class view
    {
       public static function render($params =[])
       {
            $d = json_decode(json_encode($params));

            if (!is_dir(VIEWS))
            {
                // die("El directorio de vistas no existe :(...!");
                showError("El directorio de vistas no existe :(...!", true);
            }
            $filename = VIEWS . $params["view"] ."View.php";
            if (!is_file($filename))
                // die("La vista no existe :(...!");
                showError("La vista no existe :(...!", true);

            require_once $filename;
       }
    }
?>