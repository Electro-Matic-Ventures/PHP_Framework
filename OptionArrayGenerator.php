<?php


    require_once("OptionAttributes.php");


    class OptionArrayGenerator {

        public static function from_dataclass(DataclassParent $interface) {
            // $array["none"] = new OptionAttributes(null, null, null, "none", null);
            foreach($interface->get_properties() as $key=>$value) {
                $array[$key] = new OptionAttributes(null, null, null, $value, null);
            }
            return $array;
        }

        public static function from_array(array $a): array  {
            // $array["none"] = new OptionAttributes(null, null, null, "none", null);
            $array = [];
            foreach($a as $key=>$value) {
                $array[$value] = new OptionAttributes(null, null, null, $key, null);
            }
            return $array;
        }
        
    }

?>