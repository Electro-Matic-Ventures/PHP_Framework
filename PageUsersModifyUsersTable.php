<?php


    require_once("DBConnection.php");
    require_once("Utilities.php");


    class PageUsersModifyUsersTable {

        public static function go(PageUsersPostInterface $data) {
            // NO POST
            if (is_null($data->selected_username)) {
                return;
            }
            // ADD A NEW USER
            if ($data->selected_username == "new user") {
                PageUsersModifyUsersTable::add_user($data);
                return;
            }
            // DELETE A USER
            if ($data->delete) {
                PageUsersModifyUsersTable::delete_user($data);
                return;
            }
            // CHANGE PASSWORD
            PageUsersModifyUsersTable::update_password($data);
            return;
        }

        private static function add_user(PageUsersPostInterface $data) {
            if (PageUsersModifyUsersTable::add_user_invalid_post_data($data)) {
                return;
            }
            $connection = new DBConnection();
            $query = "INSERT INTO settings.users (username, password) VALUES (?, ?);";
            $statement = $connection->mysqli->prepare($query);
            $data->new_password = password_hash($data->new_password, PASSWORD_BCRYPT);
            $statement->bind_param("ss", $data->new_username, $data->new_password);
            $statement->execute();
            $statement->close();
            $connection->mysqli->close();
            return;
        }

        private static function add_user_invalid_post_data(PageUsersPostInterface $data) {
            if (is_null($data->new_username)) {
                alert("invalid username");
                return true;
            }
            if ($data->new_username == "") {
                alert("invalid username");
                return true;
            }
            if (is_null($data->new_password)) {
                alert("invalid password");
                return true;
            }
            if ($data->new_password == "") {
                alert("invalid password");
                return true;
            }
            return false;
        }

        private static function delete_user(PageUsersPostInterface $data) {
            if (PageUsersModifyUsersTable::delete_user_invalid_post_data($data)) {
                return;
            }
            $connection = new DBConnection();
            $query = "DELETE FROM settings.users WHERE username = ?;";
            $statement = $connection->mysqli->prepare($query);
            $statement->bind_param("s", $data->selected_username);
            $statement->execute();
            $statement->close();
            $connection->mysqli->close();
            return;
        }

        private static function delete_user_invalid_post_data(PageUsersPostInterface $data) {
            if (is_null($data->selected_username)) {
                alert("invalid user selected");
                return true;
            }
            if ($data->selected_username == "") {
                alert("invalid user selected");
                return true;
            }
            return false;
        }

        private static function update_password(PageUsersPostInterface $data) {
            if (PageUsersModifyUsersTable::update_password_invalid_post_data($data)) {
                return;
            }
            $connection = new DBConnection();
            $query = "UPDATE settings.users SET password = ? WHERE username = ?;";
            $statement = $connection->mysqli->prepare($query);
            $data->new_password = password_hash($data->new_password, PASSWORD_BCRYPT);
            $statement->bind_param("ss", $data->new_password, $data->selected_username);
            $statement->execute();
            $statement->close();
            $connection->mysqli->close();
            return;
        }

        private static function update_password_invalid_post_data(PageUsersPostInterface $data) {
            if (is_null($data->selected_username)) {
                alert("invalid user selected");
                return true;
            }
            if ($data->selected_username == ""){
                alert("invalid user selected");
                return true;
            }
            if (is_null($data->new_password)) {
                alert("invalid password");
                return true;
            }
            if ($data->new_password == "") {
                alert("invalid password");
                return true;
            }
            return false;
        }
    
    }


?>