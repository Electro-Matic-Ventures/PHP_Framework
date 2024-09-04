<?php

    class RunQueries {

        public static function go(array $queries) {
            $connection = new DBConnection();
            $results = [];
            foreach($queries as $query){
                $result = $connection->mysqli->query($query);
                array_push($results, $result->fetch_assoc());
            }   
            return $results;
        }
    }

?>






