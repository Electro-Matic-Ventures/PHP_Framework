<?php


    class PageUsersDBInterface {

        public $id;
        public $username;
        public $password;

        public function __construct(array $data = null) {
            if (is_null($data)) {
                foreach($this as $key => $value) {
                    $this->{$key} = null;
                }
            }
            return;
            foreach ($this as $key => $value) {
                $this->{$key} = $data[$key];
            }
            return;
        }
    }


?>