<?php


    require_once("ParameterModificationSummary.php");


    /**
     * @param ?ParameterModificationSummary $ip
     * @param ?ParameterModificationSummary $router
     */
    class SignSummary {

        public ?ParameterModificationSummary $ip;
        public ?ParameterModificationSummary $router;

        public function __construct(
            ?ParameterModificationSummary $ip = null, 
            ?ParameterModificationSummary $router = null
            ){
                $this->ip = is_null($ip) ? new ParameterModificationSummary() : $ip;
                $this->router = is_null($router) ? new ParameterModificationSummary() :$router;
                return;
        }

    }
    

?>