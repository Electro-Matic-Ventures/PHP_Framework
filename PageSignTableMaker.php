<?php


    require_once("ContentDivision.php");
    require_once("Form.php");
    require_once("Table.php");
    require_once("TableTR.php");
    require_once("TableTD.php");
    require_once("Input.php");


    class PageFeaturesTableMaker {

        private static $adp_server = 0;
        private static $adp_client = 0;

        public static function draw($data): string {
            self::$adp_server = $data->adp_server;
            self::$adp_client = $data->adp_client;
            $parent = new ContentDivision();
            $parent->attributes->core->add_to_style("margin-left: 50px;");
            $parent->attributes->core->add_to_style("padding-top: 50px;");
            $form = new Form();
            $table = new Table();
            $table->contained = self::rows();
            $form->contained = $table->draw();
            $parent->contained = $form->draw();
            return $parent->draw();
        }
    
        private static function rows(): string {
            $rows .= self::adp_server();
            $rows .= self::adp_client();
            $rows .= self::submit_row();
            return $rows;
        }

        private static function adp_server(): string {
            $row = new TableTR();
            $label = self::adp_server_label();
            $control = self::adp_server_control();
            $row->contained = $label;
            $row->contained .= $control;
            return $row->draw();
        }

        private static function adp_server_label(): string {
            $cell = new TableTD();
            $cell->contained = "ADP Server";
            return $cell->draw();
        }

        private static function adp_server_control(): string {
            $cell = new TableTD();
            $control = new Input();     
            $control->attributes->type = "checkbox";
            $control->attributes->name = "adp_server";
            $control->attributes->value = "true";
            if (self::$adp_server == "1") {
                $control->attributes->checked = self::$adp_server;
            }
            $cell->contained = $control->draw();
            return $cell->draw();
        }

        private static function adp_client(): string {
            $row = new TableTR();
            $row->contained = self::adp_client_label();
            $row->contained .= self::adp_client_control();
            return $row->draw();
        }

        private static function adp_client_label(): string {
            $cell = new TableTD();
            $cell->contained = "ADP Client";
            return $cell->draw();
        }

        private static function adp_client_control(): string {
            $cell = new TableTD();
            $control = new Input();
            $control->attributes->type = "checkbox";
            $control->attributes->name = "adp_client";
            if (self::$adp_client == "1") {
                $control->attributes->checked = true;
            }
            $cell->contained = $control->draw();
            return $cell->draw();
        }

        private static function submit_row(): string {
            $row = new TableTR();
            $row->contained = self::submit_cell();
            return $row->draw();
        }

        private static function submit_cell(): string {
            $cell = new TableTD();
            $cell->attributes->colspan = "2";
            $control = new Input();
            $control->attributes->type = "submit";
            $cell->contained = $control->draw();
            return $cell->draw();
        }

    }


?>