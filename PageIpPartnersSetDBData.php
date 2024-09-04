<?php

    
    require_once("DBIOParent.php");


    class PageIpPartnersSetDBData {

        public static function go($data) {
            if (count($data) == 0) {
                return;
            }
            switch($data["area"]) {
                case "in":
                    PageIpPartnersSetDBData::in($data);
                    break;
                case "out":
                    PageIpPartnersSetDBData::out($data);
                    break;
            }
            return;
        }

        private static function in($data) {
            $type = DBIOParent::condition_value($data["type"]);
            $ip = DBIOParent::condition_value($data["ip"]);
            $rack = DBIOParent::condition_value($data["rack"]);
            $slot = DBIOParent::condition_value($data["slot"]);
            $port = "NULL";
            $db_number = DBIOParent::condition_value($data["db_number"]);
            $query = "UPDATE settings.ip_partner_input SET type={$type}, ip_address={$ip}, rack={$rack}, slot={$slot}, port={$port}, db_number={$db_number} WHERE name='staged';";
            $query .= "UPDATE process.flags SET change_ip_partner='1' WHERE name='current';";
            DBIOParent::multi_query($query);
            return;
        }

        private static function out($data) {
            $type = DBIOParent::condition_value($data["type"]);
            $ip = DBIOParent::condition_value($data["ip"]);
            $port = DBIOParent::condition_value($data["port"]);
            $query = "UPDATE settings.ip_partner_output SET type={$type}, ip_address={$ip}, port={$port} WHERE name='saved';";
            DBIOParent::multi_query($query);
            return;
        }

    }


?>