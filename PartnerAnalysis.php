<?php


    require_once("ParameterAnalysis.php");


    /**
     * @property ParameterAnalysis $ip
     * @property ParameterAnalysis $slot
     */
    class PartnerAnalysis {

        public $ip;
        public $slot;

        public function __construct(
            ?ParameterAnalysis $ip = null,
            ?ParameterAnalysis $slot = null
            ){
                $this->ip = (is_null($ip)) ? new ParameterAnalysis() : $ip; 
                $this->slot = (is_null($slot)) ? new ParameterAnalysis() : $slot;
                return;    
        }

    }


?>