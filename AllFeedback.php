<?php


    class AllFeedback {

        public static function go(
            ?string $sign_feedback
            ): void {
                echo self::feedback($sign_feedback);
                return;
        }

        private static function feedback(
            ?string $sign_feedback
            ): string {
                if (is_null($sign_feedback)) {
                    return "";
                }
                $output = '
                    <div style="width: 1350px; height: 50px; background: #E2E2E7; display: flex; align-items: center; justify-content: center; border-radius: 5px; margin-bottom: 20px;">
                        <p style="font-size: 32px; font-weight: bold; display: block;"> 
                            Modification Results 
                        </p>
                    </div>
                ';
                $output .= '';
                if (!is_null($sign_feedback)) {
                    $output .= $sign_feedback;
                }
                return $output;
        }
    }

?>