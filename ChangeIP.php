<?php


    require_once("InterfaceSettingsIPSelf.php");


    class ChangeIP {

        public static function go(
            string $ip,
            string $cidr
        ): InterfaceSettingsIPSelf {
            $connection = new DBConnection();
            self::update($connection, $ip, $cidr);
            $result = self::readback();       
            return $result;
        }

        private static function update(
            DBConnection $connection,
            string $ip, 
            string $cidr
            ) {
                $query = "UPDATE settings.ip_self SET ip_address='{$ip}', cidr='{$cidr}' WHERE name='user';";
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






