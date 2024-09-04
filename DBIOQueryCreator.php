<?php


    class DBIOQueryCreator {

        public static function read_all_rows(string $s, string $t) {
            $query = "SELECT * FROM {$s}.{$t};";
            return $query;
        }

        public static function read_one_row(string $s, string $t, string $tc, string $tv){
            $query = "SELECT * FROM {$s}.{$t} WHERE {$tc}='{$tv}';";
            return $query;
        }

        public static function delete_all_rows(string $s, string $t) {
            $query = "DELETE FROM {$s}.{$t};";
            return $query;
        }

    }

?>