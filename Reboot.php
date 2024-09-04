<?php


    require_once("DBConnection.php");
    require_once("SignParameterTable.php");
    require_once("ContentDivision.php");
    require_once("Paragraph.php");


    class Reboot {

        public static function go(?array $query) {           
            if (is_null($query)) {
                return "";
            }
            $flag = array_access_proof($query, "reboot_flag");
            if ($flag != "1") {
                return "";
            }
            $connection = new DBConnection();
            $query = "UPDATE process.flags SET reboot=1 WHERE id=1;";
            $connection->mysqli->query($query);
            return;
        }
        

    }


?>