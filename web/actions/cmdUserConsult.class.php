<?php

    class cmdUserConsult
    {
        public function execute()
        {
            $u = new userControl();

            $result = $u->listOfUsers();
            
            print_r(json_encode($result));
        }
    }
?>