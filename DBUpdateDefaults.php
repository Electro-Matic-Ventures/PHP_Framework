<?php
    require_once('../../../../../common/RunQueries.php');
    class DBUpdateDefaults{

        public function go($query){
            $explodedlist = explode('&', $query);
            $left = array();
            $right = array();
            foreach ($explodedlist as $explode){
                $pre_left = explode('=', $explode)[0];
                $left[] = explode('.', $pre_left)[2];
                $DBlocation = explode('.', $pre_left)[0];
                $tablelocation = explode('.', $pre_left)[1];
                $right[] = explode('=', $explode)[1];
            }
            $update_query = "UPDATE $DBlocation.$tablelocation SET ";
            for ($i = 0; $i < count($left); $i++){
                $update_query .= "$left[$i] = '$right[$i]'";
                if ($i != count($left)-1){
                    $update_query .= ", ";
                }
            }
            $update_query .= " WHERE id=1;";
            $query = array($update_query);
            $run_q = new RunQueries();
            $run_q->go($query);
            return;
        }
    }
?>