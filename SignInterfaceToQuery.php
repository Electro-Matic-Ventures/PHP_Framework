<?php

    require_once('SignInterfaceSingularToQueryParent.php');
    require_once('SignInterfaceRowsToQuery.php');
    require_once('SignInterfaceHoldGroupsToQuery.php');
    require_once('SignInterfaceSegmentsToQuery.php');
    require_once('SignInterfaceDefaultsToQuery.php');
    require_once('SignInterfaceSignParametersToQuery.php');
    require_once('RunQueries.php');

    class SignInterfaceToQuery extends SignInterfaceSingularToQueryParent{

        public function inital() 
        {
            $queries = [];
            array_push($queries, "INSERT INTO log_sign_interface.instances () VALUES ();");
            return $queries;
        }

        public function go(SignInterface $interface) 
        {
            $queries = [];
            $instance_id = $this->get_id()["id"];
            array_push($queries, $this->get_base($interface, $instance_id));
            array_push($queries, $this->get_rows($interface, $instance_id));
            array_push($queries, $this->get_holdgroups($interface, $instance_id));
            array_push($queries, $this->get_segments($interface, $instance_id));
            array_push($queries, $this->get_defaults($interface, $instance_id));
            array_push($queries, $this->get_sign_parameters($interface, $instance_id));

            return $queries;
        }

        private static function get_id(){
            $connection = new DBConnection();
            $query = "SELECT id FROM log_sign_interface.instances ORDER BY id DESC LIMIT 1";
            $result = $connection->mysqli->query($query)->fetch_assoc();
            return $result;
        }

        private function get_base(SignInterface $interface, $instance_id)
        {
            $columns = $this->generate_columns($interface, ["rows", "defaults", "sign_parameters"]);
            $values = $this->generate_values($interface, ["rows", "defaults", "sign_parameters"], $instance_id);
            return $this->generate_query("log_sign_interface.sign_interface", $columns, $values);
        }

        private function get_rows(SignInterface $interface, $instance_id)
        {
            $SignInterfaceRowsToQuery = new SignInterfaceRowsToQuery();
            return $SignInterfaceRowsToQuery->go($interface->rows, $instance_id);
        }

        private function get_holdgroups(SignInterface $interface, $instance_id)
        {
            // $holdgroups = [];
            // foreach($interface->rows as $row)
            // {
            //     $holdgroups = array_merge($holdgroups, $row->holdgroups);
            // }
            $holdgroups = $this->holdgroups_in_interface($interface);
            $SignInterfaceHoldgroupsToQuery = new SignInterfaceHoldgroupsToQuery();
            return $SignInterfaceHoldgroupsToQuery->go($holdgroups, $instance_id);
        }

        private function get_segments(SignInterface $interface, $instance_id)
        {
            // $holdgroups = [];
            // foreach($interface->rows as $row)
            // {
            //     $holdgroups = array_merge($holdgroups, $row->holdgroups);
            // }
            $holdgroups = $this->holdgroups_in_interface($interface);
            $segments = [];
            foreach($holdgroups as $holdgroup)
            {
                $segments = array_merge($segments, $holdgroup->segments);
            }
            //var_dump($segments);
            $SignInterfaceSegmentsToQuery = new SignInterfaceSegmentsToQuery();
            return $SignInterfaceSegmentsToQuery->go($segments, $instance_id);
        }

        private function holdgroups_in_interface(SignInterface $interface)
        {
            $holdgroups = [];
            foreach($interface->rows as $row)
            {
                $holdgroups = array_merge($holdgroups, $row->holdgroups);
            }
            return $holdgroups;
        }
        
        private function get_defaults(SignInterface $interface, $instance_id)
        {
            $SignInterfaceDefaultsToQuery = new SignInterfaceDefaultsToQuery();
            return $SignInterfaceDefaultsToQuery->go($interface->defaults, $instance_id);
        }

        private function get_sign_parameters(SignInterface $interface, $instance_id)
        {
            $SignInterfaceSignParametersToQuery = new SignInterfaceSignParametersToQuery();
            return $SignInterfaceSignParametersToQuery->go($interface->sign_parameters,$instance_id);

        }

    }
?>