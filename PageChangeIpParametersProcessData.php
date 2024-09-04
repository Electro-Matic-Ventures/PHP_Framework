<?php


    require_once("InterfaceSettingsIpSelf.php");
    require_once("SubnetMaskUtilities.php");
    require_once("PageChangeIpParametersValidateData.php");


    class PageChangeIpParametersProcessData {

        public static function go($query) {
            if ($query == ""){
                return null;
            } 
            parse_str($query, $processed);
            $processed = [
                "id" => "",
                "interface" => $processed["interface"],
                "name" => "staged",
                "mode" => $processed["mode"],
                "ip_address" => $processed["ip_address"],
                "cidr" => $processed["cidr"],
                "gateway" => $processed["gateway"],
                "port" =>  ""
            ];       
            $processed = new InterfaceSettingsIpSelf($processed);
            if(!PageChangeIpParametersValidateData::go($processed)) {
                // user feedback on invalid data built in PageChangeIpParametersValidateData
                return null;
            }
            $processed->cidr = SubnetMaskUtilities::get_cidr($processed->cidr);
            return $processed;
        }
    }

?>