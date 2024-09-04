<?php

    
    require_once("DBIOParent.php");


    class APIScreensDeleteAll {

        public static function go() {
            $queries = array();
            $queries[] = self::base_query("current_file");
            $queries[] = self::base_query("files");
            $queries[] = self::base_query("playlist");
            $queries[] = self::base_query("row_formatting");
            $queries[] = self::base_query("screen_formatting");
            $queries[] = self::base_query("segment_formatting");
            $queries = implode(";",$queries);
            DBIOParent::multi_query($queries);
            return;
        }

        private static function base_query(string $table): string {
            $query = "DELETE FROM adp.{$table}";
            return $query;
        }

    }
    

?>