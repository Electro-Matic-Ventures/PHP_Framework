<?php

    require_once('SignInterfaceSingularToQueryParent.php');

    class SignInterfaceSignParametersToQuery extends SignInterfaceSingularToQueryParent{

        public function go($sign_paramters, $instance_id)
        {
            $columns = $this->generate_columns($sign_paramters, []);
            $values = $this->generate_values($sign_paramters, [], $instance_id);
            $query = $this->generate_query("log_sign_interface.sign_interface_sign_parameters", $columns, $values);
            return $query;
        }

    }


?>