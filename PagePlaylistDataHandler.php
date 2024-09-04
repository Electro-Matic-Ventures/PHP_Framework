<?php

    
    require_once("InterfaceADPPlaylist.php");
    require_once("DBIOParent.php");


    class PagePlaylistDataHandler {

        public static function add_to_playlist(array $processed) { 
            $interface = new InterfaceADPPlaylist();
            $interface->file_id = $processed["file_id"];
            DBIOParent::insert_single_row(
                "adp",
                "playlist",
                $interface
            );
            return;
        }

        public static function delete_from_playlist(array $processed) {
            $delete_ids = self::make_delete_array($processed);
            DBIOParent::delete_where_column_in(
                "adp",
                "playlist",
                "file_id",
                $delete_ids
            );
        }

        private static function make_delete_array(array $processed):array {
            $ids = [];
            foreach($processed as $key=>$value) {
                if (strpos($key, "delete_") !== false) {
                    array_push($ids, $value);
                }
            }
            return $ids;
        }
    }
?>