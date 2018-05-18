<?php

$response = "";

function my_contact_form_generate_response($type, $message){
	global $response, $human_trial, $human_trials;
	$response = "<div id='response' class='alert alert-{$type} hide' role='alert'>{$message}</div>";
	$human_trial = $human_trials[rand(1,9)];
}

//sql variables
$product_options;

//response messages
$not_human       = esc_html( translate('AntiBot verification incorrect','imelab') );
$missing_content = esc_html( translate('Please supply all information','imelab') );
$email_invalid   = esc_html( translate('E-mail Address Invalid','imelab') );
$message_unsent  = esc_html( translate('Message was not sent. Try Again','imelab') );
$message_sent    = esc_html( translate('Thanks! Your message has been sent','imelab') );

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];
$newsletter = $_POST['message_newsletter'];

//php mailer variables
$to = get_theme_mod('contact_form_mail');
$from = get_theme_mod('message_from_address');
$subject = "Qualcuno ha mandato un messaggio da ".get_bloginfo('name');
$headers = "From: {$from}\r\n" .
           'Reply-To: ' . $email . "\r\n";

$human_trials = array(
        '',//null
        ' + 2 = 3',//1
        ' + 4 = 6',//2
        ' - 1 = 2',//3
        ' + 3 = 7',//4
        ' + 5 = 10',//5
        ' - 2 = 4',//6
        ' - 6 = 1',//7
        ' + 1 = 9',//8
        ' - 5 = 4',//9
);

$human_trial = $_POST['human_trial'];

if(!$human == 0){
	if($human != array_search($human_trial, $human_trials)) {
		my_contact_form_generate_response( "danger", $not_human );
	} else {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			my_contact_form_generate_response( "danger", $email_invalid );
		} else {
			if(empty($name) || empty($message)){
				my_contact_form_generate_response("danger", $missing_content);
			}
			else {
			    $new_message = "Name: {$name}\nMessage: {$message}\n";
			    
			    if(!is_null($newsletter)) {
				    $new_message .= "\nVuole iscriversi alla newsletter";
                }
				if(wp_mail($to, $subject, strip_tags($new_message), $headers)) {
					my_contact_form_generate_response( "success", $message_sent );
				} else {
					my_contact_form_generate_response("danger", $message_unsent);
				}
			}
		}
	}
} else{
	if ($_POST['submitted']) {
		my_contact_form_generate_response( "danger", $missing_content );
	} else {
	   $human_trial = $human_trials[rand(1,9)];
    }
}

get_header(); ?>

<div id="main-container" class="page-contacts">
	<section id="content-container" class="container">
		<?php
		if ( have_posts() ) :
			while(have_posts()): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
					<div class="contact-form col-md-12">
						<?php the_content(); ?>
						
						<div>
							<?php echo $response; ?>
							<form action="<?php the_permalink(); ?>" method="post">
								<div class="form-group">
									<label for="message_name"><?php esc_html_e('Name', 'imelab') ?></label>
									<input id="message_name" type="text" name="message_name" class="form-control" value="<?php echo esc_attr($_POST['message_name']); ?>">
								</div>
								<div class="form-group">
									<label for="message_email"><?php esc_html_e('E-mail', 'imelab') ?></label>
									<input id="message_email" type="email" class="form-control" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
								</div>
								<div class="form-group">
									<label for="message_text"><?php esc_html_e('Message', 'imelab') ?></label>
									<textarea id="message_text" class="form-control" rows="3" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
								</div>
                                <div class="form-group form-check">
                                    <input id="message_newsletter" type="checkbox" class="form-check-input" name="message_newsletter" value="<?php echo esc_attr($_POST['message_newsletter']); ?>">
                                    <label class="form-check-label" for="message_newsletter"><?php esc_html_e('Newsletter', 'imelab') ?></label>
                                </div>
								<div class="form-group">
									<label for="message_human" style="display: block;"><?php esc_html_e('AntiBot Check', 'imelab') ?></label>
									<input id="message_human" type="text" class="form-control" style="display: inline-block; width: 60px;" name="message_human"><?php echo $human_trial ?>
								</div>
                                <input type="hidden" name="human_trial" value="<?php echo esc_attr($human_trial) ?>">
                                <input type="hidden" name="submitted" value="1">
								<button type="submit" class="btn btn-secondary"><?php esc_html_e('Submit', 'imelab') ?></button>
							</form>
						</div>
					
					</div><!-- .contact-form -->
				</article><!-- #post -->
			<?php endwhile;
		endif;?>
	</section> <!-- #content-container -->
</div>

<script type="text/javascript">
    var response = document.getElementById('response');

    if(response) {
        response.className.replace('hide', 'show');
        response.style.display = 'block';
    }
</script>

<?php get_footer(); ?>
