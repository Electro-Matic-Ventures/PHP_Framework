<?php


    require_once("Table.php");
    require_once("TableTR.php");
    require_once("TableTD.php");
    require_once("InterfaceSettingsIPSelf.php");
    require_once("SubnetMaskUtilities.php");


    class SignParameterTable {

        public static function draw(
            InterfaceSettingsIPSelf $interface
            ):string {
                $table = new Table();
                $table->attributes->core->add_class_list(["ip_parameters"]);
                $table->contained .= self::row(
                    "IP Address", 
                    $interface->ip_address
                );
                $table->contained .= self::row(
                    "Subnet Mask", 
                    SubnetMaskUtilities::get_mask($interface->cidr)
                );
                $table->contained .= self::gateway($interface->gateway);
                return $table->draw();
        }

        private static function row(
            string $label_text, 
            ?string $contents=""
            ): string {
                $row = new TableTR();
                $label = new TableTD();
                $label->attributes->core->add_class_list(["label", "left"]);
                $label->contained = $label_text;
                $data = new TableTD();
                $data->attributes->core->add_class_list(["label", "left"]);
                $data->contained = $contents;
                $row->contained = $label->draw();
                $row->contained .= $data->draw();
                return $row->draw();
        }

        private static function gateway(?string $contents) {
            $row = new TableTR();
            $label = new TableTD();
            $label->attributes->core->add_class_list(["label", "left", "bottom"]);
            $label->contained = "Gateway";
            $data = new TableTD();
            $data->attributes->core->add_class_list(["label", "left", "bottom"]);
            $data->contained = $contents;
            $row->contained = $label->draw();
            $row->contained .= $data->draw();
            return $row->draw();
        }

    }

?>