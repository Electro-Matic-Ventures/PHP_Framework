<?php


    require_once("PartnerParameters.php");
    require_once("DBConnection.php");
    require_once("RunQueries.php");


    class PartnerGetParametersCurrent {

        private static $ip_flag = "PARTNER_ADDRESS";
        private static string $slot_flag = "PARTNER_SLOT";

        public static function go(string $file_name): PartnerParameters {
            $file = file($file_name);
            $partner = new PartnerParameters(
                self::read_ip($file),
                self::read_slot($file)
            );
            return $partner;
        }

        private static function read_ip(array $file): ?string {
            $query = "SELECT * FROM partner_parameters WHERE id=1;";
            $runner = new RunQueries();
            return "";
        }

        private static function read_slot(array $file): ?string {            
            return "";
        }

    }


?>