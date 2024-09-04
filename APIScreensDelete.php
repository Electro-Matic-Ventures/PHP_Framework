<?php


    require_once("DBIOParent.php");


    class APIScreensDelete {

        public static function go(array $file_ids) {
            foreach($file_ids as $key => $value) {
                $file_ids[$key] = "'{$value}'";
            }
            $imploded = implode(",",$file_ids);
            $queries = array();
            $queries[] = self::current_file_query($imploded);
            $queries[] = self::files_query($imploded);
            $queries[] = self::playlist_query($imploded);
            $queries[] = self::row_formatting_query($imploded);
            $queries[] = self::screen_formatting_query($imploded);
            $queries[] = self::segment_formatting_query($imploded);
            $queries = implode(";",$queries);
            DBIOParent::multi_query($queries);
            return;
        }

        private static function current_file_query(string $file_ids): string {
            $query = self::query_base("current_file", $file_ids);
            return $query;
        }

        private static function files_query (string $file_ids): string {
            $query = self::query_base("files", $file_ids);
            return $query;
        }

        private static function playlist_query(string $file_ids): string {
            $query = self::query_base("playlist", $file_ids);
            return $query;
        }

        private static function row_formatting_query(string $file_ids): string {
            $query = self::query_base("row_formatting", $file_ids);
            return $query;
        }

        private static function screen_formatting_query(string $file_ids): string {
            $query = self::query_base("screen_formatting", $file_ids);
            return $query;
        }

        private static function segment_formatting_query (string $file_ids): string {
            $query = self::query_base("segment_formatting", $file_ids);
            return $query;
        }

        private static function query_base(string $table, $file_ids) {
            $query = "DELETE FROM adp.{$table} WHERE file_id IN ({$file_ids})";
            return $query;
        }

    }

?>