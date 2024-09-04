<?php


    require_once('DBConnection.php');
    require_once('DBInterfaceDefaults.php');


    Class DBGetDataDefaults{
        
        public static function go(): DBInterfaceDefaults {
            $data = self::get();
            return new DBInterfaceDefaults($data);
        }
        
        private static function get(){
            $conn = new DBConnection();
            $sql = "SELECT * FROM adp.defaults WHERE id = 1;";
            return $conn->mysqli->query($sql)->fetch_assoc();
        }
        
    }

    
?>