<?php


    class CheckLogin {

        public static function go() {
            if (isset($_SESSION["USER_NAME"])){
                return;
            }
            header("Location: /user_interface/");
            exit();
        }
    }

    
?>