<?php


    require_once("DataclassParent.php");


    /**
     * @property string $id
     * @property string $file_id
     */
    class InterfaceADPPlaylist extends DataclassParent {
     
        public ? string $id;
        public ? string $file_id;

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