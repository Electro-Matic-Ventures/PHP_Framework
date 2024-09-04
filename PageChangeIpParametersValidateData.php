<?php


    require_once("InterfaceSettingsIpSelf.php");
    require_once("IPV4Utilities.php");
    require_once("SubnetMaskUtilities.php");


    class PageChangeIpParametersValidateData {

        public static function go(InterfaceSettingsIpSelf $data) {
            $ip_result = self::validate_ip($data);
            $subnet_mask_result = self::validate_subnet($data);
            $gateway_result = self::validate_gateway($data);
            $port_result = self::validate_port($data);
            return $ip_result and $subnet_mask_result and $gateway_result and $port_result;
        }

        private static function validate_ip(InterfaceSettingsIpSelf $data) {
            if ($data->mode == "DHCP") {
                if (is_null($data->ip_address) or $data->ip_address == "" ) {
                    return true;
                }
            }            
            if (IPV4Utilites::ip_is_valid($data->ip_address)) {
                return true;
            }
            self::notify_invalid($data->interface, "ip address", $data->ip_address);
            return false;
        }

        private static function validate_subnet(InterfaceSettingsIpSelf $data) {
            if ($data->mode == "DHCP") {
                if (is_null($data->cidr) or $data->cidr == "" ) {
                    return true;
                }
            }        
            if (SubnetMaskUtilities::mask_is_valid($data->cidr)) {
                return true;
            }
            self::notify_invalid($data->interface, "subnet mask", $data->cidr);
            return false;    
        }

        private static function validate_gateway(InterfaceSettingsIpSelf $data) {
            if ($data->mode == "DHCP") {
                if (is_null($data->gateway) or $data->gateway == "" ) {
                    return true;
                }
            }            
            if (IPV4Utilites::gateway_is_valid($data->gateway)) {
                return true;
            }
            self::notify_invalid($data->interface, "gateway address", $data->gateway);
            return false;
        }

        private static function validate_port(InterfaceSettingsIpSelf $data) {
            if ($data->mode == "DHCP") {
                if (is_null($data->port) or $data->port == "" ) {
                    return true;
                }
            }
            if(IPV4Utilites::port_is_valid($data->port)) {
                return true;
            }
            self::notify_invalid($data->interface, "port", $data->port);
            return false;
        }

        private static function notify_invalid($interface, $name, $value) {
            echo "<p style='padding-left:30px; background-color:#FF0000;'>";
            echo "<table style='border-collapse:collapse;'>";
            echo "<tr style='color:#FFFFFF; font-weight:bold;'><td colspan=2>INVALID SUBMISSION</td></tr>";
            echo "<tr style='color:#FFFFFF; font-weight:bold;'><td>interface</td><td style='padding-left:20px;'>{$interface}</td></tr>";
            echo "<tr style='color:#FFFFFF; font-weight:bold;'><td>property</td><td style='padding-left:20px;'>{$name}</td></tr>";
            echo "<tr style='color:#FFFFFF; font-weight:bold;'><td>value</td><td style='padding-left:20px;'>{$value}</td></tr>";
            echo "</table>";
            echo "</p>";
            echo "<br>";
            return;
        }

    }


?>