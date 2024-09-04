<?php


    require_once("DBIOParent.php");
    require_once("InterfaceSettingsIpSelf.php");
    require_once("SubnetMaskUtilities.php");


    class PageChangeIpParametersGetDBData {

        public static function go() {
            $queries = "SELECT * FROM settings.ip_self;";
            $result = DBIOParent::multi_query($queries);
            $result = $result[0];
            $result = DBIOParent::pack($result, new InterfaceSettingsIpSelf);
            $result[0]->cidr = SubnetMaskUtilities::get_mask($result[0]->cidr);
            $result[1]->cidr = SubnetMaskUtilities::get_mask($result[1]->cidr);
            $result[2]->cidr = SubnetMaskUtilities::get_mask($result[2]->cidr);
            $result[3]->cidr = SubnetMaskUtilities::get_mask($result[3]->cidr);
            $out["X1P1"]["STAGED"] = $result[0];
            $out["X1P1"]["SAVED"] = $result[1];
            $out["X1P2"]["STAGED"] = $result[2];
            $out["X1P2"]["SAVED"] = $result[3];
            return $out;
        }
    }

?>