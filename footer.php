    </div><!-- #content -->

    <footer class="footer panel-footer site-footer">
        <div class="wrap">
            <?php
            if(has_nav_menu('social')) : ?>
                <nav class="social-wrap" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'imelab' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'social',
                        'menu_class'     => 'social-links-menu',
                        'depth'          => 1,
                    ) );
                    ?>
                </nav>
            <?php endif;
            get_template_part('template-parts/footer/copyright');
            ?>
        </div>
    </footer>
</div><!-- #page -->

<?php
wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>