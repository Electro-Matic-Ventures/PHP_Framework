<?php


    class DBGetSegmentTable{

        public static function go() 
        {
            $data = DBGetSegmentTable::get();
            return $data;
        }

        private static function get(){
            $connection = new DBConnection();
            $query = "SELECT * FROM log_parsed_frame.parsedsegment;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;
        }

    }


?>