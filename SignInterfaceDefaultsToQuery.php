<?php

    require_once('SignInterfaceSingularToQueryParent.php');

    class SignInterfaceDefaultsToQuery extends SignInterfaceSingularToQueryParent{

        public function go($defaults, $instance_id)
        {
            $columns = $this->generate_columns($defaults, []);
            $values = $this->generate_values($defaults, [], $instance_id);
            $query = $this->generate_query("log_sign_interface.sign_interface_defaults", $columns, $values);
            return $query;
        }

    }


?>