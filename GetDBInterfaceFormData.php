<?php

    require_once('DBConnection.php');
    class GetDBInterfaceFormData{

        public static function get_defaults(){
            $connection = new DBConnection();
            $query = "SELECT * FROM databaseone.defaults WHERE id = 1;";
            $result = $connection->mysqli->query($query)->fetch_assoc();
            return $result;
        }

        public function get_allowed(){
            $allowed = [];
            $table_names = $this->get_table_names();
            foreach($table_names as $table_name){
                $allowed[$table_name] = $this->get_value_options($table_name);
            }
            return $allowed;
        }

        private static function get_table_names(){
            $query = "SELECT table_name
            FROM information_schema.tables
            WHERE table_schema = 'option_values';";
            $connection = new DBConnection();
            $result = $connection->mysqli->query($query);
            $table_names = [];
            while($row = $result->fetch_assoc()){
                array_push($table_names, $row['table_name']);
            }
            return $table_names;
        }

        private static function get_value_options($table_name){
            $connection = new DBConnection();
            $query = "SELECT * FROM option_values.{$table_name}";
            $result = $connection->mysqli->query($query)->fetch_assoc();
            return $result;
        }

    }


?>