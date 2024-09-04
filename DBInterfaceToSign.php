<?php

    require_once('DBInterfaceFileToDiv.php');

    Class DBInterfaceToSign{

        public static function go(DBInterface $Data){
            $DBInterfaceFileToTable = new DBInterfaceFileToDiv();
            return $DBInterfaceFileToTable->go($Data);
        }

    }

?>