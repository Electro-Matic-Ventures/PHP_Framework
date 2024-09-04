<?php

    
    require_once("IPV4Utilities.php");
    require_once("SubnetMaskUtilities.php");
    require_once("ParameterAnalysis.php");
    require_once("PartnerAnalysis.php");
    require_once("Utilities.php");


    class PartnerAnalyze {

        public static function go(
            CommunicationParameters $parameters
            ): PartnerAnalysis {
                $ip = self::ip_analysis($parameters->partner->ip);
                $slot = self::slot_analysis($parameters->partner->slot);
                $analysis = new PartnerAnalysis(
                    $ip,
                    $slot
                );
                return $analysis;
        }

        private static function ip_analysis(?string $ip): ParameterAnalysis {
            $analysis = new ParameterAnalysis(
                false,
                "No IP Address Provided."
            );
            if (self::parameter_is_blank($ip)) {
                return $analysis;
            }
            $analysis = new ParameterAnalysis();
            $analysis->is_valid = IPV4Utilites::is_valid($ip);
            $message = "Provided IP Address: [$ip] was invalid.";
            $analysis->message = ($analysis->is_valid) ? null : $message;
            return $analysis;
        }

        private static function slot_analysis(
            ?string $slot
            ): ParameterAnalysis {
                $analysis = new ParameterAnalysis(
                    false,
                    "No Slot Number provided."
                );
                if (self::parameter_is_blank($slot)) {
                    return $analysis;
                }
                $analysis = new ParameterAnalysis();
                if (!is_numeric($slot)) {
                    $analysis->is_valid = false;
                    $analysis->message = 
                        "Provided Slot Number must be a numeric value.";
                    return $analysis;
                }
                if (string_is_float($slot)) {
                    $analysis->is_valid = false;
                    $analysis->message = 
                        "Slot Number must be an integer value.";
                    return $analysis;
                }
                if (int_out_of_range_ee(0, $slot, 10)) {
                    $analysis->is_valid = false;
                    $analysis->message =
                        "Slot Number outside of valid range.";
                    return $analysis;
                }
                $analysis->is_valid = true;
                $analysis->message = null;
                return $analysis;
        }

        private static function parameter_is_blank(?string $parameter): bool {
            if (is_null($parameter)) {
                return true;
            }
            if (strlen($parameter) == 0) {
                return true;
            }
            return false;
        }



    }


?>