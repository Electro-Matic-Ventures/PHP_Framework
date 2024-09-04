<?php


    /**
     * @param ?bool $modification_request
     * @param ?string $message
     */
    class ParameterDecision {

        public ?bool $modification_request;
        public ?string $message;

        public function __construct(
            ?bool $modification_request = null,
            ?string $message = null
            ){
                $this->modification_request = $modification_request;
                $this->message = $message;
                return;
            }
            
    }


?>