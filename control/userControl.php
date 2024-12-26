<?php 

    class userControl
    {
        var $model;
       

        // Function to call the user model folder. --//--
        // Función de llamado a la carpeta de modelo de usuarios.
        function __construct()
        {
            $this->model = new userModel();
        }    


        //   Function for authenticating a user. --//-- Función para la autenticación de un usuario.
        public function authenticate($email, $password)
        {
            if (!empty($email) && $email != "" && $email != NULL &&
                !empty($password) && $password != "" && $password != NULL)
            {
                $result = $this->model->validateUser($email, sha1($password));

                if (is_array($result) && count($result) > 0)
                {
                    return $result;
                } else {
                    return 1;
                }
            } else {
                return 0;
            }
        }


        // Function to generate the list of all users. --//-- Función para generar la lista de todos los usuarios.
        public function listOfUsers()
        {
            return $this->model->getAllUsers();
        }


        // Function to generate the user search. --//-- Función para generar la busqueda de usuario.
        public function searchUser($idUser)
        {
            if (!empty($idUser) && $idUser != "" && $idUser != NULL)
            {
                $result = $this->model->getById($idUser);

                if (is_array($result) && count($result) > 0)
                {
                    return $result;
                } else {
                    return 1;
                }

            } else {
                return 0;
            }
        }


        // Function to register a new user. --//-- Función para registrar un nuevo usuario.
        public function registerUser($email, $password, $state)
        {
            if (!empty($email) && $email != "" && $email != NULL &&
                !empty($password) && $password != "" && $password != NULL &&
                !empty($state) && $state != "" && $state != NULL)
            {
                $result = $this->model->getByEmail($email);

                if (is_array($result) && count($result) == 0)
                {
                    $result = $this->model->insertUser($email, sha1($password), $state);

                    if ($result)
                        return 3; //Usuario creado.
                    else
                        return 2; // Usuario no creado.
                } else
                    return 1; //Usuario ya existe con el mismo email  
            } else
                return 0; // Faltan datos.
        }


        // Function to modify or update a user. --//-- Función para modificar o actualizar un usuario.
        public function modifyUser($idUser, $email, $state)
        {
            if (!empty($idUser) && $idUser != "" && $idUser != NULL &&
                !empty($email) && $email != "" && $email != NULL &&
                !empty($state) && $state != "" && $state != NULL)
            {
                $result = $this->model->getById($idUser);

                if (!is_array($result) && count($result) > 0)
                {
                    $result = $this->model->upDate($idUser, $email, $state);

                    if ($result)
                        return 3; //Usuario actualizado.
                    else
                        return 2; // Usuario no actualizado.
                } else
                    return 1; //Usuario no existe. 
            } else
                return 0; // Faltan datos.
        }
    
    }
?>