<?php

    class userModel
    {
        var $connection;

        function __construct()
        {
           $conn = new dataBase();
           $this->connection = $conn->connect();
        }

        // Call all users function. --//-- Funcion de llamado a todos los usuarios.
        public function getAllUsers()
        {
            $sql = "SELECT * FROM userTable";

            $result = $this->connection->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getById($idUser)
        {
            $sql = "SELECT * FROM userTable WHERE idUser = $idUser";

            $result = $this->connection->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>