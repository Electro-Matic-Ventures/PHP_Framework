<?php


    require_once("Utilities.php");


    class AssembleCharacters
    { 

        public static function go($data): array {
            if (isset($data["playlist"][0]) && empty($data["playlist"][0]->file_id)) {
                return array();
            }
            $library = [];
            foreach ($data["segment_formatting"] as $key=>$segment) {
                $row = self::get_row_by_id($data["row_formatting"], $segment->row_id);
                if (is_null($row)) {
                    $r = self::is_string($data["segment_formatting"], $segment);
                    $is_string = $r[0];
                    $row_id = $r[1];
                    if ($is_string) {
                        $row = self::get_row_by_id($data["row_formatting"], $row_id);
                        $library = self::get_segment_characters($segment, $row, $library, $data["defaults"]);
                    }
                    continue;
                }
                $library = self::get_segment_characters($segment, $row, $library, $data["defaults"]);
            }
            return $library;
        }

        private static function get_row_by_id($rows, $id) {
            foreach ($rows as $key=>$row) {
                if ($row->row_id == $id) {
                    return $row;
                }
            }
            return null;
        }

        private static function is_string($segments, $segment) {
            $test_character = substr($segment->file_id, 6, 1);
            if ($test_character != "S") {
                return [false, null];
            }
            $search_id = substr($segment->file_id, 7);
            foreach ($segments as $key=>$value) {
                if (strpos($value->text, $search_id) and $value->segment_id != $segment->segment_id) {
                    return [true, $value->row_id];
                }
            }
            return [false, null];
        }

        private static function get_segment_characters($segment, $row, $library, $defaults) {
            if(is_null($segment->text)) {
                return $library;
            }
            $exploded = str_split($segment->text);
            foreach ($exploded as $key=>$character) {
                if(is_null($character) or $character == "") {
                    continue;
                }
                $size = self::default_swap($row->font_size, $defaults->font_size);
                $weight = self::default_swap($row->font_weight, $defaults->font_weight);
                $color = self::default_swap($segment->foreground_color, $defaults->foreground_color);
                $code = self::get_character_code($character);
                $encoded_image = self::encode_character($weight, $size, $color, $code);
                $library[$weight][$size][$color][$code] = $encoded_image;
                $code = self::get_character_code("-");
                $encoded_image = self::encode_character($weight, $size, $color, $code);
                $library[$weight][$size][$color][$code] = $encoded_image;
            }
            return $library;
        }

        private static function get_character_code($character) {
            $as_ascii = ord($character);
            $as_string = sprintf("%04X", $as_ascii);
            return $as_string;
        }

        private static function default_swap($value, $default) {
            if (is_null($value)) {
                return $default;
            }
            return $value;
        }

        private static function encode_character($weight, $size, $color, $code) {
            $file_name = "../sign/font/{$weight}_{$size}_{$color}_{$code}.png";
            $encoded_image = base64_encode(file_get_contents($file_name));
            return $encoded_image;
        }

    }

    ?>