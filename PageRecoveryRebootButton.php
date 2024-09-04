<?php

    
    require_once('ProcessQueryString.php');
    require_once('DBWriteProcessFlags.php');
    require_once('Input.php');
    require_once('InputAttributes.php');
    require_once('Utilities.php');


    class PageRecoveryRebootButton {

        static bool $rebooting = false;

        public static function handler($query_string): string {
            $button = self::reboot_button();
            if (($query_string == "") or (is_null($query_string))) {
                return $button->draw();
            }
            $processed = ProcessQueryString::split($query_string);
            if (!array_key_exists("reboot_request",  $processed)) {
                $button->draw();
                return $button->draw();
            }
            if ($processed["reboot_request"] = "REBOOT") {
                DBWriteProcessFlags::write_one("reboot", "1");
                $button->attributes->core->add_to_class("rebooting");
                $button->attributes->value = "REBOOTING...";
                return $button->draw();
            }
            return $button->draw();
        }

        private static function reboot_button(): Input {
            $button = new Input();
            $attributes = new InputAttributes();
            $attributes->name = "reboot_request";
            $attributes->core->id = "reboot_button";
            $attributes->type = "submit";
            $attributes->value = "REBOOT";
            $button->attributes = $attributes;
            return $button;
        }
    }

?>