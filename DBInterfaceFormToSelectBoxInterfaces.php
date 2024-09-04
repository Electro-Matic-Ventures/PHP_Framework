<?php

    require_once('DBInterfaceForm.php');
    require_once('DBInterfaceDefaults.php');
    require_once('DBInterfaceAllowed.php');
    require_once('DBInterfaceAllowedParent.php');
    require_once('OptionInterface.php');
    require_once('SelectBoxInterface.php');

    require_once('DBInterfaceAllowedParentToOptionsInterface.php');

    require_once('MakeReadable.php');

    class DBInterfaceFormToSelectBoxInterfaces{

            private $database_name;
            private $table_name;

            public function __construct($database_name, $table_name)
            {
                $this->database_name = $database_name;
                $this->table_name = $table_name;
            }


            public function go(DBInterfaceForm $interface){
                $select_boxes = [];
                $allowed_vals = get_object_vars($interface->allowed);
                foreach($allowed_vals as $allowed){
                    array_push($select_boxes, $this->get_select_box($allowed, $interface->defaults));
                }
                return $select_boxes;
            }


            private function get_select_box(DBInterfaceAllowedParent $allowed, DBInterfaceDefaults $defaults){
                $id = "$this->database_name.$this->table_name.{$allowed->label}";
                $label = MakeReadable::go($allowed->label);
                $name = "$this->database_name.$this->table_name.{$allowed->label}";
                $DBInterfaceAllowedParentToOptionsInterface = new DBInterfaceAllowedParentToOptionsInterface();
                $options = $DBInterfaceAllowedParentToOptionsInterface->go($allowed);
                $default = MakeReadable::go($defaults->data[$allowed->label]);

                return new SelectBoxInterface($id, $label, $name, $options, $default); 
            }



    }

?>