<?php

    
    class SubnetMaskUtilities {

        private static $mask_to_cidr = [
            "255.255.255.255" => "32",
            "255.255.255.254" => "31",
            "255.255.255.252" => "30",
            "255.255.255.248" => "29",
            "255.255.255.240" => "28",
            "255.255.255.224" => "27",
            "255.255.255.192" => "26",
            "255.255.255.128" => "25",
            "255.255.255.0" => "24",
            "255.255.254.0" => "23",
            "255.255.252.0" => "22",
            "255.255.248.0" => "21",
            "255.255.240.0" => "20",
            "255.255.224.0" => "19",
            "255.255.192.0" => "18",
            "255.255.128.0" => "17",
            "255.255.0.0" => "16",
            "255.254.0.0" => "15",
            "255.252.0.0" => "14",
            "255.248.0.0" => "13",
            "255.240.0.0" => "12",
            "255.224.0.0" => "11",
            "255.192.0.0" => "10",
            "255.128.0.0" => "9",
            "255.0.0.0" => "8",
            "254.0.0.0" => "7",
            "252.0.0.0" => "6",
            "248.0.0.0" => "5",
            "240.0.0.0" => "4",
            "224.0.0.0" => "3",
            "192.0.0.0" => "2",
            "128.0.0.0" => "1",
            "0.0.0.0" => "0"
        ];        
        
        private static $cidr_to_mask = [
            "32" => "255.255.255.255",
            "31" => "255.255.255.254",
            "30" => "255.255.255.252",
            "29" => "255.255.255.248",
            "28" => "255.255.255.240",
            "27" => "255.255.255.224",
            "26" => "255.255.255.192",
            "25" => "255.255.255.128",
            "24" => "255.255.255.0",
            "23" => "255.255.254.0",
            "22" => "255.255.252.0",
            "21" => "255.255.248.0",
            "20" => "255.255.240.0",
            "19" => "255.255.224.0",
            "18" => "255.255.192.0",
            "17" => "255.255.128.0",
            "16" => "255.255.0.0",
            "15" => "255.254.0.0",
            "14" => "255.252.0.0",
            "13" => "255.248.0.0",
            "12" => "255.240.0.0",
            "11" => "255.224.0.0",
            "10" => "255.192.0.0",
            "9" => "255.128.0.0",
            "8" => "255.0.0.0",
            "7" => "254.0.0.0",
            "6" => "252.0.0.0",
            "5" => "248.0.0.0",
            "4" => "240.0.0.0",
            "3" => "224.0.0.0",
            "2" => "192.0.0.0",
            "1" => "128.0.0.0",
            "0" => "0.0.0.0"
        ];

        public static function get_cidr(?string $mask): ?string {
            $mask = self::clean_mask($mask);
            if (is_null($mask)) {
                return null;
            }
            if (!filter_var($mask, FILTER_VALIDATE_IP)) {
                return null;
            }
            if (!array_key_exists($mask, self::$mask_to_cidr)) {
                return null;
            }
            return self::$mask_to_cidr[$mask];
        }

        public static function clean_mask(?string $mask): ?string {
            if (is_null($mask)) {
                return null;
            }
            $exploded = explode(".", $mask);
            foreach($exploded as $key => $value) {
                if (!is_numeric($value)) {
                    return null;
                }
                $exploded[$key] = strval(intval($value));
            }
            $as_string = implode(".", $exploded);
            return $as_string;	
        }

        public static function get_mask(?string $cidr): ?string {               
            if (is_null($cidr)) {
                return null;
            }  
            if (!array_key_exists($cidr, self::$cidr_to_mask)) {
                return null;
            }
            return self::$cidr_to_mask[$cidr];
        }

        public static function cidr_is_valid(string $cidr): bool {
            return array_key_exists($cidr, self::$cidr_to_mask);
        }

        public static function mask_is_valid(string $mask): bool {
            return array_key_exists($mask, self::$mask_to_cidr);
        }

    } 


?>