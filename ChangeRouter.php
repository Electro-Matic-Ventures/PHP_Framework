<?php


require_once("InterfaceSettingsIPSelf.php");


    class ChangeRouter {

        public static function go(string $gateway): InterfaceSettingsIPSelf {
            $connection = new DBConnection();
            self::update($connection, $gateway);
            $result = self::readback();       
            return $result;
        }

        private static function update(
            DBConnection $connection, 
            string $gateway
            ) {
                $query = "UPDATE settings.ip_self SET gateway='{$gateway}' WHERE name='user';";
                $connection->mysqli->query($query);
                return;
            }

        private static function readback (): InterfaceSettingsIPSelf {
            $data = new InterfaceSettingsIPSelf();
            $data = DBIOParent::read_one_row(
                "settings",
                "ip_self",
                "name",
                "user",
                $data
            );
            return $data;
        }

    }


?>






