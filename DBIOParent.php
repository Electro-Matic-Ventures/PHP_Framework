<?php 

    require_once("DBConnection.php");
    require_once("DataclassParent.php");

    /**
     * 
     */
    class DBIOParent {

        /**
         * NULL shouldn't be wrapped in single quotes, all other values should
         * @return str NULL | '{$value}'
         */
        public static function condition_value($value) {
            return $value == "" ? "NULL" : "'{$value}'";
        }

        public static function multi_query(string $query) {
            $connection = new DBConnection();
            if (!$connection->mysqli->multi_query($query)) {
                echo "Error executing queries: " . $connection->mysqli->error;
                return null;
            }
            $result_sets = [];
            $result = $connection->mysqli->store_result();
            while ($result) {
                $result_data = [];
                while ($row = $result->fetch_assoc()) {
                    $result_data[] = $row;
                }
                $result_sets[] = $result_data;
                $result->free();
                if ($connection->mysqli->more_results()) {
                    $connection->mysqli->next_result();
                    $result = $connection->mysqli->store_result();
                } else {
                    break;
                }
            }
            $connection->mysqli->close();
            return $result_sets;
        }

        public static function pack(array $results, DataclassParent $i) {
            $output = array();
            $reflection = new ReflectionClass(get_class($i));
            foreach ($results as $key => $value) {
                $new = $reflection->newInstance();
                $new->data_constructor($value);
                foreach ($value as $parameter_name => $parameter_value) {
                    $new->$parameter_name = $parameter_value;
                }
                $output[] = $new;
            }
            return $output;
        }        

        /**
         * updates one row, selected by $tc and $tv, with values from $a. column names to be updated should be given as array keys in $a. column values to be updated should be given as array values in $a.
         * @param string $s schema
         * @param string $t table
         * @param array $a array of new values, keys should be column names
         * @param string $tc target column name
         * @param string $tv targed value
         */
        public static function update_select_columns(
            string $s,
            string $t,
            array $a,
            string $tc,
            string $tv
            ): void {
                $data = "";
                foreach($a as $key=>$value) {
                    if ($value == "NULL") {
                        $data .= "{$key}={$value}, ";
                    }else {
                        $data .= "{$key}='{$value}', ";
                    }
                }
                $data = substr($data, 0, -2);
                $query = "UPDATE {$s}.{$t} SET {$data} WHERE {$tc}='{$tv}';";
                $connection = new DBConnection();
                $connection->mysqli->query($query);
                $connection->mysqli->close();
                return;
        }

        /**
         *  runs the query:
         *  "UPDATE {$s}.{$t} SET {$dc}='{$dv}' WHERE {$tc}='{$tv}';";
         * @param string $s schema
         * @param string $t table
         * @param string $dc data column (where the data is going)
         * @param string $dv data value (the data to be placed)
         * @param string $tv target column (the column name for addressing)
         * @param string $tv target value (the value for addressing)
         */
        public static function update_one_column(
            string $s,
            string $t,
            string $dc, 
            string $dv,
            string $tc,
            string $tv
            ): void { 
                $connection = new DBConnection();
                $query = "UPDATE {$s}.{$t} SET {$dc}='{$dv}' WHERE {$tc}='{$tv}';";
                $connection->mysqli->query($query);
                $connection->mysqli->close();
                return;
        }

        public static function read_all_rows(
            string $s,
            string $t,
            DataclassParent $i
            ): array {
                $results = [];
                $reflection = new ReflectionClass(get_class($i));
                $connection = new DBConnection();
                $query = "SELECT * FROM {$s}.{$t};";
                $result = $connection->mysqli->query($query);
                $connection->mysqli->close();
                while($row = $result->fetch_assoc()) {
                    $new = $reflection->newInstance();
                    $new->data_constructor($row);
                    foreach($row as $key=>$value) {
                        $new->$key = $value;
                    }
                    array_push($results, $new);
                };
                return $results;
        }

        public static function read_all_rows_exclude_value(
            string $s,
            string $t,
            string $tc,
            string $tv,
            DataclassParent $i
            ): array {                
                $results = [];
                $reflection = new ReflectionClass(get_class($i));
                $connection = new DBConnection();
                $query = "SELECT * FROM {$s}.{$t} WHERE {$tc}!='{$tv}';";
                $result = $connection->mysqli->query($query);
                $connection->mysqli->close();
                while($row = $result->fetch_assoc()) {
                    $new = $reflection->newInstance();
                    $new->data_constructor($row);
                    // foreach($row as $key=>$value) {
                    //     $new->$key = $value;
                    // }
                    array_push($results, $new);
                };
                return $results;
        }

        public static function read_one_row(
            string $schema,
            string $table,
            string $target_column,
            string $target_value,
            DataclassParent $interface
            ): DataclassParent {
                $connection = new DBConnection();
                $query = "SELECT * FROM {$schema}.{$table} WHERE {$target_column}='{$target_value}';";
                $result = $connection->mysqli->query($query)->fetch_assoc();
                $connection->mysqli->close();
                $interface->data_constructor($result);
                return $interface;
        }

        public static function insert_single_row(
            string $s,
            string $t,
            DataclassParent $i
            ): void {
                $c = self::properties_to_query_columns($i);
                $v = self::values_to_query_values($i);
                $query = "INSERT INTO {$s}.{$t} ({$c}) VALUES ($v);";
                $connection = new DBConnection();
                $result = $connection->mysqli->query($query);
                $connection->mysqli->close();
                return;
        }
            
        private static function properties_to_query_columns(DataclassParent $i): string {
            $r = "";
            foreach($i->get_properties() as $key=>$value) {
                if ($key == "id") {
                    continue;
                }
                if (is_null($value)) {
                    continue;
                }
                $r .= "{$key}, ";
            }
            $r = substr($r, 0, -2);
            return $r;
        }

        private static function values_to_query_values(DataclassParent $i): string {
            $r = "";
            foreach($i->get_properties() as $key=>$value) {
                if ($key == "id") {
                    continue;
                }
                if (is_null($value)) {
                    continue;
                }
                $r .= "'{$value}', ";
            }
            $r = substr($r, 0, -2);
            return $r;
        }

        public static function delete_where_column_in(
            string $s,
            string $t,
            string $tc,
            array $tv
            ) {
                if (count($tv) == 1) {
                    $query = "DELETE FROM {$s}.{$t} WHERE ({$tc} = '{$tv[0]}');";
                } else {
                    $v = "";
                    foreach($tv as $key=>$value) {
                        $v .= "'{$value}', ";
                    }
                    $v = substr($v, 0, -2);
                    $query = "DELETE FROM {$s}.{$t} WHERE {$tc} IN ($v);";
                }
                $connection = new DBConnection();
                $result = $connection->mysqli->query($query);
                $connection->mysqli->close();
                return;
        }

        public static function delete_all_rows(string $s, string $t) {
            $query = "DELETE FROM {$s}.{$t};";
            $result = self::run_query($query);
            return $result;
        } 

        public static function run_query(string $query) {
            $connection = new DBConnection();
            $result = $connection->mysqli->query($query);
            $connection->mysqli->close();
            return $result;
        }




    }
?>