<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Initium
 * @since Initium 1.0
 */
?>

    <footer id="colophon" role="contentinfo">

        <?php
          /* A sidebar in the footer? Yep. You can can customize
           * your footer with three columns of widgets.
           */
          get_sidebar( 'footer' );
        ?>

        <div id="site-generator">
          <?php do_action( 'initium_credits' ); ?>
          <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'initium' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'initium' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'initium' ), 'WordPress' ); ?></a>
        </div>
    </footer><!-- #colophon -->
  </div> <!--! end of #container -->

  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.6.4.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
  <!-- end scripts-->

  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

  <!-- http://codex.wordpress.org/Function_Reference/wp_footer
    Put this template tag immediately before </body> tag in a theme template -->
  <?php wp_footer(); ?>

</body>
</html>