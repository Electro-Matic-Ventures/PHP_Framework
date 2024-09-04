<?php


    class AutoLoader
    {
        static function load($prefix)
        {
            spl_autoload_register(
                function ($class) use ($prefix)
                {
                    $target_file = $prefix.str_replace('\\', '/', $class).".php";
                    require_once($target_file);
                    return;
                }
            );
        }
        
    }


?>