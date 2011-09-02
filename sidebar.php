<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = initium_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
    <section id="secondary" class="widget-area" role="complementary">
      <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

        <aside id="archives" class="widget">
          <h3 class="widget-title"><?php _e( 'Archives', 'initium' ); ?></h3>
          <ul>
            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
          </ul>
        </aside>

        <aside id="meta" class="widget">
          <h3 class="widget-title"><?php _e( 'Meta', 'initium' ); ?></h3>
          <ul>
            <?php wp_register(); ?>
            <li><?php wp_loginout(); ?></li>
            <?php wp_meta(); ?>
          </ul>
        </aside>

      <?php endif; // end sidebar widget area ?>
    </section><!-- #secondary .widget-area -->
<?php endif; ?>