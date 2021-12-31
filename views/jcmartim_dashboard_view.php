<?php
    $presentation   =   get_option( 'option_section_1');
    $office_hours   =   get_option( 'option_section_2');
    $contacts       =   get_option( 'option_section_3');
    $tutorials      =   get_option( 'option_section_4');

    $text = $presentation['jcmartim_support_presentation'];
    $office_hours_1 = $office_hours['jcmartim_support_office_hours_first_hour_morning'];
    $office_hours_2 = $office_hours['jcmartim_support_office_hours_last_hour_morning'];
    $office_hours_3 = $office_hours['jcmartim_support_office_hours_first_hour_afternoon'];
    $office_hours_4 = $office_hours['jcmartim_support_office_hours_last_hour_afternoon'];
    $week_start = $office_hours['jcmartim_support_office_hours_first_day_week'];
    $week_end = $office_hours['jcmartim_support_office_hours_last_day_week'];
    $email = $contacts['jcmartim_support_office_hours_contact_email'];
    $phone_cell = $contacts['jcmartim_support_office_hours_contact_fhone_cell'];
    $skype = $contacts['jcmartim_support_office_hours_contact_sckype'];
    $whatsapp = $contacts['jcmartim_support_office_hours_contact_whatsapp'];
    $web_site_url = "https://jcmartim.site";
    $web_site_url ? $web_site_domain = explode('//', $web_site_url)[1] : null;
    $embed = $tutorials['jcmartim_support_tutorials'];

    for($i = 0; $i < count($embed); $i++) {
        $e = explode('//', $embed[$i]['url']);
        $id = explode('/', $e[1])[1];
    }
?>
<style>
		.title {
			margin: 20px 0;
			padding-top: 20px !important;
			text-transform: uppercase;
			font-weight: bold !important;
		}
		.legend {
			padding-top: 20px !important;
			text-transform: uppercase;
			font-weight: bold !important
		}
		.border {
			border-top: solid 1px #ececec;
		}
        .embed-video {
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%;
        }
	</style>
	<h3 class="title"><?php esc_html_e('Support Contacts:', 'jcmartim-support'); ?></h3>
    <?php if($text) : ?>
    <p><?php echo esc_html($text); ?></p>
    <?php
        else :
            echo esc_html_e( 'Please! Enter the data in the administration panel of this plugin.', 'jcmartim-support' );
         endif; 
    ?>
    <?php if($office_hours_1 && $office_hours_2 && $office_hours_3 && $office_hours_4 && $week_start && $week_end) : ?>
    <p>
        <strong><?php esc_html_e('office hours', 'jcmartim-support'); ?></strong>
        <?php esc_html_e('from', 'jcmartim-support') ?> 
        <?php esc_html_e($office_hours_1, 'jcmartim-support'); ?> 
        <?php esc_html_e('to', 'jcmartim-support') ?> 
        <?php esc_html_e($office_hours_2 , 'jcmartim-support'); ?> 
        <?php esc_html_e('and from', 'jcmartim-support') ?> 
        <?php esc_html_e($office_hours_3, 'jcmartim-support'); ?>  
        <?php esc_html_e('to', 'jcmartim-support') ?> 
        <?php esc_html_e($office_hours_4, 'jcmartim-support'); ?>  
        <?php esc_html_e('in', 'jcmartim-support') ?>  
        <?php esc_html_e($week_start, 'jcmartim-support'); ?> 
        <?php esc_html_e('the', 'jcmartim-support') ?> 
        <?php esc_html_e($week_end, 'jcmartim-support' ) ; ?>.
    </p>
    <?php endif; ?>
	<p>
        <?php if($email) : ?>
            <strong><?php esc_html_e('Email', 'jcmartim-support') ?></strong>: 
                <a href="mailto: <?php esc_html_e($email);  ?>" target="_black">
                <?php esc_html_e($email) ?></a><br />
        <?php endif; ?>
        <?php if($phone_cell) : ?>
		    <strong><?php esc_html_e('Phone/Cell', 'jcmartim-support') ?></strong>: 
                <?php echo $phone_cell ?><br />
        <?php endif; ?>
        <?php if($skype) : ?>
            <strong><?php esc_html_e('Skype', 'jcmartim-support') ?></strong>: 
                <a href="skype:<?php echo esc_html($skype) ?> ?call" target="_black">
                <?php echo esc_html__('Call on Skype', 'jcmartim-support') ?></a><br />
        <?php endif; ?>
        <?php if($whatsapp) : ?>
            <strong><?php echo esc_html__('WhatsApp', 'jcmartim-support') ?></strong>: 
                <a href="https://api.whatsapp.com/send?phone=<?php echo esc_html($whatsapp); ?>" target="_black">
                <?php esc_html_e('Message by WhatsApp', 'jcmartim-support') ?></a><br />
        <?php endif; ?>
        <?php if($web_site_url) : ?>
            <strong><?php esc_html_e('Web Site', 'jcmartim-support') ?></strong>: 
                <a href="<?php esc_html_e($web_site_url); ?>" target="_black">
                <?php esc_html_e($web_site_domain); ?></a>
        <?php endif; ?>    
	</p>
    <?php if(count($embed) > 0) : ?>
    <h3 class="title border"><?php esc_html_e('Tutorials', 'jcmartim-support'); ?></h3>
    <?php 
        foreach($embed as $item) :
    ?>
	<h4 class="legend"><?php echo esc_html__( $item['title'], 'jcmartim-support') ?></h4>
	<div style="position: relative; padding-bottom: 56.25%; padding-top: 30px; height: 0; overflow: hidden;">
		<iframe
            class="embed-video"
			src="https://www.youtube.com/embed/<?php echo $id; ?>"
			title="<?php echo $item['title']; ?>" 
			frameborder="0" 
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen
		></iframe>
	</div>
    <?php 
        endforeach; 
    ?>
    <?php endif; ?>