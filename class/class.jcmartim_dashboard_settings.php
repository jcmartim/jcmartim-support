<?php

if ( ! class_exists('JCMartim_Daschboard_Settings') ) {

    class JCMartim_Daschboard_Settings {

        public static $optons_section_1 = [];
        public static $optons_section_2 = [];
        public static $optons_section_3 = [];
        public static $optons_section_4 = [];

        public function __construct()
        {
            self::$optons_section_1 = get_option( 'option_section_1');
            self::$optons_section_2 = get_option( 'option_section_2');
            self::$optons_section_3 = get_option( 'option_section_3');
            self::$optons_section_4 = get_option( 'option_section_4');
            add_action( 'admin_init', [ $this, 'jcmartim_support_admin_init' ] );
        }
        /**
         * Método que cria as seções e campos na página de adminstração.
         */
        public function jcmartim_support_admin_init()
        {
            //Salvar os dados contidos nas variáveis options_settings, no banco de dados.
            register_setting( //Apresentação
                $option_group = 'option_section_group_1', 
                $option_name = 'option_section_1', 
                $args = [$this, 'jcmartim_support_option_section_1_sanitize']
            );
            register_setting( //Expediente
                $option_group = 'option_section_group_2', 
                $option_name = 'option_section_2', 
                $args = [$this, 'jcmartim_support_option_section_2_sanitize']
            );
            register_setting( //Contatos
                $option_group = 'option_section_group_3', 
                $option_name = 'option_section_3', 
                $args = [$this, 'jcmartim_support_option_section_3_sanitize']
            );
            register_setting( // Tutoriais
                $option_group = 'option_section_group_4', 
                $option_name = 'option_section_4', 
                $args = null
            );

            /**
             * Seções.
             */
            //Primeira seção APRESENTAÇÃO.
            add_settings_section( //option_section_1
                $id = 'jcmartim_support_admin_section_presentation',
                $title = esc_html__( 'Presentation', 'jcmartim-support'),
                $callback = [$this, 'jcmartim_support_admin_section_presentation_explanation'],
                $page = 'jcmartim_support_admin_page_presentation'
            );
            //Segunda seção EXPEDIENTE.
            add_settings_section( //option_section_2
                $id = 'jcmartim_support_admin_section_office_hours',
                $title = esc_html__( 'Office Hours', 'jcmartim-support'),
                $callback = [$this, 'jcmartim_support_admin_section_office_hours_explanation'],
                $page = 'jcmartim_support_admin_page_office_hours'
            );
            //Segunda seção CONTATOS.
            add_settings_section( //option_section_3
                $id = 'jcmartim_support_admin_section_contacts',
                $title = esc_html__( 'Contacts', 'jcmartim-support'),
                $callback = [$this, 'jcmartim_support_admin_section_contacts_explanation'],
                $page = 'jcmartim_support_admin_page_contacts'
            );
            //Segunda seção TUTORIAIS.
            add_settings_section( //option_section_4
                $id = 'jcmartim_support_admin_section_tutorials',
                $title = esc_html__( 'Tutorials', 'jcmartim-support'),
                $callback = [$this, 'jcmartim_support_admin_section_tutorials_explanation'],
                $page = 'jcmartim_support_admin_page_tutorials'
            );

            /**
             * Campos.
             */
            //Texto de apresentação.
            add_settings_field( 
                $id = 'jcmartim_support_presentation',
                $title = esc_html__( 'Presentation', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_presentation_callbak'],
                $page = 'jcmartim_support_admin_page_presentation',
                $section = 'jcmartim_support_admin_section_presentation',
                $args = [
                    'label_for' => 'jcmartim_support_presentation',
                ]
             );
             //Horários e dias de expediente.
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_first_hour_morning',
                $title = esc_html__( 'First hour (morning).', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_first_hour_morning_callbak'],
                $page = 'jcmartim_support_admin_page_office_hours',
                $section = 'jcmartim_support_admin_section_office_hours',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_first_hour_morning',
                ]
             );
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_last_hour_morning',
                $title = esc_html__( 'Last hour (morning).', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_last_hour_morning_callbak'],
                $page = 'jcmartim_support_admin_page_office_hours',
                $section = 'jcmartim_support_admin_section_office_hours',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_last_hour_morning',
                ]
             );
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_first_hour_afternoon',
                $title = esc_html__( 'First hour (afternoon)', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_first_hour_afternoon_callbak'],
                $page = 'jcmartim_support_admin_page_office_hours',
                $section = 'jcmartim_support_admin_section_office_hours',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_first_hour_afternoon',
                ]
             );
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_last_hour_afternoon',
                $title = esc_html__( 'Last hour (afternoon)', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_last_hour_afternoon_callbak'],
                $page = 'jcmartim_support_admin_page_office_hours',
                $section = 'jcmartim_support_admin_section_office_hours',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_last_hour_afternoon',
                ]
             );
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_first_day_week',
                $title = esc_html__( 'First day week', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_first_day_week_callbak'],
                $page = 'jcmartim_support_admin_page_office_hours',
                $section = 'jcmartim_support_admin_section_office_hours',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_first_day_week',
                    'options' => [
                        esc_attr__('monday', 'jcmartim-support') => esc_html__('Monday', 'jcmartim-support'),
                        esc_attr__('tuesday', 'jcmartim-support') => esc_html__('Tuesday', 'jcmartim-support'),
                        esc_attr__('wednesday', 'jcmartim-support') => esc_html__('Wednesday', 'jcmartim-support'),
                        esc_attr__('thursday', 'jcmartim-support') => esc_html__('Thursday', 'jcmartim-support'),
                        esc_attr__('friday', 'jcmartim-support') => esc_html__('Friday', 'jcmartim-support'),
                        esc_attr__('saturday', 'jcmartim-support') => esc_html__('Saturday', 'jcmartim-support'),
                        esc_attr__('sunday', 'jcmartim-support') => esc_html__('Sunday', 'jcmartim-support'),
                    ],
                ]
             );
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_last_day_week',
                $title = esc_html__( 'Last day week', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_last_day_week_callbak'],
                $page = 'jcmartim_support_admin_page_office_hours',
                $section = 'jcmartim_support_admin_section_office_hours',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_last_day_week',
                    'options' => [
                        esc_attr__('monday', 'jcmartim-support') => esc_html__('Monday', 'jcmartim-support'),
                        esc_attr__('tuesday', 'jcmartim-support') => esc_html__('Tuesday', 'jcmartim-support'),
                        esc_attr__('wednesday', 'jcmartim-support') => esc_html__('Wednesday', 'jcmartim-support'),
                        esc_attr__('thursday', 'jcmartim-support') => esc_html__('Thursday', 'jcmartim-support'),
                        esc_attr__('friday', 'jcmartim-support') => esc_html__('Friday', 'jcmartim-support'),
                        esc_attr__('saturday', 'jcmartim-support') => esc_html__('Saturday', 'jcmartim-support'),
                        esc_attr__('sunday', 'jcmartim-support') => esc_html__('Sunday', 'jcmartim-support'),
                    ],
                ]
             );
             //Contatos
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_contact_email',
                $title = esc_html__( 'Email', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_contact_email_callbak'],
                $page = 'jcmartim_support_admin_page_contacts',
                $section = 'jcmartim_support_admin_section_contacts',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_contact_email',
                ]
            );
            add_settings_field( 
                $id = 'jcmartim_support_office_hours_contact_fhone_cell',
                $title = esc_html__( 'Phone or Cell', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_contact_fhone_cell_callbak'],
                $page = 'jcmartim_support_admin_page_contacts',
                $section = 'jcmartim_support_admin_section_contacts',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_contact_fhone_cell',
                ]
            );
            add_settings_field( 
                $id = 'jcmartim_support_office_hours_contact_sckype',
                $title = esc_html__( 'Skype', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_contact_sckype_callbak'],
                $page = 'jcmartim_support_admin_page_contacts',
                $section = 'jcmartim_support_admin_section_contacts',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_contact_sckype',
                ]
             );
            add_settings_field( 
                $id = 'jcmartim_support_office_hours_contact_whatsapp',
                $title = esc_html__( 'WhatsApp', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_contact_whatsapp_callbak'],
                $page = 'jcmartim_support_admin_page_contacts',
                $section = 'jcmartim_support_admin_section_contacts',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_contact_whatsapp',
                ]
             );
             add_settings_field( 
                $id = 'jcmartim_support_office_hours_contact_site',
                $title = esc_html__( 'Web Site', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_office_hours_contact_site_callbak'],
                $page = 'jcmartim_support_admin_page_contacts',
                $section = 'jcmartim_support_admin_section_contacts',
                $args = [
                    'label_for' => 'jcmartim_support_office_hours_contact_site',
                ]
             );
             //Tutoriais
             add_settings_field( 
                $id = 'jcmartim_support_tutorials',
                $title = esc_html__( 'Video field groups', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_tutorials_callbak'],
                $page = 'jcmartim_support_admin_page_tutorials',
                $section = 'jcmartim_support_admin_section_tutorials',
                $args = [
                    'label_for' => 'jcmartim_support_tutorials',
                ]
             );
             add_settings_field( 
                $id = 'jcmartim_support_tutorials_amount',
                $title = esc_html__( 'Amount of field groups', 'jcmartim-support' ),
                $callback = [$this, 'jcmartim_support_tutorials_amount_callbak'],
                $page = 'jcmartim_support_admin_page_tutorials',
                $section = 'jcmartim_support_admin_section_tutorials',
                $args = [
                    'label_for' => 'jcmartim_support_tutorials_amount',
                ]
             );
        }

        /**
         * Textos Explicativos da seções.
         */
        //Texto explicativo da primeira seção (Apresentação).
        public function jcmartim_support_admin_section_presentation_explanation()
        {
            ?>
               <p style="max-width: 600px;">
                    <?php esc_html_e('In this section, enter a brief text about you (Web Developer), your company or agency.', 'jcmartim-support') ?>
                </p>
            <?php
        }
        //Texto explicativo da segunda seção (Expediente)
        public function jcmartim_support_admin_section_office_hours_explanation()
        {
            ?>
               <p style="max-width: 600px;">
                    <?php esc_html_e('Enter here with details of the times and days of the week when support services will be provided to your customers. E.g.: From 9:00 am to 12:00 pm and from 2:00 pm to 6:00 pm from Monday to Friday.', 'jcmartim-support') ?>
                </p>
            <?php
        }
        //Texto explicativo da terceira seção (Contatos).
        public function jcmartim_support_admin_section_contacts_explanation()
        {
            ?>
               <p style="max-width: 600px;">
                    <?php esc_html_e('Enter your support contacts here.', 'jcmartim-support') ?>
                </p>
            <?php
        }
        //Texto explicativo da quarta seção (Tutoriais).
        public function jcmartim_support_admin_section_tutorials_explanation()
        {
            ?>
               <p style="max-width: 600px;">
                    <?php esc_html_e('In this section, enter the tutorial data. Youtube link URL and a title for the tutorial. ATTENTION: to add more groups click on "Amount of field groups" and increase the number, then click on update.', 'jcmartim-support') ?>
                </p>
            <?php
        }

        /**
         * Conteúdo dos Campos da primeira seção
         */
        //Campo texto de apresentação
        public function jcmartim_support_presentation_callbak()
        {
            ?>
            <textarea 
                name="option_section_1[jcmartim_support_presentation]" 
                id="jcmartim_support_presentation" 
                cols="60" 
                rows="5"
            ><?php echo isset(self::$optons_section_1['jcmartim_support_presentation']) ? 
                esc_html__(self::$optons_section_1['jcmartim_support_presentation'], 'jcmartim-support') : '' ?></textarea>
                <p><?php esc_html_e("Enter introductory text for your customers.", "jcmartim-support") ?></p>
            <?php
        }
        //Horários e dias de expediente.
        public function jcmartim_support_office_hours_first_hour_morning_callbak()
        {
            ?>
            <input 
                type="time" 
                name="option_section_2[jcmartim_support_office_hours_first_hour_morning]" 
                id="jcmartim_support_office_hours_first_hour_morning"
                value="<?php echo isset(self::$optons_section_2['jcmartim_support_office_hours_first_hour_morning']) ? 
                esc_html__(self::$optons_section_2['jcmartim_support_office_hours_first_hour_morning'], 'jcmartim-support') : '' ?>"
            />
            <?php
        }
        public function jcmartim_support_office_hours_last_hour_morning_callbak()
        {
            ?>
            <input 
                type="time" 
                name="option_section_2[jcmartim_support_office_hours_last_hour_morning]" 
                id="jcmartim_support_office_hours_last_hour_morning"
                value="<?php echo isset(self::$optons_section_2['jcmartim_support_office_hours_last_hour_morning']) ? 
                esc_html__(self::$optons_section_2['jcmartim_support_office_hours_last_hour_morning'], 'jcmartim-support') : '' ?>"
            />
            <?php
        }
        public function jcmartim_support_office_hours_first_hour_afternoon_callbak()
        {
            ?>
            <input 
                type="time" 
                name="option_section_2[jcmartim_support_office_hours_first_hour_afternoon]" 
                id="jcmartim_support_office_hours_first_hour_afternoon"
                value="<?php echo isset(self::$optons_section_2['jcmartim_support_office_hours_first_hour_afternoon']) ? 
                esc_html__(self::$optons_section_2['jcmartim_support_office_hours_first_hour_afternoon'], 'jcmartim-support') : '' ?>"
            />
            <?php
        }
        public function jcmartim_support_office_hours_last_hour_afternoon_callbak()
        {
            ?>
            <input 
                type="time" 
                name="option_section_2[jcmartim_support_office_hours_last_hour_afternoon]" 
                id="jcmartim_support_office_hours_last_hour_afternoon"
                value="<?php echo isset(self::$optons_section_2['jcmartim_support_office_hours_last_hour_afternoon']) ? 
                esc_html__(self::$optons_section_2['jcmartim_support_office_hours_last_hour_afternoon'], 'jcmartim-support') : '' ?>"
            />
            <?php
        }
        public function jcmartim_support_office_hours_first_day_week_callbak($args)
        {
            ?>
            <select 
                name="option_section_2[jcmartim_support_office_hours_first_day_week]" 
                id="jcmartim_support_office_hours_first_day_week"
            >
                <?php foreach($args['options'] as $key => $value) : ?>
                    <option 
                        value="<?php echo esc_attr__($key) ?>"
                        <?php isset(self::$optons_section_2['jcmartim_support_office_hours_first_day_week']) ? 
                        selected($key, self::$optons_section_2['jcmartim_support_office_hours_first_day_week'], true) : '' ?>
                    >
                    <?php esc_html_e($value, 'jcmartim-support') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php
        }
        public function jcmartim_support_office_hours_last_day_week_callbak($args)
        {
            ?>
            <select 
                name="option_section_2[jcmartim_support_office_hours_last_day_week]" 
                id="jcmartim_support_office_hours_last_day_week"
            >
                <?php foreach($args['options'] as $key => $value) : ?>
                    <option 
                        value="<?php echo esc_attr__($key) ?>"
                        <?php isset(self::$optons_section_2['jcmartim_support_office_hours_last_day_week']) ? 
                        selected($key, self::$optons_section_2['jcmartim_support_office_hours_last_day_week'], true) : '' ?>
                    >
                    <?php esc_html_e($value, 'jcmartim-support') ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php
        }
        //Contatos.
        public function jcmartim_support_office_hours_contact_email_callbak()
        {
            ?>
            <input 
                type="email" 
                name="option_section_3[jcmartim_support_office_hours_contact_email]" 
                id="jcmartim_support_office_hours_contact_email"
                value="<?php echo isset(self::$optons_section_3['jcmartim_support_office_hours_contact_email']) ? 
                esc_html__(self::$optons_section_3['jcmartim_support_office_hours_contact_email'], 'jcmartim-support') : '' ?>"
            />
            <p><?php esc_html_e("Email to support.", "jcmartim-support") ?></p>
            <?php
        }
        public function jcmartim_support_office_hours_contact_fhone_cell_callbak()
        {
            ?>
            <input 
                type="tel" 
                name="option_section_3[jcmartim_support_office_hours_contact_fhone_cell]" 
                id="jcmartim_support_office_hours_contact_fhone_cell"
                value="<?php echo isset(self::$optons_section_3['jcmartim_support_office_hours_contact_fhone_cell']) ? 
                esc_html__(self::$optons_section_3['jcmartim_support_office_hours_contact_fhone_cell'], 'jcmartim-support') : '' ?>"
            />
            <p><?php esc_html_e("Phone or Mobile for support.", "jcmartim-support") ?></p>
            <?php
        }
        public function jcmartim_support_office_hours_contact_sckype_callbak()
        {
            ?>
            <input 
                type="text" 
                name="option_section_3[jcmartim_support_office_hours_contact_sckype]" 
                id="jcmartim_support_office_hours_contact_sckype"
                value="<?php echo isset(self::$optons_section_3['jcmartim_support_office_hours_contact_sckype']) ? 
                esc_html__(self::$optons_section_3['jcmartim_support_office_hours_contact_sckype'], 'jcmartim-support') : '' ?>"
            />
            <p><?php esc_html_e("Skype Name. E.g.: live:myskypename", "jcmartim-support") ?></p>
            <?php
        }
        public function jcmartim_support_office_hours_contact_whatsapp_callbak()
        {
            ?>
            <input 
                type="number" 
                name="option_section_3[jcmartim_support_office_hours_contact_whatsapp]" 
                id="jcmartim_support_office_hours_contact_whatsapp"
                value="<?php echo isset(self::$optons_section_3['jcmartim_support_office_hours_contact_whatsapp']) ? 
                esc_html__(self::$optons_section_3['jcmartim_support_office_hours_contact_whatsapp'], 'jcmartim-support') : '' ?>"
            />
            <p><?php esc_html_e("WhatsApp number. Ex: 75979111144", "jcmartim-support") ?></p>
            <?php
        }
        public function jcmartim_support_office_hours_contact_site_callbak()
        {
            ?>
            <input 
                type="url" 
                name="option_section_3[jcmartim_support_office_hours_contact_site]" 
                id="jcmartim_support_office_hours_contact_site"
                value="<?php echo isset(self::$optons_section_3['jcmartim_support_office_hours_contact_site']) ? 
                esc_url(self::$optons_section_3['jcmartim_support_office_hours_contact_site']) : '' ?>"
            />
            <p><?php esc_html_e("Web site. E.g.: https://www.mywebsite.com", "jcmartim-support") ?></p>
            <?php
        }
        //Tutoriais.
        public function jcmartim_support_tutorials_callbak()
        {
            //Atribui a variával a quantidade de campos salvo no banco de dados. Caso não tenha nenhum, adiciona um.
            $amount = isset(self::$optons_section_4['jcmartim_support_tutorials_amount']) ? self::$optons_section_4['jcmartim_support_tutorials_amount'] : '1';
            for($i = 0; $i < $amount; $i++) :
            ?>
            <div style="padding: 20px; border: solid 1px #bfbfbf; border-radius: 5px; margin-bottom: 20px">
                <input 
                    type="url" 
                    name="option_section_4[jcmartim_support_tutorials][<?php echo $i ?>][url]" 
                    id="jcmartim_support_tutorials"
                    value="<?php echo isset(self::$optons_section_4['jcmartim_support_tutorials'][$i]['url']) ? 
                    esc_url(self::$optons_section_4['jcmartim_support_tutorials'][$i]['url']) : '' ?>"
                />
                <p style="margin-bottom: 10px"><?php esc_html_e("Paste the url of the Youtube video here. E.g.: https://youtu.be/eo2gDhE6XGT", "jcmartim-support") ?></p>
                <input 
                    type="text" 
                    name="option_section_4[jcmartim_support_tutorials][<?php echo $i ?>][title]" 
                    id="jcmartim_support_tutorials"
                    value="<?php echo isset(self::$optons_section_4['jcmartim_support_tutorials'][$i]['title']) ? 
                    esc_html__(self::$optons_section_4['jcmartim_support_tutorials'][$i]['title'], 'jcmartim-support') : '' ?>"
                />
                <p><?php esc_html_e("Short title for this tutorial.", "jcmartim-support") ?></p>
            </div>
            <?php
            endfor;
        }
        //Salva no banco de dados a quantidade de grupos de campos.
        public function jcmartim_support_tutorials_amount_callbak()
        {
            ?>
            <input 
                type="number" 
                name="option_section_4[jcmartim_support_tutorials_amount]" 
                id="jcmartim_support_tutorials_amount"
                value="<?php 
                    //Caso nenhum grupo de campo tenha sido salvo, inclui um.
                    echo isset(self::$optons_section_4['jcmartim_support_tutorials_amount']) ? 
                    esc_html__(self::$optons_section_4['jcmartim_support_tutorials_amount'], 'jcmartim-support') : '1' 
                ?>"
                />
                <?php 
                    submit_button(
                        $text = esc_html__('To update', 'jcmartim-support'),
                        $type = 'primary',
                        $name = 'submit',
                        $wrap = false,
                    ); 
                ?>
            <p><?php esc_html_e("To insert a new block of video fields enter the amount and click update.", "jcmartim-support") ?></p>
            <?php
        }

        /**
         * Sanatizando antes de enviar para o banco de dados.
         */
        //Apresentação.
        public function jcmartim_support_option_section_1_sanitize($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_support_presentation':
                        $field_sanitize[$key] = sanitize_textarea_field($value);
                        break;
                    default :
                        $field_sanitize[$key] = sanitize_textarea_field($value);
                        break;
                }
            }
            return $field_sanitize;
        }
        //Expediente.
        public function jcmartim_support_option_section_2_sanitize($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_support_office_hours_first_hour_morning':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_last_hour_morning':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_first_hour_afternoon':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_last_hour_afternoon':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_first_day_week':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_last_day_week':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    default :
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                }
            }
            return $field_sanitize;
        }
        //Contatos.
        public function jcmartim_support_option_section_3_sanitize($fields)
        {
            $field_sanitize = [];

            foreach ($fields as $key => $value) {
                switch ($key) {
                    case 'jcmartim_support_office_hours_contact_email':
                        $field_sanitize[$key] = sanitize_email($value);
                        break;
                    case 'jcmartim_support_office_hours_contact_fhone_cell':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_contact_sckype':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_contact_whatsapp':
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                    case 'jcmartim_support_office_hours_contact_site':
                        $field_sanitize[$key] = esc_url($value);
                        break;
                    default :
                        $field_sanitize[$key] = sanitize_text_field($value);
                        break;
                }
            }
            return $field_sanitize;
        }
        
    }

}