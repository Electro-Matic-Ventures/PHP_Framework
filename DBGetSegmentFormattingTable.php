<?php


    class DBGetSegmentFormattingTable{

        public static function go() 
        {
            $data = DBGetSegmentFormattingTable::get();
            return $data;
        }

        private static function get(){
            $connection = new DBConnection();
            $query = "SELECT * FROM log_parsed_frame.parsedsegmentformatting;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;
        }

    }


?>