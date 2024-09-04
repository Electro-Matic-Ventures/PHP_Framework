<?php
    require_once('RunQueries.php');
    class HTMLSelectConstruct{
        public function go(){
            $query = "SELECT column_name
            FROM information_schema.columns
            WHERE table_name='accepted_defaults';";
            $defaults = $this->run_query($query);
            return $this->create_form($defaults);
        }
        private function create_form($defaults){
            $html_str = "<form>";
            while($col_name = $defaults[0]->fetch_assoc()['column_name']){
                $html_str .= $this->create_label($col_name);
                $html_str .= $this->create_select($col_name);
            }
            $html_str .= "<br> <input type='submit' value='Select' /> </form>";
            return $html_str;
        }
        private function create_label($col_name){
            $return_str = "<label for='$col_name'> $col_name: </label>";
            return $return_str;
        }
        private function create_select($col_name){
            $return_str = "<select name='$col_name' id='$col_name'>";
            $return_str .= $this->create_options($col_name);
            $return_str .= "</select>";
            return $return_str;
        }
        private function create_options($col_name){
            $query = "SELECT $col_name FROM accepted_defaults;";
            $values = $this->run_query($query);
            $return_str = "";
            while ($value = $values[0]->fetch_assoc()){
                if ($return_str){
                    $return_str .= "<option value='$value[$col_name]'>$value[$col_name] </option>";
                }
                else{
                    $return_str .= "<option value='$value[$col_name]'default>$value[$col_name] </option>";
                }
            }
            return $return_str;
        }
        private function run_query($query){
            $run_q = new RunQueries();
            $arr_query = array($query);
            return $run_q->go($arr_query);
        }

    }
?>