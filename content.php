<!--
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
-->
	



<!--

		<header>
				<h2 class="entry-title">
asdasd

					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">



					<?php the_title(); ?>


					</a>
				</h2>

				 <p class="entry-meta">
				 Inserito il <time datetime="<?php echo get_the_date(); ?> "> <?php the_time(); ?> </time>
				 inserito da <?php the_author_link(); ?>



				 <?php
		 //controllo sui commenti



				 if (comments_open() ) :?> &bull; <?php comments_popup_link( 'No comments', '1 comment', '% comments' );
				 endif;

			 ?>
				 </p>

			 </header>
 
--> 

		<!-- contenuto del loop -->



			<?php 

			 the_content();
			 ?>
			 </article>