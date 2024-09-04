<?php


    class DBConnection{
        
        public mysqli $mysqli;
        
        public function __construct(){
            $HOSTNAME = "mariadb-container";
            $USERNAME = "root";
            $PASSWORD = "8675309";
            $this->mysqli = new mysqli($HOSTNAME, $USERNAME, $PASSWORD);
        }
        
        public function __destruct()
        {
            // $this->mysqli->close();
        }

    }


?>