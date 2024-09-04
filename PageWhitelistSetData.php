<?php


    require_once("DBConnection.php");
    require_once("PageWhitelistPostInterface.php");
    require_once("IPV4Utilities.php");
    require_once("Utilities.php");


    class PageWhitelistSetData {

        public static function go(PageWhitelistPostInterface $data) {
            if ($data->mode == "add") {
                if (IPV4Utilites::ip_is_valid($data->ip_address)) {
                    PageWhitelistSetData::add($data->ip_address);
                    PageWhitelistSetData::set_process_flag();
                    return;
                }
                alert("\"{$data->ip_address}\" is not a valid ip address");
                return;
            }
            if ($data->mode == "remove") {
                PageWhitelistSetData::remove($data->ip_address);
                PageWhitelistSetData::set_process_flag();
                return;
            }
            return;
        }

        private static function add(string $ip_address) {
            $connection = new DBConnection();
            $query = "INSERT INTO settings.whitelist (ip_address) VALUES (?);";
            $statement = $connection->mysqli->prepare($query);
            $statement->bind_param("s", $ip_address);
            $statement->execute();
            $statement->close();
            $connection->mysqli->close();
            return;
        }

        private static function set_process_flag() {
            $connection = new DBConnection();
            $query = "UPDATE process.flags SET add_to_whitelist = '1' WHERE name = 'current';";
            $connection->mysqli->query($query);
            $connection->mysqli->close();
            return;
        }

        private static function remove(string $ip_address) {
            $connection = new DBConnection();
            $query = "DELETE FROM settings.whitelist WHERE ip_address = ?;";
            $statement = $connection->mysqli->prepare($query);
            $statement->bind_param("s", $ip_address);
            $statement->execute();
            $statement->close();
            $connection->mysqli->close();
            return;
        }

    }


?>