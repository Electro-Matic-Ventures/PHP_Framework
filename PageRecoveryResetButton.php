<?php

    
    require_once('ProcessQueryString.php');
    require_once('DBIOParent.php');
    require_once('Input.php');
    require_once('InputAttributes.php');
    require_once('Utilities.php');


    class PageRecoveryResetButton {

        public static function handler($query_string): string {
            $button = self::reset_button();
            if (($query_string == "") or (is_null($query_string))) {
                return $button->draw();
            }
            $processed = ProcessQueryString::split($query_string);
            if (!array_key_exists("reset_request",  $processed)) {
                $button->draw();
                return $button->draw();
            }
            if ($processed["reset_request"] = "RESET DATA") {
                self::reset_database();
                return $button->draw();
            }
            return $button->draw();
        }

        private static function reset_button(): Input {
            $button = new Input();
            $attributes = new InputAttributes();
            $attributes->name = "reset_request";
            $attributes->core->id = "reset_button";
            $attributes->type = "submit";
            $attributes->value = "RESET DATA";
            $button->attributes = $attributes;
            return $button;
        }

        private static function reset_database() {
            DBIOParent::delete_all_rows('adp', 'current_file');
            DBIOParent::delete_all_rows('adp', 'files');
            DBIOParent::delete_all_rows('adp', 'playlist');
            DBIOParent::delete_all_rows('adp', 'row_formatting');
            DBIOParent::delete_all_rows('adp', 'screen_formatting');
            DBIOParent::delete_all_rows('adp', 'segment_formatting');
            DBIOParent::run_query('UPDATE plc.format SET value=255;');
            DBIOParent::run_query('UPDATE plc.text SET text_="";');
            return;
        }
    }

?>