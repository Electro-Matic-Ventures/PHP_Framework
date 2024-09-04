<?php 


    require_once('DBInterfaceScreenFormatting.php');
    require_once('DBConnection.php');

    
    /**
     * gets file data for given file id. returns DBInterfaceFile
     */
    class DBGetDataScreenFormatting{

        public static function go($file_id) 
        {
            $data = DBGetDataScreenFormatting::get($file_id);
            return new DBInterfaceScreenFormatting($data);
        }

        private static function get($file_id){
            $connection = new DBConnection();
            $query = "SELECT * FROM adp.screen_formatting WHERE file_id = '$file_id';";
            $result = $connection->mysqli->query($query)->fetch_assoc();
            return $result;
        }

    }
?>

