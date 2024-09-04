<?php


    class DBGetDefaultsTable{

        public static function go() 
        {
            $data = DBGetDefaultsTable::get();
            return $data;
        }

        private static function get(){
            $connection = new DBConnection();
            $query = "SELECT * FROM databaseone.defaults;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;
        }

    }


?>