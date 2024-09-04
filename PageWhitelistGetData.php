<?php


    require_once("DBConnection.php");


    class PageWhitelistGetData {

        public static function go() {
            $connection = new DBConnection();
            $query = "SELECT * FROM settings.whitelist;";
            $data = $connection->mysqli->query($query);
            $return = array();
            while ($row = $data->fetch_assoc()) {
                $return[] = $row["ip_address"];
            }
            $connection->mysqli->close();
            return $return;
        }

    }


?>