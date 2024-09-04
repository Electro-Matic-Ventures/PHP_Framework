<?php 


    require_once('DBInterfaceSegment.php');
    require_once('DBConnection.php');
    

    /**
     * @property array $segments
     * @property mysqli $mysqli
     */
    class DBGetDataSegments{

        public static function go($file_id) 
        {
            $data = self::get($file_id);
            $segment_interfaces = self::wrap($data);
            return $segment_interfaces;
        }

        private static function get($file_id){
            $connection = new DBConnection();
            $query = "SELECT * FROM adp.segment_formatting WHERE file_id='$file_id';";
            $result = $connection->mysqli->query($query);
            return $result;
        }

        private static function wrap($data){
            $wrapper = array();
            while($row = $data->fetch_assoc()) {
                array_push($wrapper, new DBInterfaceSegment($row));
            }
            return $wrapper;
        }
    }


?>

