<?php

    
    require_once("DBIOParent.php");


    class APIUtilitiesResetSign {

        public static function go() {
            $queries = "UPDATE process.flags SET reset_sign='1' WHERE name='current';";
            DBIOParent::multi_query($queries);
            return;
        }

    }
    

?>