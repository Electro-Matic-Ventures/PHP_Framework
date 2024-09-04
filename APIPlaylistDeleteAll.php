<?php


    require_once("DBIOParent.php");
    

    class APIPlaylistDeleteAll {

        public static function go() {
            $query = "DELETE FROM adp.playlist;";
            DBIOParent::multi_query($query);
            return;
        }
    }


?>