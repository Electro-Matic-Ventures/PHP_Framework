<?php


    require_once("DBIOParent.php");


    class APIPlaylistDelete {

        public static function go(array $file_ids) {
            foreach ($file_ids as $key => $value) {
                $file_ids[$key] = "'{$value}'";
            }
            $query = implode(",",$file_ids);
            $query = "DELETE FROM adp.playlist WHERE file_id IN ({$query});";
            DBIOParent::multi_query($query);
            return;
        }
        
    }


?>