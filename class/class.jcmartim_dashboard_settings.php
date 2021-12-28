<?php

if ( ! class_exists('JCMartim_Daschboard_Settings') ) {

    class JCMartim_Daschboard_Settings {

        public static $optons_section_1 = [];
        public static $optons_section_2 = [];

        public function __construct()
        {
            self::$optons_section_1 = get_option( 'option_section_1');
            self::$optons_section_2 = get_option( 'option_section_2');
        }
    }

}