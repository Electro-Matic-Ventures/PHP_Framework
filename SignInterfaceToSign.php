<?php

    require_once('SignInterfaceToDiv.php');

    Class SignInterfaceToSign{

        public static function go(?SignInterface $Data) {
            if (is_null($Data)) {
                return "";
            }
            $SignInterfaceToDiv = new SignInterfaceToDiv();
            return $SignInterfaceToDiv->go($Data);
        }

    }

?>