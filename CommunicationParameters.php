<?php


    require_once("InterfaceSettingsIPSelf.php");
    require_once("DBInterfaceSignSystemParameters.php");
    require_once("PartnerParameters.php");


    /**
     * @param DBInterfaceSignParameters $sign_user
     * @param DBInterfaceSignSystemParameters $sign_system
     * @param PartnerParameters $partner
     */
    class CommunicationParameters {

        public InterfaceSettingsIPSelf $sign_user;
        public DBInterfaceSignSystemParameters $sign_system;
        public PartnerParameters $partner;

        public function __construct(
            ?InterfaceSettingsIPSelf $sign_user = null,
            ?DBInterfaceSignSystemParameters $sign_system = null,
            ?PartnerParameters $partner = null
            ){
                # USER
                if (is_null($sign_user)) {
                    $this->sign_user = new InterfaceSettingsIPSelf();
                } else {
                    $this->sign_user = $sign_user;
                }
                # SYSTEM
                if (is_null($sign_system)) {
                    $this->sign_system = new DBInterfaceSignSystemParameters();
                } else {
                    $this->sign_system = $sign_system;
                }
                # PARTNER
                if (is_null($partner)) {
                    $this->partner = new PartnerParameters();                    
                } else {
                    $this->partner = $partner;
                }
                return;
            }

    }

?>