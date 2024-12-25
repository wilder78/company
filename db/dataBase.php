<?php

class dataBase
{
    var  $connection;

    public function connect()
    {
        $this->connection = new mysqli("localhost", "root", "", "company");

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        // echo "Connected successfully";
        return $this->connection;
    }
}
