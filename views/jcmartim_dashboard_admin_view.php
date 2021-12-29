<div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title()); ?></h1>
    <?php
        // Tabs 
        // Define a tab ativa por padrão.
        // Se a query "tab" estiver ativa a tab atual vai ser a ativa se não o padão será a "contacts".
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'contacts';
     ?>
    <h2 class="nav-tab-wrapper">
        <a 
            class="nav-tab <?php echo $active_tab == 'contacts' ? 'nav-tab-active' : ''; ?>" 
            href="admin.php?page=jcmartim_support&tab=contacts"
        >
            <?php esc_html_e('Contacts.', 'jcmartim-support') ?>
        </a>
        <a 
            class="nav-tab <?php echo $active_tab == 'tutorials' ? 'nav-tab-active' : ''; ?>" 
            href="admin.php?page=jcmartim_support&tab=tutorials"
        >
            <?php esc_html_e('Tutorials', 'jcmartim-support') ?>
        </a>
    </h2>
    <form action="options.php" method="post">
        <?php
         if ($active_tab == 'contacts') {
            settings_fields( 'option_section_group_1' );
            do_settings_sections( 'jcmartim_support_admin_page_contacts' );
            //Mensagem de sucesso!
            if (isset($_GET['settings-updated'])) {// Verifica via get se a query string "settings-updated" está ativa.
                add_settings_error(
                    'option_section_group_1', // ID da classe de settings.
                    'jcmartim-support-message', // Classe a ser adicionada ao html da mensagem.
                    $message = esc_html__('Settings saved successfully!', 'jcmartim-support'), // Mensagem de sucesso!
                    'success' // Tipo de mensagem.
                );
            }
            settings_errors('option_section_group_1');
         } else {
            settings_fields( 'option_section_group_2' );
            do_settings_sections( 'jcmartim_support_admin_page_tutorials' );
            //Mensagem de sucesso!
            if (isset($_GET['settings-updated'])) {// Verifica via get se a query string "settings-updated" está ativa.
                add_settings_error(
                    'option_section_group_2', // ID da classe de settings.
                    'jcmartim-support-message', // Classe a ser adicionada ao html da mensagem.
                    $message = esc_html__('Settings saved successfully!', 'jcmartim-support'), // Mensagem de sucesso!
                    'success' // Tipo de mensagem.
                );
            }
            settings_errors('option_section_group_2');
         }
         submit_button(esc_html__('Save Settings', 'jcmartim-support'));
        ?>
    </form>
</div>