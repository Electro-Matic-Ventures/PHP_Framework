<?

    require_once("DBInterfaceSignSystemParameters.php");
    require_once("SignParameterTableInterface.php");

    class DBInterfaceSignSystemParametersToSignParameterTableInterface {

        public static function convert(
            DBInterfaceSignSystemParameters $db
            ): SignParameterTableInterface {
                return new SignParameterTableInterface(
                    $db->ip_address,
                    SubnetMaskUtilities::get_mask($db->cidr),
                    $db->gateway
                );
        }
    }

?>