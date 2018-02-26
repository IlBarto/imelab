<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
//janscjna
			<header>
				<h1 class="entry-title">
						<?php the_title(); ?>
				</h1>

bau

<?php if (is_single()) : ?>

				 <p class="entry-meta">
				 Inserito il <time datetime="<?php echo get_the_date(); ?> "> <?php the_time(); ?> <?php the_date();?> <?php the_time(); ?></time>
				 inserito da <?php the_author_link(); ?>



					 <?php
			 //controllo sui commenti



					 if (comments_open() ) :?> &bull; <?php comments_popup_link( 'No comments', '1 comment', '% comments' );
					 endif;

					 //mostra categoie e tag sui post singoli

					 if (is_singular('')): ?>

					 <br /> Filed in <?php the_category (',');
					 the_tags (' e taggato con ',',',''); 
					 ?>

				 </p>
				<?php endif;
				endif;
				?>
			 </header>
 

		<!-- contenuto del loop -->



			<?php 

			 the_content();
			 ?>
			 </article>