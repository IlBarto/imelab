    </div><!-- #content -->

    <footer role="contentinfo" class="footer site-footer wrap row justify-content-center align-items-center">
        <div>
        <?php
        get_template_part('template-parts/footer/copyright');

        if(has_nav_menu('social')) :
            $menuParam = array(
	            'theme_location'=> 'social',
	            'menu_class'    => 'social-links-menu',
	            'depth'         => 1,
	            'container'     => '',
	            'items-wrap'    => '%3$s',
	            'echo'          => false,
            );

            echo "<p>".strip_tags(wp_nav_menu($menuParam), '<a>')."</p";
        endif; ?>
        </div>
    </footer>
</div><!-- #page -->

<script type="text/javascript">
    function removebr(list) {
        for(var i = 0;i<list.length;i++) {
            if(list.item(i).tagName == 'BR') {
                list.item(i).parentNode.removeChild(list.item(i));
                i--;//torno indietro di 1, avendo rimosso un elemento
            } else if(list.item(i).children.length > 0) {
                removebr(list.item(i).children);
            }
        }
    }

    var imagecenterlist = document.getElementsByClassName('image-center');
    removebr(imagecenterlist);

</script>

<?php
wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>