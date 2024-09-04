<?php

    require_once('DBInterfaceAllowed.php');
    require_once('DBInterfaceAllowedBackgroundColor.php');
    require_once('DBInterfaceAllowedFlash.php');
    require_once('DBInterfaceAllowedFontSize.php');
    require_once('DBInterfaceAllowedFontWeight.php');
    require_once('DBInterfaceAllowedForegroundColor.php');
    require_once('DBInterfaceAllowedHorizontalAlignment.php');
    require_once('DBInterfaceAllowedMode.php');
    require_once('DBInterfaceAllowedScrollSpeed.php');
    require_once('DBInterfaceAllowedText.php');
    require_once('DBInterfaceAllowedVerticalAlignment.php');

    require_once('DBInterfaceAllowedParent.php');
    require_once('OptionInterface.php');

    require_once('MakeReadable.php');


    class DBInterfaceAllowedParentToOptionsInterface{

        public function go(DBInterfaceAllowedParent $DBInterfaceAllowedParent){
            $data = get_object_vars($DBInterfaceAllowedParent)["data"];
            $option_data = [];

            foreach($data as $option){
                $option_data[MakeReadable::go($option)] = $option;
            }

            return new OptionInterface($option_data);
        }
        
    }


?>