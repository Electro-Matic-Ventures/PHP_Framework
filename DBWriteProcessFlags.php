<?php 


    require_once('DBInterfaceProcessFlags.php');
    require_once('DBConnection.php');

    
    /**
     * @method void write_all(DBInterfaceProcessFlags $interface)
     * @method void write_one(string $column, string $value)
     */
    class DBWriteProcessFlags{

        public static function write_all(
            DBInterfaceProcessFlags $interface
            ): void
            {
                return ;
        }

        public static function write_one(string $column, string $value): void
        { 
            $connection = new DBConnection();
            $query = "UPDATE process.flags SET $column = '$value' WHERE name = 'current';";
            $connection->mysqli->query($query);
            return;
        }

    }
?>

