<?php


    require_once("PageLoginPostInterface.php");
    require_once("DBConnection.php");
    require_once("Utilities.php");


    class UserLogin {

        public static function go(PageLoginPostInterface $data) {
            if (UserLogin::has_access($data)) {
                return $data->username;
            }
            return null;
        }

        private static function has_access(PageLoginPostInterface $data) {
            $db_password = UserLogin::get_db_data($data);
            if (is_null($db_password)) {
                return false;
            }
            if (password_verify($data->password, $db_password)) {
                return true;
            }
            return false;
        }

        private static function get_db_data(PageLoginPostInterface $data) {
            $connection = new DBConnection();
            $query = "SELECT id, username, password FROM settings.users WHERE username = ?;";
            $statement = $connection->mysqli->prepare($query);
            $statement->bind_param("s", $data->username);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($id, $username, $password);
            $statement->fetch();
            $connection->mysqli->close();
            return $password;
        }

    }


?>