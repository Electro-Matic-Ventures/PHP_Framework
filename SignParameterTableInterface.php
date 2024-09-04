<?php


    class SignParameterTableInterface {

        public ?string $ip_address;
        public ?string $subnet_mask;
        public ?string $gateway;

        public function __construct(
            ?string $ip_address = null,
            ?string $subnet_mask = null,
            ?string $gateway = null           
            ){
                $this->ip_address = $ip_address;
                $this->subnet_mask = $subnet_mask;
                $this->gateway = $gateway;
                return;
            }
    }