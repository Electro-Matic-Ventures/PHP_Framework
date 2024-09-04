<?php


    require_once("Table.php");
    require_once("TableAttributes.php");
    require_once("TableTR.php");
    require_once("TableTRAttributes.php");
    require_once("TableTD.php");
    require_once("TableTDAttributes.php");
    require_once("Input.php");
    require_once("InputAttributes.php");
    require_once("Form.php");
    require_once("FormAttributes.php");


    class PageWhitelistTable {

        public static function draw(array $current_list) {
            $header = PageWhitelistTable::header();
            $input_row = PageWhitelistTable::input_row();
            $rows = "";
            foreach ($current_list as $key => $ip_address) {
                $rows .= PageWhitelistTable::row($key, $ip_address);
            }
            $table = new Table();
            $table->attributes->core->id = "whitelist_table";
            $table->contained = $header.$input_row.$rows;
            return $table->draw();
        }

        private static function header() {
            $number = PageWhitelistTable::header_number();
            $ip_address = PageWhitelistTable::header_ip_address();
            $tr = new TableTR();
            $tr->attributes->core->id = "whitelist_table_header";
            $tr->contained = $number.$ip_address;
            return $tr->draw();
        }

        private static function header_number() {
            $td = new TableTD();
            $td->attributes->core->id = "header_number";
            $td->contained = "#";
            return $td->draw();
        }

        private static function header_ip_address() {
            $td = new TableTD();
            $td->attributes->core->id = "ip_address";
            $td->attributes->colspan = "2";
            $td->contained = "IP ADDRESS";
            return $td->draw();
        }

        private static function input_row() {
            $number = PageWhitelistTable::input_row_number();
            $ip_address = PageWhitelistTable::input_row_ip_address();
            $control = PageWhitelistTable::input_row_control();
            $tr = new TableTR();
            $tr->attributes->core->id = "row_input";
            $tr->contained = $number.$ip_address.$control;
            return $tr->draw();
        }

        private static function input_row_number() {
            $td = new TableTD();
            $td->attributes->core->id = "row_input_number";
            $td->contained = "NEW";
            return $td->draw();
        }

        private static function input_row_ip_address() {
            $input = PageWhitelistTable::input_row_ip_address_input();
            $td = new TableTD();
            $td->attributes->core->id = "row_input_ip_address";
            $td->contained = $input;         
            return $td->draw();
        }

        private static function input_row_ip_address_input() {
            $input = new Input();
            $input->attributes->core->id = "row_input_ip_address_input";
            $input->attributes->type = "text";
            return $input->draw();
        }

        private static function input_row_control() {
            $form = PageWhitelistTable::input_row_control_form();
            $td = new TableTD();
            $td->attributes->core->id = "row_input_control";
            $td->contained = $form;
            return $td->draw();
        }

        private static function input_row_control_form() {
            $mode = PageWhitelistTable::input_row_control_mode_input();
            $ip_address = PageWhitelistTable::input_row_control_ip_address_input();
            $submit = PageWhitelistTable::input_row_control_submit_input();
            $form = new Form();
            $form->attributes->method = "POST";
            $form->contained = $mode.$ip_address.$submit;
            return $form->draw();
        }

        private static function input_row_control_mode_input() {
            $input = new Input();
            $input->attributes->core->id = "row_input_control_mode_input";
            $input->attributes->name = "mode";
            $input->attributes->value = "add";
            $input->attributes->type = "hidden";
            return $input->draw();
        }

        private static function input_row_control_ip_address_input() {
            $input = new Input();
            $input->attributes->core->id = "row_input_control_ip_address_input";
            $input->attributes->name = "ip_address";
            $input->attributes->type = "hidden";
            return $input->draw();
        }

        private static function input_row_control_submit_input() {
            $input = new Input();
            $input->attributes->core->id = "row_input_control_submit_input";
            $input->attributes->type = "submit";
            $input->attributes->value = "ADD";
            return $input->draw();
        }

        private static function row(string $key, string $ip_string) {
            $number = PageWhitelistTable::row_number($key);
            $ip_address = PageWhitelistTable::row_ip_address($key, $ip_string);
            $control = PageWhitelistTable::row_control($key, $ip_string);
            $row = new TableTR();
            $row->attributes->core->id = "row_{$key}";
            $row->contained = $number.$ip_address.$control;
            return $row->draw();
        }

        private static function row_number(string $key) {
            $td = new TableTD();
            $td->attributes->core->id = "row_{$key}_number";
            $td->contained = $key;
            return $td->draw();
        }

        private static function row_ip_address(string $key, string $ip_address) {
            $td = new TableTD();
            $td->attributes->core->id = "row_{$key}_ip_address";
            $td->contained = $ip_address;
            return $td->draw();
        }

        private static function row_control(string $key, string $ip_address) {
            $form = PageWhitelistTable::row_form($key, $ip_address);
            $td = new TableTD();
            $td->attributes->core->id = "row_{$key}_control";
            $td->contained = $form;
            return $td->draw();
        }        

        private static function row_form(string $key, string $ip_string) {
            $mode = PageWhitelistTable::row_control_mode_input($key);
            $ip_address = PageWhitelistTable::row_control_ip_address_input($key, $ip_string);
            $submit = PageWhitelistTable::row_control_submit_input($key);
            $form = new Form();
            $form->attributes->core->id = "row_{$key}_form";
            $form->attributes->method = "POST";
            $form->contained = $mode.$ip_address.$submit;
            return $form->draw();
        }

        private static function row_control_mode_input(string $key) {
            $input = new Input();
            $input->attributes->core->id = "row_{$key}_control_mode_input";
            $input->attributes->name = "mode";
            $input->attributes->type = "hidden";
            $input->attributes->value = "remove";
            return $input->draw();
        }

        private static function row_control_ip_address_input(string $key, string $ip_string) {
            $input = new Input();
            $input->attributes->core->id = "row_{$key}_control_ip_address_input";
            $input->attributes->name = "ip_address";
            $input->attributes->type = "hidden";
            $input->attributes->value = $ip_string;
            return $input->draw();
        }

        private static function row_control_submit_input(string $key) {
            $input = new Input();
            $input->attributes->core->id = "row_{$key}_control_submit_input";
            $input->attributes->type = "submit";
            $input->attributes->value = "REMOVE";
            return $input->draw();
        }

    }


?>