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

  <! --- Choose Your Own JS Adventure Time -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/vendor/assets/components/jquery.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
  <!-- end scripts-->

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
  </script>

  <!-- http://codex.wordpress.org/Function_Reference/wp_footer
    Put this template tag immediately before </body> tag in a theme template -->
  <?php wp_footer(); ?>

</body>
</html>
