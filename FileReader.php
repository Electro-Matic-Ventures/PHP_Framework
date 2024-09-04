<?php

    
    require_once("Utilities.php");


    class FileReader {

        public static function find_in_file_line(
            string $file_name,
            string $needle,
            int $offset
            ): int {
            $file_ = fopen($file_name, "r") 
                or die("Unable to open file!");
            $line_number = 0;
            while(!feof($file_)){
                $line = fgets($file_);
                $pos = strpos($line, $needle);
                if (gettype($pos) == "integer" and $line_number > $offset) {
                    return $line_number;
                } 
                $line_number += 1;
            }
            return -1;
        }

        public static function read_line(
            string $file_name,
            int $line_number
            ): string {
            return file($file_name)[$line_number];
        }

    }

?>