<?php
    require_once "db/dataBase.php";
    require_once "model/userModel.php";

    $u = new userModel();
    $misDatos = $u->getAllUsers();

    print_r("<pre>");
    print_r($misDatos);

    $result = $u->getById(1);

    print_r("<pre>");
    print_r($result);

    // $c = new dataBase();

    // $c->connect();

    // print_r("<pre>");
    // print_r($c);