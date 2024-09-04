<?php


    require_once("DBIOParent.php");


    class APIPlaylistUpdate {

        public static function go(array $input) {
            $stored = self::get_stored_file_ids();
            $new_playlist = self::get_new_playlist($input, $stored);
            $result = self::set_new_playlist($new_playlist);
            return null;
        }

        private static function get_stored_file_ids(): array {
            $query = "SELECT file_id FROM adp.files;";
            $result = DBIOParent::multi_query($query);
            $result = $result[0];
            $output = array();
            foreach($result as $key => $value) {
                $output[$value["file_id"]] = null;
            }
            return $output;
        }

        private static function get_new_playlist(array $input, array $stored) {
            $output = array();
            foreach ($input as $key=>$value) {
                if (array_key_exists($value, $stored)) {
                    $output[] = $value;
                }
            }
            return $output;
        }

        private static function set_new_playlist(array $ids) {
            foreach($ids as $key => $value) {
                $ids[$key] = "('{$value}')";
            }
            $file_ids = implode(",",$ids);
            $query = "DELETE FROM adp.playlist;";
            $query .= "INSERT INTO adp.playlist (file_id) VALUES {$file_ids};";
            $result = DBIOParent::multi_query($query);
            return $result;
        }

    }