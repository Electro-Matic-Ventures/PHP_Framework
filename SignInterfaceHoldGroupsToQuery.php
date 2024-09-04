<?php

    require_once('SignInterfaceArrayToQueryParent.php');

    class SignInterfaceHoldGroupsToQuery extends SignInterfaceArrayToQueryParent{
        
        public function go(array $holdgroups, $sign_interface_id)
        {
            $columns = $this->generate_columns($holdgroups, ["segments"]);
            $values = $this->generate_values($holdgroups, ["segments"], $sign_interface_id);
            $query = $this->generate_query("log_sign_interface.sign_interface_holdgroups", $columns, $values);
            return $query;
        }

    }


?>