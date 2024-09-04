<?php  


    require_once("DBIOParent.php");


    class SetFlags {
        
        public static function set_reboot() {
            $query = "UPDATE process.flags SET reboot='1' WHERE name='current';";
            DBIOParent::run_query($query);
            return;
        }
    
    }        
?>