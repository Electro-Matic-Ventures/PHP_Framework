<?php


    require_once("DataclassParent.php");


    class PageUsersPostInterface extends DataclassParent{

        public $selected_username;
        public $new_username;
        public $new_password;
        public $delete;

        public function __construct(array $data = null) {
            if (is_null($data)) {
                PageUsersPostInterface::null_constructor();
                return;
            }
            PageUsersPostInterface::data_constructor($data);
            return;
        }
    }


?>