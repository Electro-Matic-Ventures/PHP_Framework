<?php

    function array_access_proof(?array $array, string $key) {
        if (is_null($array)) {
            return null;
        }
        return (array_key_exists($key, $array)) ? $array[$key] : null;
    }

    function echo_file(string $file_name): void {
        $myfile = fopen($file_name, "r");
        while(!feof($myfile)) {
            echo fgetc($myfile);
        }    
        echo "<br><br> END OF $file_name";
        return;
    }

    function spicy_var_dump(string $label, $object, $offset_x, $offset_y):void {
        $top = "top: auto";
        if (!is_null($offset_y)) {
            $top = "top: {$offset_y}px";
        }
        $left = "left: auto";
        if (!is_null($offset_x)) {
            $left = "left: {$offset_x}px";
        }
        echo "<div class='spicy' style='{$top}; {$left};'>";
        echo "<p>$label</p><br>";
        echo "<pre>";
        var_dump($object);
        echo "</pre>";
        echo "</div>";
        echo "<br><br>";
        return;
    }
    
    function array_to_string(array $array): ?string {
        if (count($array) == 0) {
            return null;
        }
        $output = "";
        foreach ($array as $key => $value) {
            $output .= "[$key]: $value; ";
        }
        return substr($output, 0, -2);
    }

    function int_in_range_ii(int $min, int $value, int $max): bool {
        return $min <= $value and $value <= $max;
    }

    function int_in_range_ee(int $min, int $value, int $max): bool {
        return $min < $value and $value < $max;
    }

    function int_in_range_ie(int $min, int $value, int $max): bool {
        return $min <= $value and $value < $max;
    }

    function int_in_range_ei(int $min, int $value, int $max): bool {
        return $min < $value and $value <= $max;
    }

    function int_out_of_range_ii(int $min, int $value, int $max): bool {
        return $value <= $min || $max <= $value;
    }

    function int_out_of_range_ee(int $min, int $value, int $max): bool {
        return $value < $min || $max < $value;
    }

    function int_out_of_range_ie(int $min, int $value, int $max): bool {
        return $value <= $min || $max < $value;
    }

    function int_out_of_range_ei(int $min, int $value, int $max): bool {
        return $value < $min || $max <= $value;
    }

    function choose_default($value, $default) {
        if (is_null($value)) {
            return $default;
        }
        return $value;
    }

    function number_to_word(int $number): string {
        $words = [
            0 => 'zero', 
            1 => 'one', 
            2 => 'two', 
            3 => 'three', 
            4 => 'four',
            5 => 'five', 
            6 => 'six', 
            7 => 'seven', 
            8 => 'eight', 
            9 => 'nine',
            10 => 'ten', 
            11 => 'eleven', 
            12 => 'twelve', 
            13 => 'thirteen', 
            14 => 'fourteen',
            15 => 'fifteen', 
            16 => 'sixteen', 
            17 => 'seventeen', 
            18 => 'eighteen', 
            19 => 'nineteen',
            20 => 'twenty', 
            30 => 'thirty', 
            40 => 'forty', 
            50 => 'fifty',
            60 => 'sixty', 
            70 => 'seventy', 
            80 => 'eighty', 
            90 => 'ninety'
        ];
    
        if ($number < 20) {
            return $words[$number];
        } else {
            $tens = (int)($number / 10) * 10;
            $units = $number % 10;
            return $words[$tens] . ($units ? '-' . $words[$units] : '');
        }
    }

    function partial_array_key_exists(string $needle, array $haystack): bool {
        foreach($haystack as $key=>$value) {
            if (strpos($key, $needle) !== false) {
                return true;
            }
        }
        return false;
    }

    function alert($string) {
        echo "<script>alert('$string');</script>";
        return;
    }
?>