<?php

    
    require_once("DBIOParent.php");
    require_once("InterfaceSettingsIpPartnerInput.php");
    require_once("InterfaceSettingsIpPartnerOutput.php");


    class PageIpPartnersGetDBData {
        
        public static function go() {
            $queries = self::make_queries();
            $result = DBIOParent::multi_query($queries);
            $packed = self::pack($result);
            return $packed;
        }

        private static function make_queries() {
            $queries = "SELECT * FROM settings.ip_partner_input;";
            $queries .= "SELECT * FROM settings.ip_partner_output;";
            return $queries;
        }

        private static function pack($result) {
            $packed["INPUT"] = self::pack_input_partner($result[0]);
            $packed["OUTPUT"] =  self::pack_output_partner($result[1]);
            return $packed;
        }

        private static function pack_input_partner($data) {
            $packed = array();
            foreach($data as $key => $value) {
                $i = new InterfaceSettingsIpPartnerInput($value);
                $key = strtoupper($i->name);
                $packed[$key] = $i;
            }
            return $packed;
        }
        
        private static function pack_output_partner($data) {
            $packed = array();
            foreach($data as $key => $value) {
                $i = new InterfaceSettingsIpPartnerOutput($value);
                $key = strtoupper($i->name);
                $packed[$key] = $i;
            }
            return $packed;
        }

    }

?>