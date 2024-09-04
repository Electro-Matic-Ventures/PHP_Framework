<?php

    class APIScreensReadProcessData {

        public static function go($data) {
            $output = array();
            $output["playlist"] = self::add_playlist($data["playlist"]);
            $output["screens"] = self::add_screens($data["screens"]);
            $output["screens"] = self::add_rows($data["rows"], $output["screens"]);
            $output["screens"] = self::add_segments($data["segments"], $output["screens"]);
            return $output;
        }

        private static function add_playlist($playlist) {
            $output = [];
            foreach ($playlist as $key => $value) {
                $output[] = $value->file_id;
            }
            return $output;
        }

        private static function add_screens($screens) {
            $output = array();
            foreach ($screens as $key => $value) {
                $id = $value->file_id;
                $output[$id]["vertical_alignment"] = $value->vertical_alignment;
                $output[$id]["rows"] = array();
            }
            return $output;
        }

        private static function add_rows($rows, $screens) {
            foreach ($rows as $key => $value) {
                $file_id = $value->file_id;
                $row_id = $value->row_id;
                $output = array();
                $output["font_size"] = $value->font_size;
                $output["font_weight"] = $value->font_weight;
                $output["hold_time"] = $value->hold_time;
                $output["horizontal_alignment"] = $value->horizontal_alignment;
                $output["in_mode"] = $value->in_mode;
                $output["scroll_speed"] = $value->scroll_speed;
                $output["segments"] = array();
                $screens[$file_id]["rows"][$row_id] = $output;
            }
            return $screens;
        }

        private static function add_segments($segments, $screens) {
            foreach ($segments as $key => $value) {
                $file_id = $value->file_id;
                $row_id = $value->row_id;
                $segment_id = $value->segment_id;
                $output = array();
                $output["foreground_color"] = $value->foreground_color;
                $output["background_color"] = $value->background_color;
                $output["flash"] = $value->flash;
                $output["text"] = $value->text;
                if (isset($screens[$file_id])) {
                    $screens[$file_id]["rows"][$row_id]["segments"][$segment_id] = $output;
                } else {
                    $screens = self::string_variable(
                        $file_id,
                        $row_id,
                        $segment_id,
                        $output,
                        $screens
                    );
                }
            }
            return $screens;
        }

        private static function string_variable($file_id, $row_id, $segment_id, $output, $screens) {
            if (!isset($screens[$file_id])) {
                $screens[$file_id] = array();
                $screens[$file_id]["vertical_alignment"] = "string variable inherits parent values";
                $screens[$file_id]["rows"] = array();
            }
            if (!isset($screen["rows"][$row_id])) {
                $row = array();
                $row["font_size"] = "string variable inherits parent values";
                $row["font_width"] = "string variable inherits parent values";
                $row["hold_time"] = "string variable inherits parent values";
                $row["horizontal_alignment"] = "string variable inherits parent values";
                $row["in_mode"] = "string variable inherits parent values";
                $row["scroll_speed"] = "string variable inherits parent values";
                $row["segments"] = array();
                $screens[$file_id]["rows"][$row_id] = $row;
            }
            $screens[$file_id]["rows"][$row_id]["segments"] = array();
            $screens[$file_id]["rows"][$row_id]["segments"][$segment_id] = $output;
            return $screens;
        }

    }

?>