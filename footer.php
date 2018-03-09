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
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span>' . imelab_get_social_icons(),
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

</body>
</html>