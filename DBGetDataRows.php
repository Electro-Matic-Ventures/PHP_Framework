<?php 


    require_once('DBInterfaceRow.php');
    require_once('DBConnection.php');


    /**
     * @property array $row_data    
     * @property mysqli $mysqli
     */
    class DBGetDataRows{

        public static function go($file_id): array {
            $data = self::get($file_id);
            $row_interfaces = self::wrap_rows($data);
            return $row_interfaces;
        }

        private static function get($file_id){
            $connection = new DBConnection();
            $sql = "SELECT * FROM adp.row_formatting WHERE file_id='$file_id';";
            $result = $connection->mysqli->query($sql);
            return $result;
        }

        private static function wrap_rows($data): array {
            $wrapper = array();
            while ($row = $data->fetch_assoc()){
                array_push($wrapper, new DBInterfaceRow($row));
            }
            return $wrapper;
        }

    }


?>