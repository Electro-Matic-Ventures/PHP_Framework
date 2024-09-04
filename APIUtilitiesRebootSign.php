<?php

    
    require_once("DBIOParent.php");


    class APIUtilitiesRebootSign {

        public static function go() {
            $queries = "UPDATE process.flags SET reboot='1' WHERE name='current';";
            DBIOParent::multi_query($queries);
            return;
        }

    }
    

?>