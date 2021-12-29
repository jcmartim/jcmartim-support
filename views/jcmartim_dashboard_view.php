<?php
    $text = "Olá! Meu nome é João Carlos e sou seu Web Developer. Coloco-me a sua disposição para qualquer tipo de suporte que se fizer necessário. Entre em contato de forma direta, através do telefone, Skype e WhatsApp ou pelo bom e velho e-mail.";
    $office_hours_1 = "09:00";
    $office_hours_2 = "12:00";
    $office_hours_3 = "14:00";
    $office_hours_4 = "18:00";
    $week_start = "segunda";
    $week_end = "sexta";
    $email = "joao@jcmartim.site";
    $phone_cell = "(51) 9 8617-4307";
    $skype = "jcmartim_2";
    $whatsapp = 51986174307;
    $web_site_url = "https://jcmartim.site";
    $web_site_url ? $web_site_domain = explode('//', $web_site_url)[1] : null;
    $embed = [
        [ 'link' => 'https://youtu.be/jskowllPATg', 'title' => 'Prévia do Front-End' ],
        [ 'link' => 'https://youtu.be/eo2gDhE8IXA', 'title' => 'Prévia do Back-End' ]
    ];
    for($i = 0; $i < count($embed); $i++) {
        $e = explode('//', $embed[$i]['link']);
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
        <?php esc_html_e('of the', 'jcmartim-support') ?> 
        <?php echo $office_hours_1; ?> <?php esc_html_e('at', 'jcmartim-support') ?> 
        <?php echo $office_hours_2; ?> <?php esc_html_e('and of the', 'jcmartim-support') ?> 
        <?php echo $office_hours_3; ?> <?php esc_html_e('at', 'jcmartim-support') ?> 
        <?php echo $office_hours_4; ?> <?php esc_html_e('in', 'jcmartim-support') ?>  
        <?php echo $week_start; ?> <?php esc_html_e('the', 'jcmartim-support') ?> 
        <?php echo $week_end; ?>.
    </p>
    <?php endif; ?>
	<p>
        <?php if($email) : ?>
            <strong><?php echo esc_html__('Email', 'jcmartim-support') ?></strong>: 
                <a href="mailto: <?php esc_html_e($email);  ?>" target="_black">
                <?php echo esc_html($email) ?></a><br />
        <?php endif; ?>
        <?php if($phone_cell) : ?>
		    <strong><?php echo esc_html__('Phone/Cell', 'jcmartim-support') ?></strong>: 
                <?php echo $phone_cell ?><br />
        <?php endif; ?>
        <?php if($skype) : ?>
            <strong><?php echo esc_html__('Skype', 'jcmartim-support') ?></strong>: 
                <a href="skype:<?php echo esc_html($skype) ?> ?call" target="_black">
                <?php echo esc_html__('Call on Skype', 'jcmartim-support') ?></a><br />
        <?php endif; ?>
        <?php if($whatsapp) : ?>
            <strong><?php echo esc_html__('WhatsApp', 'jcmartim-support') ?></strong>: 
                <a href="https://api.whatsapp.com/send?phone=<?php echo esc_html($whatsapp); ?>" target="_black">
                <?php echo esc_html__('Message by WhatsApp', 'jcmartim-support') ?></a><br />
        <?php endif; ?>
        <?php if($web_site_url) : ?>
            <strong><?php echo esc_html__('Web Site', 'jcmartim-support') ?></strong>: 
                <a href="<?php echo esc_html($web_site_url); ?>" target="_black">
                <?php echo esc_html($web_site_domain); ?></a>
        <?php endif; ?>    
	</p>
    <?php if(count($embed) > 0) : ?>
    <h3 class="title border"><?php echo esc_html('Tutorials', 'jcmartim-support'); ?></h3>
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