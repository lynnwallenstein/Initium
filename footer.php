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

    </div><!-- /div#main -->
    
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
  <!-- end scripts-->

  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

  <!-- http://codex.wordpress.org/Function_Reference/wp_footer
    Put this template tag immediately before </body> tag in a theme template -->
  <?php wp_footer(); ?>

</body>
</html>