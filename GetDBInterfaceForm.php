<?php

    require_once('GetDBInterfaceFormData.php');
    require_once('DBInterfaceForm.php');
    require_once('DBInterfaceDefaults.php');
    require_once('DBInterfaceAllowed.php');
    require_once('DBInterfaceAllowedBackgroundColor.php');
    require_once('DBInterfaceAllowedForegroundColor.php');
    require_once('DBInterfaceAllowedFlash.php');
    require_once('DBInterfaceAllowedFontSize.php');
    require_once('DBInterfaceAllowedFontWeight.php');
    require_once('DBInterfaceAllowedHorizontalAlignment.php');
    require_once('DBInterfaceAllowedMode.php');
    require_once('DBInterfaceAllowedScrollSpeed.php');
    require_once('DBInterfaceAllowedText.php');
    require_once('DBInterfaceAllowedVerticalAlignment.php');

    class GetDBInterfaceForm{

        public function go(){
            $GetDBInterfaceFormData = new GetDBInterfaceFormData();
            $DBInterfaceDefaults = new DBInterfaceDefaults($GetDBInterfaceFormData->get_defaults());
            $default_keys = array_keys($DBInterfaceDefaults->data);
            $DBInterfaceAllowed = $this->set_allowed($GetDBInterfaceFormData->get_allowed(), $default_keys);
            return new DBInterfaceForm($DBInterfaceDefaults, $DBInterfaceAllowed);
        }

        private function set_allowed(array $data, $default_keys){
            $DBInterfaceAllowedBackgroundColor = new DBInterfaceAllowedBackgroundColor($data, $default_keys[6]);
            $DBInterfaceAllowedForegroundColor = new DBInterfaceAllowedForegroundColor($data, $default_keys[5]);
            $DBInterfaceAllowedFlash = new DBInterfaceAllowedFlash($data, $default_keys[7]);
            $DBInterfaceAllowedFontSize = new DBInterfaceAllowedFontSize($data, $default_keys[10]);
            $DBInterfaceAllowedFontWeight = new DBInterfaceAllowedFontWeight($data, $default_keys[9]);
            $DBInterfaceAllowedHorizontalAlignment = new DBInterfaceAllowedHorizontalAlignment($data, $default_keys[11]);
            $DBInterfaceAllowedMode = new DBInterfaceAllowedMode($data, $default_keys[3]);
            $DBInterfaceAllowedScrollSpeed = new DBInterfaceAllowedScrollSpeed($data, $default_keys[4]);
            //$DBInterfaceAllowedText = new DBInterfaceAllowedText($data["text"]);
            $DBInterfaceAllowedVerticalAlignment = new DBInterfaceAllowedVerticalAlignment($data, $default_keys[1]);

            return new DBInterfaceAllowed($DBInterfaceAllowedBackgroundColor,
            $DBInterfaceAllowedForegroundColor,
            $DBInterfaceAllowedFlash,
            $DBInterfaceAllowedFontSize,
            $DBInterfaceAllowedFontWeight,
            $DBInterfaceAllowedHorizontalAlignment,
            $DBInterfaceAllowedMode,
            $DBInterfaceAllowedScrollSpeed,
            $DBInterfaceAllowedVerticalAlignment);

        }
    }


?>