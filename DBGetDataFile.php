<?php 


    require_once('DBInterfaceFile.php');
    require_once('DBConnection.php');

    
    /**
     * gets file data for given file id. returns DBInterfaceFile
     */
    class DBGetDataFile{

        public static function go($file_id) 
        {
            $data = DBGetDataFile::get($file_id);
            return new DBInterfaceFile($data);
        }

        private static function get($file_id){
            $connection = new DBConnection();
            $query = "SELECT * FROM adp.files WHERE file_id = '$file_id';";
            $result = $connection->mysqli->query($query)->fetch_assoc();
            return $result;
        }

    }

    
?>