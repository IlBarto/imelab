<?php
$response = "";

function my_reservation_form_generate_response($type, $message){
	global $response, $human_trial, $human_trials;
	$response = "<div id='response' class='alert alert-{$type} hide' role='alert'>{$message}</div>";
	$human_trial = $human_trials[rand(1,9)];
}

$not_human          = esc_html( translate('AntiBot verification incorrect','imelab') );
$email_invalid      = esc_html( translate('E-mail Address Invalid','imelab') );
$missing_content    = esc_html( translate('Please supply all information','imelab') );
$message_unsent     = esc_html( translate('Message was not sent. Try Again','imelab') );
$message_sent       = esc_html( translate('Thanks! Your message has been sent','imelab') );
$amount_invalid     = esc_html( translate('Amount invalid', 'imelab') );

$human_trial = $_POST['reservation_human_trial'];

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

$error_error = false;

if(isset($_POST['reservation_product'])) {
	$product = esc_attr($_POST['reservation_product']);
	$human = $_POST['reservation_human'];
	
	if( true/*TODO il prodotto esiste nel database*/ ) {
		if(!$human == 0) {
			if($human == array_search($human_trial, $human_trials)){
				if ( isset( $_POST['reservation_amount'] ) ) {
					$amount = filter_input(INPUT_POST, 'reservation_amount', FILTER_VALIDATE_INT); $_POST['reservation_amount'];
					
					if (is_int($amount) && $amount > 0 && true/*TODO la quantità è minore/uguale a quella nel db*/ ) {
						$email = $_POST['reservation_email'];
						if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
							$message = "Prodotto: ".$product."\n";
							$message .= "Quantità: ".$amount."\n";
							$message .= $_POST['reservation_notes'];
							
							$to = get_theme_mod('reserve_form_mail');
							$subject = "Qualcuno ha creato un ordine da ".get_bloginfo('name');
							$headers = 'From: '. $email . "\r\n" .
							           'Reply-To: ' . $email . "\r\n";
							if(wp_mail($to, $subject, strip_tags($message), $headers)) {
								my_reservation_form_generate_response("success", $message_sent);
							} else {
								my_reservation_form_generate_response("danger", $message_unsent);
							}
						} else {
							my_reservation_form_generate_response("danger", $email_invalid);
						}
					} else {
						my_reservation_form_generate_response("danger", $amount_invalid);
					}
				}
			} else {
				my_reservation_form_generate_response("danger", $not_human);
			}
		} else {
			if ($_POST['submitted']) {
				my_reservation_form_generate_response("danger", $missing_content);
			} else {
				$human_trial = $human_trials[ rand( 1, 9 ) ];
			}
		}
	} else {
		$error_error = true;
	}
}

get_header(); ?>

<div id="main-container" class="page-reserve">
	<section id="content-container" class="container">
		<?php
		if ( have_posts() ) :
			while(have_posts()): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
					<div class="reservation-form col-md-12">
						<?php
						if(isset($_POST['reservation_product'])) :
							if(!$error_error) :
								the_content(); ?>
								<div>
									<?php echo $response; ?>
									<form action="" method="post">
										<div class="form-row">
											<div class="form-group col-md-8">
												<label for="reservation_product"><?php esc_html_e('Product', 'imelab') ?></label>
												<input id="reservation_product" readonly type="text" name="reservation_product" class="form-control-plaintext" value="<?php echo $product ?>">
											</div>
											<div class="form-group col-md-4">
												<label for="reservation_amount"><?php esc_html_e('Amount', 'imelab') ?></label>
												<input id="reservation_amount" type="text" name="reservation_amount" class="form-control" value="<?php echo esc_attr($_POST['reservation_amount']) ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label for="reservation_notes"><?php esc_html_e('Notes', 'imelab') ?></label>
											<textarea id="reservation_notes" class="form-control" rows="3" name="reservation_notes"><?php echo esc_textarea($_POST['reservation_notes']); ?></textarea>
										</div>
										<div class="form-group">
											<label for="reservation_email"><?php esc_html_e('E-mail', 'imelab') ?></label>
											<input id="reservation_email" type="email" class="form-control" name="reservation_email" value="<?php echo esc_attr($_POST['reservation_email']); ?>">
										</div>
										<div class="form-group">
											<label for="reservation_human" style="display: block;"><?php esc_html_e('AntiBot Check', 'imelab') ?></label>
											<input id="reservation_human" type="text" class="form-control" style="display: inline-block; width: 60px;" name="reservation_human"><?php echo $human_trial ?>
										</div>
										<input type="hidden" name="reservation_human_trial" value="<?php echo esc_attr($human_trial) ?>">
										<input type="hidden" name="submitted" value="1">
										<button type="submit" class="btn btn-secondary"><?php esc_html_e('Submit', 'imelab') ?></button>
									</form>
								</div>
							<?php
							else: ?>
								<div id='response' class='alert alert-danger hide' role='alert'><?php esc_html_e("The product you're looking for doesn't exist",'imelab') ?></div>
							<?php
							endif; ?>
						<?php
						else: ?>
							<div id='response' class='alert alert-danger hide' role='alert'><?php esc_html_e("Visit this page by clicking the 'Reserve' button on the Projects page",'imelab') ?></div>
						<?php
						endif; ?>
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
