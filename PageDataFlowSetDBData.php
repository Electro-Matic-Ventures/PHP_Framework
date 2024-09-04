<?php


    require_once("DBIOParent.php");


    class PageDataFlowSetDBData {

        public static function go($data) {
            if (count($data) == 0) {
                return;
            }
            $in = array_key_exists("input_options", $data) ? $data["input_options"] : null;
            $out = array_key_exists("output_options", $data) ? $data["output_options"] :null;
            $queries = self::data_flow_input($in);
            $queries .= self::data_flow_output($out);
            DBIOParent::multi_query($queries);
            return;
        } 
        private static function data_flow_input($data) {
            $adp = ($data == "ADP") ? "1" : "0";
            $api = ($data == "API") ? "1" : "0";
            $plc = ($data == "PLC") ? "1" : "0";
            $query = "UPDATE settings.data_flow_input SET adp='{$adp}', api='{$api}', plc='{$plc}' WHERE id='1';"; 
            return $query;
        }

        private static function data_flow_output($data) {
            $adp = 0;
            $dp = 0;
            if (is_null($data)) {
                $query = "UPDATE settings.data_flow_output SET adp='{$adp}', dp='{$dp}', web='1' WHERE id='1';";
                return $query;
            }
            foreach ($data as $key => $value) {
                if ($value == "ADP") {
                    $adp = 1;
                }
                if ($value == "DP") {
                    $dp = 1;
                }
            }
            $query = "UPDATE settings.data_flow_output SET adp='{$adp}', dp='{$dp}', web='1' WHERE id='1';";
            return $query;
        }

    }

?>