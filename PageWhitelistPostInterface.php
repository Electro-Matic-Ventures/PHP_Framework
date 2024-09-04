<?php


    require_once("DataclassParent.php");


    /**
     * @property ? string $mode;
     * @property ? string $ip_address;
     */
    class PageWhitelistPostInterface extends DataclassParent {

        public ? string $mode;
        public ? string $ip_address;

        public function __construct(array $data) {
            if (is_null($data)) {
                PageWhitelistPostInterface::null_constructor();
                return;
            }
            PageWhitelistPostInterface::data_constructor($data);
            return;
        }
        
    }


?>