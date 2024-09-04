<?php


    /**
     * @property bool $is_valid
     * @property string $message
     */
    class ParameterAnalysis {

        public $is_valid;
        public $message;

        public function __construct(
            ?bool $is_valid = null, 
            ?string $message = null
        ){
            $this->is_valid = $is_valid;
            $this->message = $message;
            return;
        }
        
    }

?>