<?php


    class DBConnection{
        
        public mysqli $mysqli;
        
        public function __construct(){
            $HOSTNAME = 'localhost';
            $USERNAME = "myuser";
            $PASSWORD = "test";
	    $DB_NAME = "contacts_db";
            $this->mysqli = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DB_NAME);

            if ($this->mysqli->connect_error) {
                throw new Exception('Connection failed: ' . $this->mysqli->connect_error);
            }
        }
        
        public function __destruct()
        {
            // $this->mysqli->close();
        }

    }


?>
