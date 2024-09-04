<?php


   class SignInterfaceSingularToQueryParent{
    
        public function generate_columns($interface, $excluded) {
            $_columns = array_keys(get_object_vars($interface));
            $text = '';            
            $text .= 'instance_id' . ', ';
            foreach($_columns as $column) {
                if(!in_array($column, $excluded)){
                    $text .= $column . ', ';
                }
            }
            return substr($text, 0, -2);
        }
        
        public function generate_values($interface, $excluded, $instance_id) {
            $values = '';
            $interface_array = get_object_vars($interface);
            foreach($excluded as $exclude){
                unset($interface_array[$exclude]);
            }
            $interface_values = array_values($interface_array);
            // foreach($interface_values as $value){
            //     $values .= $value;
            // }
            $added_quotes = array_map(function($value) {
                return "'" . $value . "'";
            }, $interface_values);
            $values .= "('" . strval($instance_id) . "', ";
            $values .= implode(', ', $added_quotes) . ")";
            return $values;
        }
        
        public function generate_query($table, $_columns, $values) {
            return "INSERT INTO $table ($_columns) VALUES $values;";
        }

    }


?>