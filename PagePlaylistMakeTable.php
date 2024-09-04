<?php


    require_once("ContentDivision.php");
    require_once("ContentDivisionAttributes.php");
    require_once("Form.php");
    require_once("FormAttributes.php");
    require_once("Table.php");
    require_once("TableAttributes.php");
    require_once("TableTR.php");
    require_once("TableTRAttributes.php");
    require_once("TableTD.php");
    require_once("TableTDAttributes.php");
    require_once("SelectBoxGenerator.php");
    require_once("SelectBoxInterface.php");
    require_once("SelectAttributes.php");
    require_once("Option.php");
    require_once("OptionInterface.php");
    require_once("OptionAttributes.php");
    require_once("OptionArrayGenerator.php");
    require_once("Input.php");
    require_once("InputAttributes.php");
    
    
    require_once("Utilities.php");


    class PagePlaylistMakeTable {

        public static function draw(array $not_in_playlist, array $in_playlist): string {
            $parent = new ContentDivision();
            $parent->add_to_style("margin-left: 50px;");
            $parent->add_to_style("padding-top: 50px;");
            $form = new Form();
            $table = new Table();
            $table->contained = self::rows($not_in_playlist, $in_playlist);
            $form->contained = $table->draw();
            $parent->contained = $form->draw();
            $drawn = $parent->draw();
            return $drawn;
        }

        private static function rows(array $not_in_playlist, array $in_playlist): string {
            $rows = self::column_names();
            $index = 0;
            foreach($in_playlist as $file_id=>$text){
                $rows .= self::in_playlist_row($index, $text, $file_id);
                $index ++;
            }
            $rows .= self::add_to_playlist_row($not_in_playlist);
            $rows .= self::submit_button_row();
            return $rows;
        }

        private static function column_names(): string {
            $row = new TableTR();
            $number = new TableTD();
            $number->add_to_style("width: 50px;");
            $number->contained = "#";
            $text = new TableTD();
            $text->add_to_style("width: 600px;");
            $text->contained = "TEXT";
            $delete = new TableTD();
            $delete->add_to_style("width: 50px;");
            $delete->contained = "DELETE";
            $row->contained = $number->draw();
            $row->contained .= $text->draw();
            $row->contained .= $delete->draw();
            $drawn = $row->draw();
            return $drawn;
        }

        private static function in_playlist_row(int $index, string $text, string $file_id): string {
            $row = new TableTR();
            $line_number_cell = new TableTD();
            $line_number_cell->add_to_style("width: 50px;");
            $line_number_cell->contained = $index+1;
            $text_cell = new TableTD();
            $text_cell->add_to_style("width: 600px;");
            $text_cell->contained = $text;
            $row->contained = $line_number_cell->draw();
            $row->contained .= $text_cell->draw();
            $row->contained .= self::radio_cell($index, $file_id);
            $drawn = $row->draw();
            return $drawn;
        }

        private static function radio_cell(int $index, string $file_id): string {
            $cell = new TableTD();
            $cell->add_to_style("width: 50px;");
            $radio = "<input type=\"radio\" name=\"delete_{$index}\" value=\"$file_id\">";
            $cell->contained = $radio;
            $drawn = $cell->draw();
            return $drawn;
        }

        private static function add_to_playlist_row(array $not_in_playlist): string {
            $row = new TableTR();
            $plus_cell = new TableTD();
            $plus_cell->contained = "+";
            $row->contained = $plus_cell->draw();
            $row->contained .= self::select_cell($not_in_playlist);
            $drawn = $row->draw();
            return $drawn;
        }

        private static function select_cell(array $not_in_playlist): string {
            $cell = new TableTD();
            $cell->add_to_style("width: 650px;");
            $cell->attributes->colspan = "2";
            $not_in_playlist["NONE"] = "NONE";
            $options = OptionArrayGenerator::from_array($not_in_playlist);
            $interface = new SelectBoxInterface(
                "file_selector",
                null,
                "file_id",
                $options,
                "NONE"
            );
            $select = new SelectBoxGenerator();
            $cell->contained = $select->draw($interface);
            $drawn = $cell->draw();
            return $drawn;
        }

        private static function submit_button_row(): string {
            $row = new TableTR();
            $cell = new TableTD();
            $cell->add_to_style("width: 700px;");
            $cell->attributes->colspan = "3";
            $button = new Input();
            $button->attributes->type = "submit";
            $button->attributes->value = "SUBMIT";
            $cell->contained = $button->draw();
            $row->contained = $cell->draw();
            $drawn = $row->draw();
            return $drawn;
        }

    }

?>