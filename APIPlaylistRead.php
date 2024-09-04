<?php


    require_once("DBIOParent.php");


    class APIPlaylistRead {

        public static function go() {
            $query = "SELECT * FROM adp.playlist;";
            $response = DBIOParent::multi_query($query);
            $output = array();
            foreach ($response[0] as $key => $value) {
                $output[] = $value["file_id"];
            }
            return $output;
        }

    }

    
?>