<?php

    require_once ".autoloader";
    require_once ".frontController";

    $process = new frontController();

    $process->processRequest()

?>