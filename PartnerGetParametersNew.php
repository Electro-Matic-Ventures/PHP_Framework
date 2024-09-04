<?php


    require_once("Utilities.php");

    
    class PartnerGetParametersNew {

        public static string $name_ip = "partner_ip";
        public static string $name_slot = "partner_slot";

        public static function go(
            ProcessedQueryString $query
            ): PartnerParameters {
                $parameters = new PartnerParameters();
                if (is_null($query->data)) {
                    return $parameters;
                }
                $parameters->ip = self::get_ip($query->data);
                $parameters->slot = self::get_slot($query->data);
                return $parameters;
        }

        private static function get_ip(array $data): ?string {
            return array_access_proof($data, self::$name_ip);
        }

        private static function get_slot(array $data): ?string {
            return array_access_proof($data, self::$name_slot);
        }

    }


?>