<?php


    require_once('DataclassParent.php');


    /**
     * data class for process.flags
     * 
     * @property $id
     * @property $name
     * @property $change_date_and_time
     * @property $change_ip_partner
     * @property $change_ip_self
     * @property $reboot
     */
    Class DBInterfaceProcessFlags extends DataclassParent{

        public $id;
        public $name;
        public $change_date_and_time;
        public $change_ip_partner;
        public $change_ip_self;
        public $reboot;
        
        public function __construct($data = null){
            if(is_null($data)) {
                $this->null_constructor();
            }
            $this->data_constructor($data);
            return;
        }

    }

?>