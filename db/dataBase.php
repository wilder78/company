<?php

class dataBase
{
    var  $connection;

    // Function to build the connection with the model. --//-- Funcion para construir la conexión con la el modelo.
    function __construct()
    {
        $this->connection = new mysqli(
            apache_getenv("DBSERVER"),
            apache_getenv("DBUSER"),
            apache_getenv("DBPASSWORD"),
            apache_getenv("DBDATABASE"),
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        // echo "Connected successfully";
    }

    // Function to export the database connection. --//-- Función para exportar la conexión de la base de datos.
    public function getConexion()
    {
        return $this->connection;
    }
}
