<?php


    class APIScreensUpdateBuildScreensQuery {

        public static function go($data) {
            $query = "";
            $files = array();
            $playlist = array();
            $screens = array();
            $rows = array();
            $segments = array();
            foreach ($data as $file_id => $value) {
                $files[] = $file_id;
                $playlist[] = $file_id;
                $screens[$file_id] = $value->vertical_alignment;
                foreach ($value->rows as $row_id => $row_data) {
                    $rows[$file_id][$row_id] = $row_data;
                    foreach ($row_data->segments as $segment_id => $segment_data) {
                        $segments[$file_id][$row_id][$segment_id] = $segment_data;
                    }
                }
            }
            $query .= self::current_file($playlist[0]);
            $query .= self::files($files);
            $query .= self::screens($screens);
            $query .= self::rows($rows);
            $query .= self::segments($segments);
            return [$query, $playlist];
        }

        private static function current_file(string $file_id) {
            $query = "DELETE FROM adp.current_file;";
            $query .= "INSERT INTO adp.current_file (file_id) VALUES ('{$file_id}');";
            return $query;
        }
        
        private static function files(array $files) {
            $columns = [
                "file_id",
                "address_pre_filler",
                "group_",
                "sign",
                "drive",
                "folder",
                "file_"
            ];
            $rows_insert = array();
            $rows_delete = array();
            $row = array();
            for ($i=1; $i<count($columns)+1; $i++) {
                $row[] = "'API'";
            }
            foreach($files as $key => $value) {
                $row[0] = "'{$value}'";
                $this_row = implode(",",$row);
                $rows_insert[] = "({$this_row})";
                $rows_delete[] = "'{$value}'";
            }
            $columns = implode(",",$columns);
            $rows_insert = implode(",",$rows_insert);
            $rows_delete = implode(",",$rows_delete);
            $query = "DELETE FROM adp.files WHERE file_id IN ({$rows_delete});";
            $query .= "INSERT INTO adp.files ({$columns}) VALUES {$rows_insert};";     
            return $query;
        }

        private static function screens(array $screens){
            $columns = [
                "file_id",
                "vertical_alignment"
            ];
            $rows_insert = array();
            $rows_delete = array();
            foreach ($screens as $file_id => $vertical_alignment) {
                $rows_insert[] = "('{$file_id}','{$vertical_alignment}')";
                $rows_delete[] = "'{$file_id}'";
            }
            $columns = implode(",",$columns);
            $rows_insert = implode(",",$rows_insert);
            $rows_delete = implode(",",$rows_delete);
            $query = "DELETE FROM adp.screen_formatting WHERE file_id IN ({$rows_delete});";
            $query .= "INSERT INTO adp.screen_formatting ({$columns}) VALUES {$rows_insert};";
            return $query;
        }

        private static function rows($rows) {
            $columns = [
                "file_id", 
                "row_id", 
                "number", 
                "font_weight", 
                "font_size", 
                "hold_time", 
                "horizontal_alignment", 
                "in_mode", 
                "scroll_speed"
            ];
            $delete = array();
            $insert = array();
            foreach ($rows as $file_id => $file_data) {
                foreach ($file_data as $row_id => $row_data) {
                    $number = intval(substr($row_id,-3));
                    $delete[] = "'{$file_id}'";
                    $row = array();
                    $row[] = "'{$file_id}'";
                    $row[] = "'{$row_id}'";
                    $row[] = "'{$number}'";
                    $row[] = "'{$row_data->font_weight}'";
                    $row[] = "'{$row_data->font_size}'";
                    $row[] = "'{$row_data->hold_time}'";
                    $row[] = "'{$row_data->horizontal_alignment}'";
                    $row[] = "'{$row_data->in_mode}'";
                    $row[] = "'{$row_data->scroll_speed}'";
                    $row = implode(",",$row);
                    $insert[] = "({$row})"; 
                }
            }
            $delete = implode(",",$delete);
            $columns = implode(",",$columns);
            $insert = implode(",",$insert);
            $query = "DELETE FROM adp.row_formatting WHERE file_id IN ({$delete});";
            $query .= "INSERT INTO adp.row_formatting ({$columns}) VALUES {$insert};";
            return $query;
        }

        public static function segments($segments) {
            $columns = [
                "file_id", 
                "row_id", 
                "segment_id", 
                "number", 
                "foreground_color", 
                "background_color", 
                "flash", 
                "text"
            ];
            $delete = array();
            $insert = array();
            foreach ($segments as $file_id => $file_data) {
                foreach ($file_data as $row_id => $row_data) {
                    foreach ($row_data as $segment_id => $segment_data) {
                        $number = intval(substr($segment_id,-3));
                        $delete[] = "'{$file_id}'";
                        $row = array();
                        $row[] = "'{$file_id}'";
                        $row[] = "'{$row_id}'";
                        $row[] = "'{$segment_id}'";
                        $row[] = "'{$number}'";
                        $row[] = "'{$segment_data->foreground_color}'";
                        $row[] = "'{$segment_data->background_color}'";
                        $row[] = "'{$segment_data->flash}'";
                        $row[] = "'{$segment_data->text}'";
                        $row = implode(",",$row);
                        $insert[] = "({$row})";
                    }
                }
            }
            $delete = implode(",",$delete);
            $columns = implode(",",$columns);
            $insert = implode(",",$insert);
            $query = "DELETE FROM adp.segment_formatting WHERE file_id IN ({$delete});";
            $query .= "INSERT INTO adp.segment_formatting ({$columns}) VALUES {$insert};";
            return $query;
        }

    }


?>