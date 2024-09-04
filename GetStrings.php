<?php


    class GetStrings {
        
        private const FILES = 2;
        private const ROWS = 4;
        private const SCREENS = 5;
        private const SEGMENTS = 6;

        public static function go($original, $cleaned) {
            $string_map = self::map_strings($original);
            $out = self::add_strings($original, $cleaned, $string_map);
            return $out;
        }

        private static function map_strings($original) {
            $segments = $original[6];
            $out = array();
            foreach ($segments as $key => $value) {
                $text = $value["text"];
                if (strpos($text, "[[[call:") === false) {
                    continue;
                }
                $id = substr($text, strlen("[[[call:"), -3);
                $prefix = "Z0000";
                if (strlen($id) == 1) {
                    $prefix .= "DS";
                }
                $id = [$prefix, $id];
                $id = implode("", $id);
                $out[$id] = null; 
            }
            return $out;
        }

        private static function add_strings($original, $cleaned, $string_map) {
            $cleaned["files"] = self::add(
                $original[self::FILES], 
                $cleaned["files"], 
                $string_map
            );
            $cleaned["row_formatting"] = self::add(
                $original[self::ROWS], 
                $cleaned["row_formatting"], 
                $string_map
            );
            $cleaned["screen_formatting"] = self::add(
                $original[self::SCREENS], 
                $cleaned["screen_formatting"], 
                $string_map
            );
            $cleaned["segment_formatting"] = self::add(
                $original[self::SEGMENTS], 
                $cleaned["segment_formatting"], 
                $string_map
            );
            return $cleaned;
        }

        private static function add($original, $cleaned, $string_map) {
            foreach($original as $key => $value) {
                if (array_key_exists($value["file_id"], $string_map)) {
                    $cleaned[] = $value;
                }
            }
            return $cleaned;
        }

    }


?>