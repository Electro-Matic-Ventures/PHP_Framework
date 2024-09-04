<?php


    require_once("InterfaceSettingsDimensions.php");
    require_once("ContentDivision.php");
    require_once("Form.php");
    require_once("Table.php");
    require_once("TableTR.php");
    require_once("TableTD.php");
    require_once("Paragraph.php");
    require_once("Input.php");


    class PageSignMakeTable {

        public static function draw(InterfaceSettingsDimensions $dimensions): string {
                $parent = new ContentDivision();
                $parent->add_to_style("margin-left: 50px;");
                $parent->add_to_style("padding-top: 50px;");
                $form = new Form();
                $table = new Table();
                $table->contained = self::rows($dimensions);
                $form->contained = $table->draw();
                $parent->contained = $form->draw();
                $drawn = $parent->draw();
                return $drawn;
        }

        private static function rows(InterfaceSettingsDimensions $dimensions):string {
                $drawn = self::horizontal($dimensions->width);
                $drawn .= self::vertical($dimensions->height);
                $drawn .= self::submit_button();
                // $drawn .= self::reboot();
                return $drawn;
        }

        private static function horizontal(string $width): string {
            $row = new TableTR();
            $label_host = new TableTD();
            $label = new Paragraph();
            $label->text = "HORIZONTAL<br>PIXEL COUNT";
            $input_host = new TableTD();
            $input = new Input();
            $input->attributes->name = "width";
            $input->attributes->type = "number";
            $input->attributes->value = $width;
            $label_host->contained = $label->draw();
            $input_host->contained = $input->draw();
            $row->contained = $label_host->draw();
            $row->contained .= $input_host->draw();
            $drawn = $row->draw();
            return $drawn;
        }

        private static function vertical(string $height): string {
            $row = new TableTR();
            $label_host = new TableTD();
            $label = new Paragraph();
            $label->text = "VERTICAL<br>PIXEL COUNT";
            $input_host = new TableTD();
            $input = new Input();
            $input->attributes->name = "height";
            $input->attributes->type = "number";
            $input->attributes->value = $height;
            $label_host->contained = $label->draw();
            $input_host->contained = $input->draw();
            $row->contained = $label_host->draw();
            $row->contained .= $input_host->draw();
            $drawn = $row->draw();
            return $drawn;
        }

        private static function submit_button(): string {
            $row = new TableTR();
            $button_host = new TableTD();
            $button_host->attributes->colspan = "2";
            $button = new Input();
            $button->attributes->value = "SUBMIT";
            $button->attributes->type = "submit";
            $button_host->contained = $button->draw();
            $row->contained .= $button_host->draw();
            $drawn = $row->draw();
            return $drawn;
        }

    }
?>