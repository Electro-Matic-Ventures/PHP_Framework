<?php


    class DBGetDataLogSignInterface{

        public static function go() 
        {
            $data = DBGetDataLogSignInterface::get();
            return $data;
        }

        private static function get(){
            $connection = new DBConnection("log_sign_interface");
            $query = "SELECT *
            FROM log_sign_interface.instances
            JOIN log_sign_interface.sign_interface ON id=instance_id
            JOIN log_sign_interface.sign_interface_rows ON log_sign_interface.sign_interface.instance_id=log_sign_interface.sign_interface_rows.instance_id
             AND log_sign_interface.sign_interface.file_id=log_sign_interface.sign_interface_rows.file_id
            JOIN log_sign_interface.sign_interface_holdgroups ON log_sign_interface.sign_interface_rows.instance_id=log_sign_interface.sign_interface_holdgroups.instance_id
             AND log_sign_interface.sign_interface_rows.row_id=log_sign_interface.sign_interface_holdgroups.row_id
            JOIN log_sign_interface.sign_interface_segments ON log_sign_interface.sign_interface_holdgroups.instance_id=log_sign_interface.sign_interface_segments.instance_id
             AND log_sign_interface.sign_interface_holdgroups.holdgroup_id=log_sign_interface.sign_interface_segments.holdgroup_id;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;
        }

        public static function get_defaults(){
            $connection = new DBConnection("log_sign_interface");
            $query = "SELECT * FROM log_sign_interface.sign_interface_defaults;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;

        }

        public static function get_sign_parameters(){
            $connection = new DBConnection("log_sign_interface");
            $query = "SELECT * FROM log_sign_interface.sign_interface_sign_parameters;";
            $result = $connection->mysqli->query($query);
            $logs = [];
            while($row = $result->fetch_assoc()){
                array_push($logs, $row);
            }
            return $logs;

        }

    }


?>