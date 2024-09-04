<?php


    require_once('DBInterfaceCurrentFile.php');
    require_once('DBConnection.php');

    /**
     * gets file current_file file id. returns DBInterfaceCurrentFile
     */
    Class DBGetDataCurrentFile{

        public static function go(){
            $data = DBGetDataCurrentFile::get();
            return new DBInterfaceCurrentFile($data);
        }

        private static function get(){
            $connection = new DBConnection();
            $query = "SELECT * FROM adp.current_file;";
            $result = $connection->mysqli->query($query)->fetch_assoc();
            return $result;
        }
    }


?>