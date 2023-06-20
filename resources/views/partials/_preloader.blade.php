<div id="preloader">
    <div class="spinner spinner--steps icon-spinner"></div>
</div>
<script>
    jQuery(window).load(function() {
        // will first fade out the loading animation
        jQuery("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
        jQuery("#preloader").delay(0).fadeOut("fast");
    })
</script>
