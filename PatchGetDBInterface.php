<?php

    
    require_once('DBInterface.php');
    require_once('DBInterfaceScreenFormatting.php');
    require_once('DBInterfaceDefaults.php');


    Class PatchGetDBInterface {
    
        public static function go(DBInterface $interface): DBInterface {
            $interface->screen_formatting = self::screen_formatting(
                $interface->screen_formatting,
                $interface->defaults
            );
            $rows = [];
            foreach($interface->rows as $key=>$value) {
                array_push(
                    $rows, 
                    self::row(
                        $value,
                        $interface->defaults
                    )
                );
            }
            $segments = [];
            foreach($interface->segments as $key=>$value) {
                array_push(
                    $segments, 
                    self::segment(
                        $value,
                        $interface->defaults                    
                    )
                );
            }
            $interface->rows = $rows;
            return $interface;
        }

        private static function screen_formatting(
            DBInterfaceScreenFormatting $interface,
            DBInterfaceDefaults $defaults
            ):DBInterfaceScreenFormatting {
                $interface->hold_time = self::default_value(
                    $interface->hold_time,
                    $defaults->hold_time
                );
                $interface->scroll_speed = self::default_value(
                    $interface->scroll_speed,
                    $defaults->scroll_speed
                );
                $interface->start_category = self::default_value(
                    $interface->start_category,
                    $defaults->vertical_alignment
                );
                $interface->start_option = self::default_value(
                    $interface->start_option,
                    $defaults->in_mode
                );
                return $interface;
        }

        private static function row(
            DBInterfaceRow $row,
            DBInterfaceDefaults $defaults
            ): DBInterfaceRow {
                $row->font_size = self::default_value(
                    $row->font_size,
                    $defaults->font_size
                );
                $row->font_weight = self::default_value(
                    $row->font_weight,
                    $defaults->font_weight
                );
                $row->horizontal_alignment = self::default_value(
                    $row->horizontal_alignment,
                    $defaults->horizontal_alignment
                );
                return $row;
        }
       
        private static function segment(
            DBInterfaceSegment $segment,
            DBInterfaceDefaults $defaults
            ): DBInterfaceSegment {
                $segment->background_color = self::default_value(
                    $segment->background_color,
                    $defaults->background_color
                );
                $segment->flash = self::default_value(
                    $segment->flash,
                    $defaults->flash
                );
                $segment->foreground_color = self::default_value(
                    $segment->foreground_color,
                    $defaults->foreground_color
                );
                return $segment;
        }

        private static function default_value($db, $default) {
            if (is_null($db)) {
                return $default;
            }
            return $db;
        }

    }
?>