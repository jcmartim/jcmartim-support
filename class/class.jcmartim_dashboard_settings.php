<?php

if ( ! class_exists('JCMartim_Daschboard_Settings') ) {

    class JCMartim_Daschboard_Settings {

        public static $optons_section_1 = [];
        public static $optons_section_2 = [];

        public function __construct()
        {
            self::$optons_section_1 = get_option( 'option_section_1');
            self::$optons_section_2 = get_option( 'option_section_2');
            add_action( 'admin_init', [ $this, 'jcmartim_support_admin_init' ] );
        }
        /**
         * Método que cria as seções e campos na página de adminstração.
         */
        public function jcmartim_support_admin_init()
        {
            //Salvar os dados contidos nas variáveis options_settings, no banco de dados.
            register_setting(
                $option_group = 'option_section_group_1', 
                $option_name = 'option_section_1', 
                $args = [$this, 'jcmartim_support_option_section_1_sanitize']
            );
            register_setting(
                $option_group = 'option_section_group_2', 
                $option_name = 'option_section_2', 
                $args = [$this, 'jcmartim_support_option_section_2_sanitize']
            );

            /**
             * Seções
             */
            //Primeira seção
            add_settings_section(
                $id = 'jcmartim_support_admin_section_contacts',
                $title = esc_html__( 'Support Contacts', 'jcmartim-support'),
                $callback = [$this, 'jcmartim_support_admin_section_contacts_explanation'],
                $page = 'jcmartim_support_admin_page_contacts'
            );
            //Segunda seção
            add_settings_section(
                $id = 'jcmartim_support_admin_section_tutorials',
                $title = esc_html__( 'Tutorials', 'jcmartim-support'),
                $callback = [$this, 'jcmartim_support_admin_section_tutorials_explanation'],
                $page = 'jcmartim_support_admin_page_tutorials'
            );

            /**
             * Campos
             */
            //Texto de apresentação
            add_settings_field( 
                $id = 'jcmartim_support_text',
                $title = esc_html__( 'Presentation text', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_text_callbak'],
                $page = 'jcmartim_support_admin_page_contacts',
                $section = 'jcmartim_support_admin_section_contacts',
                $args = [
                    'label_for' => 'jcmartim_support_text',
                ]
             );
             //Horários de Expediente
             add_settings_field( 
                $id = 'jcmartim_support_time_1',
                $title = esc_html__( 'Early morning.', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_time_1_callbak'],
                $page = 'jcmartim_support_admin_page_contacts',
                $section = 'jcmartim_support_admin_section_contacts',
                $args = [
                    'label_for' => 'jcmartim_support_time_1',
                ]
             );
        }

        /**
         * Textos Explicativos da seções.
         */
        //Texto explicativo da primeira seção
        public function jcmartim_support_admin_section_contacts_explanation()
        {
            ?>
               <p style="max-width: 600px;">
                    <?php esc_html_e('In this section, enter a presentation text, opening hours and contact details.') ?>
                </p>
            <?php
        }
        //Texto explicativo da segunda seção
        public function jcmartim_support_admin_section_tutorials_explanation()
        {
            ?>
               <p style="max-width: 600px;">
                    <?php esc_html_e('In this section, enter the url of each YouTube video tutorial. E.g.: https://youtu.be/eo2gDhsd4') ?>
                </p>
            <?php
        }

        /**
         * Conteúdo dos Campos da primeira seção
         */
        //Campo texto de apresentação
        public function jcmartim_support_text_callbak()
        {
            ?>
            <textarea 
                name="option_section_1[jcmartim_support_text]" 
                id="jcmartim_support_text" 
                cols="60" 
                rows="5"
                <?php echo  empty(self::$optons_section_1['jcmartim_support_text']) ? 
                    'style="border-color:red"' : 'style="border-color:green"'; ?>
            ><?php echo isset(self::$optons_section_1['jcmartim_support_text']) ? 
                esc_html__(self::$optons_section_1['jcmartim_support_text'], 'jcmartim-support') : '' ?></textarea>
                <p><?php esc_html_e("Enter introductory text for your customers.", "jcmartim-support") ?></p>
            <?php
        }
        //Campo horário inical do expediente
        public function jcmartim_support_time_1_callbak()
        {
            ?>
            <input 
                type="time"
                name=""
                id=""
            />
            <?php
        }

    }

}