<?php


    require_once("DBIOParent.php");
    require_once("InterfaceSettingsIpSelf.php");


    class PageChangeIpParametersSetDBData {

        public static function go(?InterfaceSettingsIpSelf $data) {
            if(is_null($data)) {
                return;
            }
            $interface = $data->interface == "" ? "NULL" : "'{$data->interface}'";
            $name = $data->name == "" ? "NULL" : "'{$data->name}'";
            $mode = $data->mode == "" ? "NULL" : "'{$data->mode}'";
            $ip_address = $data->ip_address == "" ? "NULL" : "'{$data->ip_address}'";
            $cidr = $data->cidr == "" ? "NULL" : "'{$data->cidr}'";
            $gateway = $data->gateway == "" ? "NULL" : "'{$data->gateway}'";
            $port = $data->port == "" ? "NULL" : "'{$data->port}'";
            $queries = "UPDATE settings.ip_self SET mode={$mode}, ip_address={$ip_address}, cidr={$cidr}, gateway={$gateway}, port={$port} WHERE interface={$interface} AND name={$name};";
            $queries .= "UPDATE process.flags SET change_ip_self='1';";
            DBIOParent::multi_query($queries);
            return;
        }

    }


?>