<?php


    require_once("ADPConstants.php");
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
    require_once("Input.php");
    require_once("InputAttributes.php");
    require_once("OptionArrayGenerator.php");
    require_once("SelectBoxInterface.php");
    require_once("SelectBoxGenerator.php");


    class PageDefaultsTableMaker {

        public static function go(InterfaceADPDefaults $interface): string {
            $parent = new ContentDivision();
            $attributes = new ContentDivisionAttributes();
            $parent->add_to_style("margin-left: 50px;");
            $parent->add_to_style("padding-top: 50px;");
            $parent->attributes = $attributes;
            $form = new Form();
            $attributes = new FormAttributes();
            $form->attributes = $attributes;
            $table = new Table();
            $attributes = new TableAttributes();
            $table->attributes = $attributes;
            $table->contained = self::rows($interface);
            $form->contained = $table->draw();
            $parent->contained = $form->draw();
            return $parent->draw();            
        }

        private static function rows(InterfaceADPDefaults $interface): string {
            $rows = "";
            $attributes = new TableTRAttributes();
            foreach($interface->get_properties() as $key=>$value) {
                if ($key == "id" or $key == "text") {
                    continue;
                }
                $row = new TableTR();
                $row->attributes = $attributes;
                $row->contained = self::columns($key, $value);
                $rows .= $row->draw();
            }
            $rows .= self::last_row();
            return $rows;
        }

        private static function last_row(): string {
            $row = new TableTR();
            $attributes = new TableTRAttributes();
            $row->attributes = $attributes;
            $cell = new TableTD();
            $attributes = new TableTDAttributes();
            $attributes->colspan = "2";
            $cell->attributes = $attributes;
            $submit = new Input();
            $attributes = new InputAttributes();
            $attributes->value = "SUBMIT";
            $attributes->type = "submit";
            $submit->attributes = $attributes;
            $cell->contained = $submit->draw();
            $row->contained = $cell->draw();
            return $row->draw();
        }

        private static function columns(string $key, string $value): string {
            $column = "";
            $attributes = new TableTDAttributes();
            $left = new TableTD();
            $left->attributes = $attributes;
            $left->contained = $key;
            $column .= $left->draw();
            $right = new TableTD();
            $right->attributes = $attributes;
            $right->contained = self::select_box($key, $value);
            $column .= $right->draw();
            return $column;
        }

        private static function select_box(string $key, string $value): string {
            $options = self::generate_option_array($key);
            $interface = new SelectBoxInterface(
                "select_{$key}",
                null,
                $key,
                $options,
                $value
            );
            $select = new SelectBoxGenerator();
            return $select->draw($interface);
        }

        private static function generate_option_array(string $key): array {
            switch ($key) {
                case "background_color":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsColors());
                case "drive":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsDrives());
                case "flash":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsFlashes());
                case "font_size":
                    return self::font_size_array();
                case "font_weight":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsFontWeights());
                case "foreground_color":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsColors());
                case "hold_time":
                    return self::hold_time_array();
                case "horizontal_alignment":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsHorizontalAlignments());
                case "in_mode":
                    return self::modes_array();
                case "line_spacing":
                    return self::line_spacing_array();
                case "out_mode":
                    return self::modes_array();
                case "scroll_speed":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsScrollSpeeds());
                case "vertical_alignment":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsVerticalAlignments());
                case "wrap":
                    return OptionArrayGenerator::from_dataclass(new ADPConstantsWraps());
            }
        }

        private static function font_size_array(): array {
            $interface = new ADPConstantsFontSizes();
            foreach($interface->get_values() as $key=>$value) {
                $array[$value] = new OptionAttributes(
                    null,
                    null,
                    null,
                    $value,
                    null
                );
            }
            return $array;
        }

        private static function hold_time_array(): array {
            $interface = new ADPConstantsHoldTimes();
            $min = $interface->min;
            $max = $interface->max;
            for ($i=$min; $i<=$max; $i++) {
                $array[$i] = new OptionAttributes(
                    null,
                    null,
                    null,
                    $i,
                    null
                );
            }
            return $array;
        }

        private static function line_spacing_array(): array {
            $interface = new ADPConstantsLineSpacings();
            $min = $interface->min;
            $max = $interface->max;
            for ($i=$min; $i<=$max; $i++) {
                $array[$i] = new OptionAttributes(
                    null,
                    null,
                    null,
                    $i,
                    null
                );
            }
            return $array;
        }

        private static function modes_array(): array {
            $interface = new ADPConstantsModes();
            foreach($interface->get_values() as $key=>$value) {
                $array[$key] = new OptionAttributes(
                    null,
                    null,
                    null,
                    $key,
                    null
                );
            }
            return $array;
        }
    }