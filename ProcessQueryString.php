<?php


    class ProcessQueryString {

        public static function split(string $query_string): ?array{
            if (strlen($query_string) == 0) {
                return null;            
            }
            $data = [];
            $pairs = explode("&", $query_string);
            foreach ($pairs as $key => $value) {
                $pair = explode("=", $value);
                $data[$pair[0]] = urldecode($pair[1]);
            }
            return $data;         
        }
        
    }

?>