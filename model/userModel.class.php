<?php

    class userModel
    {
        var $connection;

        /* Function to receive the connection to the database.--//--
        Función para recepcionar la conexión con la base de datos. */
        function __construct()
        {
           $conn = new dataBase();
           $this->connection = $conn->getConexion();
        }

        
        // Call all users function. --//-- Funcion de llamado a todos los usuarios.
        public function getAllUsers()
        {
            $sql = "SELECT * FROM userTable";

            $result = $this->connection->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }


        // Function of calling a user.--//--Funcion de llamado a un usuario.
        public function getById($idUser)
        {
            $sql = "SELECT * FROM userTable WHERE idUser = $idUser";

            $result = $this->connection->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }


        // Function for validating a user --//-- Función para la validación de un usuario
        public function validateUser($email, $password)
        {
            $sql = "SELECT * 
                    FROM userTable 
                    WHERE email = '$email'
                    AND password = '$password'"; 
            // print_r($sql);
            $result = $this->connection->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }


        // Function to search for users by email. --//-- Función para buscar usuario por email.
        public function getByEmail($email)
        {
            $sql = "SELECT * 
                    FROM userTable 
                    WHERE email = '$email'"; 

            $result = $this->connection->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);
        }


        // Function to register users. --//-- Función para realizar registro de usuarios.
        public function insertUser($email, $password, $state)
        {
            $sql = "INSERT 
                    INTO userTable 
                    VALUES (null, '$email','$password', $state)"; 

            $result = $this->connection->query($sql);

            return $result;
        }


        // Function to update the user. --//-- Función para actualizar el usuario.
        public function upDate($idUser, $email, $state)
        {
            $sql = "UPDATE 
                    SET email = '$email',
                        state = '$state',
                    WHERE idUser = $idUser"; 

            $result = $this->connection->query($sql);

            return $result;
        }


        // Function to update a password. --//-- Función para actualizar una contraseña.
        public function upDatedPassword($idUser, $password)
        {
            $sql = "UPDATE 
                SET password = '$password',
                WHERE idUser = $idUser";

            $result = $this->connection->query($sql);

            return $result;
        }

    }
?>