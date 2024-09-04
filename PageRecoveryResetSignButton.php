<?php

    
    require_once('ProcessQueryString.php');
    require_once('DBIOParent.php');
    require_once('Input.php');
    require_once('InputAttributes.php');
    require_once('Utilities.php');


    class PageRecoveryResetSignButton {

        public static function handler($query_string): string {
            $button = self::reset_button();
            if (($query_string == "") or (is_null($query_string))) {
                return $button->draw();
            }
            $processed = ProcessQueryString::split($query_string);
            if (!array_key_exists("reset_sign_request",  $processed)) {
                $button->draw();
                return $button->draw();
            }
            if ($processed["reset_sign_request"] = "RESET") {
                self::reset_database();
                return $button->draw();
            }
            return $button->draw();
        }

        private static function reset_button(): Input {
            $button = new Input();
            $attributes = new InputAttributes();
            $attributes->name = "reset_sign_request";
            $attributes->core->id = "reset_sign_button";
            $attributes->type = "submit";
            $attributes->value = "RESET SIGN";
            $button->attributes = $attributes;
            return $button;
        }

        private static function reset_database() {
            DBIOParent::run_query('UPDATE process.flags SET reset_sign="1";');
            return;
        }
    }

?>