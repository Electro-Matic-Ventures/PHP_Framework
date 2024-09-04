<?php

    
    require_once("DBIOParent.php");


    class PageDataFlowGetDBData {
        
        public static function go() {
            $queries = self::make_queries();
            $result = self::run_queries($queries);
            $packed = self::pack($result);
            return $packed;
        }

        private static function make_queries() {
            $queries = self::get_data_flow_input_data();
            $queries .= self::get_data_flow_output_data();
            return $queries;
        }

        private static function get_data_flow_input_data() {
            $query = "SELECT * FROM settings.data_flow_input WHERE id='1';";
            return $query;
        }

        private static function get_data_flow_output_data() {
            $query = "SELECT * FROM settings.data_flow_output WHERE id='1';";
            return $query;
        }

        private static function run_queries($queries) {
            $result = DBIOParent::multi_query($queries);
            return $result;
        }

        private static function pack($result) {
            $packed["INPUT"] = self::pack_in($result[0][0]);
            $packed["OUTPUT"] =  self::pack_out($result[1][0]);
            return $packed;
        }

        private static function pack_in($data) {
            $packed["ADP"] = self::process($data["adp"]);
            $packed["API"] = self::process($data["api"]);
            $packed["PLC"] = self::process($data["plc"]);
            return $packed;
        }
        
        private static function pack_out($data) {
            $packed["ADP"] = self::process($data["adp"]);
            $packed["DP"] = self::process($data["dp"]);
            $packed["WEB"] = self::process($data["web"]);
            return $packed;
        }

        private static function process($data) {
            return ($data == "1") ? "checked" : "";
        }

    }

?>