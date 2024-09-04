<?php

    require_once('SignInterfaceArrayToQueryParent.php');

    class SignInterfaceSegmentsToQuery extends SignInterfaceArrayToQueryParent{
        
        public function go(array $segments, $sign_interface_id)
        {
            $columns = $this->generate_columns($segments, []);
            $values = $this->generate_values($segments, [], $sign_interface_id);
            $query = $this->generate_query("log_sign_interface.sign_interface_segments", $columns, $values);
            return $query;
        }

    }


?>