<?php

    class MakeReadable{

        public static function go($str){
            if(is_numeric($str)){
                return $str;
            }
            $readable =  str_replace('_', ' ', $str);
            return ucwords($readable);
        }

    }

?>