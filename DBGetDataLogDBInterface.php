<?php


    class DBGetDataLogDBInterface{

        public static function go() 
        {
            $data = DBGetDataLogDBInterface::get();
            return $data;
        }

        private function get(){
            $connection = new DBConnection("databaseone");
            $query = "SELECT * FROM databaseone.files
            INNER JOIN databaseone.rows_ ON databaseone.rows_.file_id = databaseone.files.file_id
            INNER JOIN databaseone.segments ON databaseone.segments.row_id = databaseone.rows_.row_id;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;
        }

        public static function get_defaults(){
            $connection = new DBConnection("databaseone");
            $query = "SELECT * FROM databaseone.defaults;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;

        }

        public static function get_sign_parameters(){
            $connection = new DBConnection("databaseone");
            $query = "SELECT * FROM databaseone.sign_parameters;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;

        }

    }


?>