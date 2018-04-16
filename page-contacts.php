<?php

//response generation function
$response = "";

//function to generate response
function my_contact_form_generate_response($type, $message){
	
	global $response;
	
	if($type == "success") {
		$response = "<div class='success'>{$message}</div>";
	} else {
		$response = "<div class='error'>{$message}</div>";
	}
}

//response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];

//php mailer variables
$to = "barto.jacopo@gmail.com";//get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .
           'Reply-To: ' . $email . "\r\n";

if(!$human == 0){
	if($human != 2) {
		my_contact_form_generate_response( "error", $not_human );
	} else {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			my_contact_form_generate_response( "error", $email_invalid );
		} else {
			if(empty($name) || empty($message)){
				my_contact_form_generate_response("error", $missing_content);
			}
			else {
				$sent = wp_mail($to, $subject, strip_tags($message),     $headers);
				if($sent) {
					my_contact_form_generate_response( "success", $message_sent );
				} else {
					my_contact_form_generate_response("error", $message_unsent);
				}
			}
		}
		
	}
} else if ($_POST['submitted']) {
	my_contact_form_generate_response( "error", $missing_content );
}
?>

<?php
get_header(); ?>

<div id="main-container" class="page-contacts">
	<section id="content-container" class="container">
		<?php
		if ( have_posts() ) :
			while(have_posts()): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
					<div class="contact-form col-md-12">
						<?php the_content(); ?>
						
						<div id="respond">
							<?php echo $response; ?>
							<form action="<?php the_permalink(); ?>" method="post">
								<div class="form-group">
									<label for="message_name">Name</label>
									<input type="text" name="message_name" class="form-control" value="<?php echo esc_attr($_POST['message_name']); ?>">
								</div>
								<div class="form-group">
									<label for="message_email">Mail</label>
									<input type="email" class="form-control" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
								</div>
								<div class="form-group">
									<label for="message_text">Message</label>
									<textarea class="form-control" rows="3" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
								</div>
								<div class="form-group">
									<label for="message_human">Human Verification</label>
									<input type="text" class="form-control" style="width: 60px;" name="message_human"> + 3 = 5
								</div>
								<button type="submit" class="btn btn-secondary">Submit</button>
							</form>
						</div>
					
					</div><!-- .entry-content -->
				</article><!-- #post -->
			<?php endwhile;
		endif;?>
	</section> <!-- main--container--end-->
</div>

<?php get_footer(); ?>
