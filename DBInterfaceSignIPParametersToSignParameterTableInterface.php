<?php


    require_once("InterfaceSettingsIPSelf.php");
    require_once("SignParameterTableInterface.php");

    class InterfaceSettingsIPSelfToSignParameterTableInterface {

        public static function convert(
            InterfaceSettingsIPSelf $db
            ): SignParameterTableInterface {
                return new SignParameterTableInterface(
                    $db->ip_address,
                    SubnetMaskUtilities::get_mask($db->cidr),
                    $db->gateway
                );
            }
    
    }


?>