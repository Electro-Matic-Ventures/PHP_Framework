<?php


    require_once("DataclassParent.php");


    /**
     * @property ? string $id
     * @property ? string $file_id
     * @property ? string $address_pre_filler
     * @property ? string $group_
     * @property ? string $sign
     * @property ? string $drive
     * @property ? string $folder
     * @property ? string $file_ 
     */
    class InterfaceADPFiles extends DataclassParent {
     
        public ? string $id;
        public ? string $file_id;
        public ? string $address_pre_filler;
        public ? string $group_;
        public ? string $sign;
        public ? string $drive;
        public ? string $folder;
        public ? string $file_;

        public function __construct($data = null) {
            if (is_null($data)) {
                $this->null_constructor();
                return;
            }
            $this->data_constructor($data);
            return;
        }
    }


?>