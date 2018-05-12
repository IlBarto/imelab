<?php
get_header(); ?>

<div id="main-container" class="front-page">
	<section id="content-container">
    <?php
        while(have_posts()): the_post();
            get_template_part('/template-parts/page/content', 'front-page');
        endwhile; ?>
	</section> <!-- main--container--end-->
</div>

<script type="text/javascript">
    // set up text to print, each item in array is new line
    var aText = [
        "ELECTRONIC",
        "PROTOTIPATION",
        "DEVELOPING",
        "SMALL SERIES"
    ];
    var iSpeed = 100; // time delay of print out
    var iIndex = 0; // start printing array at this posision
    var iArrLength = aText[0].length; // the length of the text array
    var iScrollAt = 20; // start scrolling up at this many lines

    var iTextPos = 0; // initialise text position
    var sContents = ''; // initialise contents variable
    var iRow; // initialise current row

    function typewriter()
    {
        var destination = document.getElementById("typedtext");

        if(destination) {
            sContents =  ' ';
            iRow = Math.max(0, iIndex-iScrollAt);

            while ( iRow < iIndex ) {
                sContents += aText[iRow++] + '<br />';
            }
            destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + "_";
            if ( iTextPos++ == iArrLength ) {
                iTextPos = 0;
                iIndex++;
                if ( iIndex != aText.length ) {
                    iArrLength = aText[iIndex].length;
                    setTimeout("typewriter()", 500);
                }
            } else {
                setTimeout("typewriter()", iSpeed);
            }
        }
    }
    
    typewriter();
</script>

<?php
get_footer(); ?>