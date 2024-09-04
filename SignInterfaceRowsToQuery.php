<?php

    require_once('SignInterfaceArrayToQueryParent.php');

    class SignInterfaceRowsToQuery extends SignInterfaceArrayToQueryParent{
        
        public function go(array $rows, $sign_interface_id)
        {
            $columns = $this->generate_columns($rows, ["holdgroups"]);
            $values = $this->generate_values(
                $rows, 
                ["holdgroups"], 
                $sign_interface_id
            );
            $query = $this->generate_query(
                "log_sign_interface.sign_interface_rows", 
                $columns, 
                $values
            );
            return $query;
        }

    }


?>