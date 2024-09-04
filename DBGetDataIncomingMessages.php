<?php


    require_once("DBConnection.php");
    require_once("IncomingMessagesInterface.php");


    class DBGetDataIncomingMessages {

        public static function go():IncomingMessagesInterface {
            $connection = new DBConnection();
            $query = "SELECT * FROM logs.incoming ORDER BY id DESC;";
            $data = [];
            $results = $connection->mysqli->query($query);
            while($row = $results->fetch_assoc()) {
                array_push($data, $row);
            }
            return new IncomingMessagesInterface($data);
        }

    }


?>