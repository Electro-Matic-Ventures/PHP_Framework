<?php

    require_once('DBInterface.php');
    require_once('SignInterface.php');
    require_once('SignInterfaceRow.php');
    require_once('SignInterfaceHoldGroup.php');
    require_once('SignInterfaceDefaults.php');
    require_once('DBInterfaceRowToHoldGroups.php');

    Class DBInterfaceToSignInterface{

        public static function go(?DBInterface $data): ?SignInterface{
            if (is_null($data)) {
                return null;
            }
            $defaults = new SignInterfaceDefaults($data);
            $rows = self::concat_rows($data);
            $SignInterface = new SignInterface(
                $data,
                $rows, 
                $defaults
            );
            return $SignInterface;
        }

        private static function concat_rows($data){
            $rows = [];
            for($i = 0; $i < count($data->rows); $i++){                
                $converter = new DBInterfaceRowToHoldGroups();
                $holdgroups = $converter->go($data, $i);
                $row = new SignInterfaceRow($data, $i, $holdgroups);
                array_push($rows, $row);
            }
            return $rows;
        }

    }

?>