<div id ="comments">


	<?php
	// il post è protetto da password ?

	if (post_password_required()) :?>

	<p class="nopassword">

			Questo post è protetto da password. Digitare la vostra password.

			</p>

			</div>

			<?php //torna indietro

			return;
			endif;

			//cerca i commenti

			if(have_comments() ) :?>

				<h2 id="comments-title">
					Ci sono <?php comments_number (' no comments', 'one comment', '% comments'); ?>
				</h2>
			<?php 
				//navigazione tra i commenti


			if (get_comment_pages_count() >1 && get_option ('page_comments' ) ) :?>

			<nav id="comment-nav-above">
				<div class="nav-previous">
					<?php previous_comments_link ('&larr; Older comments'); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link(' Newer comments &rarr;' ); ?>
				</div>
			</nav>
			<?php

			endif;
?>

			<ol class="commentlist">
			<?php
	
			wp_list_comments();
			?>
			</ol>
<?php

				//navigazione tra commenti

			if (get_comment_pages_count()>1 &&get_option('page_comments')) : ?>

			<nav id="comment-nav-above">

			<div class="nav-previous">
			<?php previous_comments_link('&larr; Older comments'); ?>

			</div>

			<div class="nav-next">

			<?php next_comments_link ('Newer comments &rarr;'); ?>
	
			 </div>

			</nav>
<?php
			endif; 

endif;
			?>

			<?php 
			//esce dal form del commento

			comment_form();

			?>


