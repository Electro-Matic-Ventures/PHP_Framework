<?php


    require_once('DBInterface.php');
    require_once('DBGetDataFile.php');
    require_once('DBGetDataScreenFormatting.php');
    require_once('DBGetDataRows.php');
    require_once('DBGetDataSegments.php');
    require_once('DBGetDataDefaults.php');
    require_once('DBGetDataSignDimensions.php');
    require_once('DBIOSettingsIPSelf.php');
    require_once('DBGetDataCurrentFile.php');
    require_once('PatchGetDBInterface.php');


    Class DBGetDataInterface{

        public static function go(){
            $defaults = DBGetDataDefaults::go();
            $sign_dimensions = DBGetDataSignDimensions::go();
            $sign_ip_parameters = DBIOSettingsIPSelf::go();
            $current_file = DBGetDataCurrentFile::go();
            if (is_null($current_file->file_id)) {
                return null;
            }
            $file_interface = DBGetDataFile::go($current_file->file_id);
            $screen_formatting = DBGetDataScreenFormatting::go($current_file->file_id);
            $row_interfaces = DBGetDataRows::go($current_file->file_id);
            $segment_interfaces = DBGetDataSegments::go($current_file->file_id);
            $interface = new DBInterface(
                $defaults,
                $sign_dimensions,
                $sign_ip_parameters, 
                $file_interface,
                $screen_formatting,
                $row_interfaces,
                $segment_interfaces
            );
            $interface = PatchGetDBInterface::go($interface);
            return $interface;
        }

    }

?>