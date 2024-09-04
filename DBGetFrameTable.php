<?php


    class DBGetFrameTable{

        public static function go() 
        {
            $data = DBGetFrameTable::get();
            return $data;
        }

        private static function get(){
            $connection = new DBConnection();
            $query = "SELECT * FROM log_parsed_frame.parsedframe;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;
        }

    }


?>