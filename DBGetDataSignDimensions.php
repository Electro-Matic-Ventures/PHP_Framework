<?php 


    require_once('DBInterfaceSignDimensions.php');
    require_once('DBConnection.php');

    
    /**
     * gets file data for given file id. returns DBInterfaceFile
     */
    class DBGetDataSignDimensions{

        public static function go(): DBInterfaceSignDimensions {
            $data = self::get();
            return new DBInterfaceSignDimensions($data);
        }

        private static function get(){
            $connection = new DBConnection();
            $query = "SELECT * FROM settings.dimensions WHERE name = 'current';";
            $result = $connection->mysqli->query($query)->fetch_assoc();
            return $result;
        }

    }
?>

