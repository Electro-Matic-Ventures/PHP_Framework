<?php

    
    require_once("DBIOParent.php");


    class PageUsersGenerateUserSelectOptions {

        public static function go() {
            $db_data = PageUsersGenerateUserSelectOptions::get_database_data();
            $usernames = PageUsersGenerateUserSelectOptions::get_usernames($db_data);
            $options = PageUsersGenerateUserSelectOptions::make_options($usernames);
            return $options;
        }

        private static function get_database_data() {
            $query = "SELECT * FROM settings.users;";
            $result = DBIOParent::multi_query($query);
            return $result[0];
        }

        private static function get_usernames($result) {
            $usernames = array();
            foreach ($result as $key => $value) {
                $usernames[] = $value["username"];
            }
            return $usernames;
        }

        private static function make_options($usernames) {
            $options = "";
            foreach ($usernames as $key => $value) {
                if ($value == "emp") {
                    continue;
                }
                $options .= "<option value=$value>$value</option>";
            }
            return $options;
        }

    }


?>