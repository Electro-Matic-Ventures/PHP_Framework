<?php


    require_once("SubnetMaskUtilities.php");


    class IPV4Utilites {
        
        public static function ip_is_valid(string $ip): bool {
            return filter_var($ip, FILTER_VALIDATE_IP);
        }

        public static function subnet_is_valid(string $subnet): bool {
            return SubnetMaskUtilities::mask_is_valid($subnet);
        }

        public static function gateway_is_valid(string $gateway): bool {
            if ($gateway == "") {
                return true;
            }
            return IPV4Utilites::ip_is_valid($gateway);
        }

        public static function port_is_valid(string $port): bool {
            if ($port == "") {
                return true;
            }
            if (!is_numeric($port)) {
                return false;
            }
            if (!filter_var($port, FILTER_VALIDATE_INT)) {
                return false;
            }
            $port = (int)$port;
            return 0 <= $port && $port <= 65535;
        }

    }


?>