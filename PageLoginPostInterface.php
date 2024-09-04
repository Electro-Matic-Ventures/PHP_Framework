<?php


    require_once("DataclassParent.php");

    /**
     * @property ? string $mode;
     * @property ? string $username;
     * @property ? string $password;
     */    
    class PageLoginPostInterface extends DataclassParent{
        
        public ? string $mode;
        public ? string $username;
        public ? string $password;

        public function __construct(array $data) {
            if (is_null($data)) {
                PageLoginPostInterface::null_constructor($data);
                return;
            }
            PageLoginPostInterface::data_constructor($data);
            return;
        }
    }


?>