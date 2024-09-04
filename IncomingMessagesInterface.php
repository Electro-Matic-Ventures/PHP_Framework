<?php


    class IncomingMessagesInterface {

        public array $data;

        public function __construct(array $data){
            $this->data = $data;
            return;
        }

    }


?>