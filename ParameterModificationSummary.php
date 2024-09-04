<?php


    /**
     * @param ?bool $was_modified
     * @param ?bool $error_during_modification
     * @param ?string $message
     */
    class ParameterModificationSummary {

        public ?bool $was_modified;
        public ?bool $error_during_modification;
        public ?string $message;

        public function __construct(
            ?bool $was_modified = null,
            ?bool $error_during_modification = null,
            ?string $message = null
            ){
                $this->was_modified = $was_modified;
                $this->error_during_modification = $error_during_modification;
                $this->message = $message;
                return;            
        }

        
    }

    
?>