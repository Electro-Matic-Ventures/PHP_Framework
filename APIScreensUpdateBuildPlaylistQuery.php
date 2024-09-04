<?php


    class APIScreensUpdateBuildPlaylistQuery {

        public static function go($playlist) {
            $query = "DELETE FROM adp.playlist;";
            foreach ($playlist as $key => $file_id) {
                $playlist[$key] = "('{$file_id}')";
            }
            $imploded = implode(",", $playlist);
            $query .= "INSERT INTO adp.playlist (file_id) VALUES $imploded;";
            return $query;
        }

    }

?>