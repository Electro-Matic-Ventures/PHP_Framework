<?php


    /**
     * @param ?string $name
     * @param ?string $ip
     * @param ?string $slot
     */
    class PartnerParameters {

        public ?string $name;
        public ?string $ip;
        public ?string $slot;

        public function __construct(
            ?string $name = null,
            ?string $ip = null, 
            ?string $slot = null
            ){
                $this->name = $name;
                $this->ip = $ip;
                $this->slot = $slot;
                return;
        }
        
    }


?>