<?php


    require_once("SignInterface.php");
    require_once("Utilities.php");
    require_once("Fonts.php");

    class ScrollDriver {

        private static $rate = 30;
        private static $speed_coefficients = [
            "slowest" => 1.6,
            "slow" => 1.3,
            "normal" => 1,
            "fast" => 0.7,
            "fastest" => 0.4
        ];
        
        public static function style_attributes(
            SignInterface $interface,
            int $row_index,
            int $hold_group_index
            ):array {
                $row = $interface->rows[$row_index];
                $holdgroup = $row->holdgroups[$hold_group_index];
                $scroll_speed = choose_default(
                    $interface->scroll_speed, 
                    $interface->defaults->scroll_speed
                );
                $message_width = self::calculate_message_width(
                    $row,
                    $holdgroup
                );
                $speed = self::calculate_speed(
                    $scroll_speed,
                    $message_width
                );
                $start = self::calculate_start_position(
                    $interface->sign_dimensions->width,
                    $message_width
                );
                $out = [
                    "--scroll-speed: {$speed}s;",
                    "--start: {$start}px;"
                ];
                return $out;
        }

        public static function page_reload(?SignInterface $interface): ?string {
            if (is_null($interface)) {
                return "1";
            }
            $scroll_speed = choose_default(
                $interface->scroll_speed,
                $interface->defaults->scroll_speed
            );
            $indices = self::get_index_of_widest($interface);            
            $row = $interface->rows[$indices[0]];
            $holdgroup = $row->holdgroups[$indices[1]];
            $message_width = self::calculate_message_width(
                $row,
                $holdgroup
            );
            $speed = self::calculate_speed(
                $scroll_speed,
                $message_width
            );
            return "{$speed}";
        }

        private static function get_index_of_widest(
            SignInterface $interface
            ):array {
                foreach($interface->rows as $row_index=>$row) {
                    foreach($row->holdgroups as $hg_index=>$holdgroup) {
                        if ($holdgroup->character_count == $interface->widest)
                            return [$row_index, $hg_index];
                    }
                }
                return [0, 0];
        }

        private static function calculate_message_width(
            SignInterfaceRow $row,
            SignInterfaceHoldGroup $holdgroup
            ): int {
                $character = Fonts::get(
                    $row->font_weight,
                    $row->font_size
                );
                $width = $holdgroup->character_count * ($character->width + 1);
                return $width;
        }

        private static function calculate_speed(
            string $scroll_speed,
            int $text_width
            ): int { 
                $speed = $text_width / self::$rate;
                $speed *= self::$speed_coefficients[$scroll_speed];
                return $speed;
        }

        private static function calculate_start_position(
            int $sign_width,
            int $text_width
            ): int {
                return $sign_width + 0.5 * $text_width;
            }
    }