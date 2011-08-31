<?php
/**
 * Initium Theme Options
 *
 * @package WordPress
 * @subpackage Initium
 * @since Initium 1.0
 */

/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 * @since Twenty Eleven 1.0
 *
 */
function initium_admin_enqueue_scripts( $hook_suffix ) {
  wp_enqueue_style( 'initium-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2011-04-28' );
  wp_enqueue_script( 'initium-theme-options', get_template_directory_uri() . '/inc/theme-options.js', array( 'farbtastic' ), '2011-06-10' );
  wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'initium_admin_enqueue_scripts' );

/**
 * Register the form setting for our initium_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, initium_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 * We also use this function to add our theme option if it doesn't already exist.
 *
 * @since Twenty Eleven 1.0
 */
function initium_theme_options_init() {

  // If we have no options in the database, let's add them now.
  if ( false === initium_get_theme_options() )
    add_option( 'initium_theme_options', initium_get_default_theme_options() );

  register_setting(
    'initium_options',       // Options group, see settings_fields() call in theme_options_render_page()
    'initium_theme_options', // Database option, see initium_get_theme_options()
    'initium_theme_options_validate' // The sanitization callback, see initium_theme_options_validate()
  );
}
add_action( 'admin_init', 'initium_theme_options_init' );

/**
 * Change the capability required to save the 'initium_options' options group.
 *
 * @see initium_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see initium_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * By default, the options groups for all registered settings require the manage_options capability.
 * This filter is required to change our theme options page to edit_theme_options instead.
 * By default, only administrators have either of these capabilities, but the desire here is
 * to allow for finer-grained control for roles and users.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function initium_option_page_capability( $capability ) {
  return 'edit_theme_options';
}
add_filter( 'option_page_capability_initium_options', 'initium_option_page_capability' );

/**
 * Add our theme options page to the admin menu, including some help documentation.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Twenty Eleven 1.0
 */
function initium_theme_options_add_page() {
  $theme_page = add_theme_page(
    __( 'Theme Options', 'initium' ), // Name of page
    __( 'Theme Options', 'initium' ), // Label in menu
    'edit_theme_options',                  // Capability required
    'theme_options',                       // Menu slug, used to uniquely identify the page
    'theme_options_render_page'            // Function that renders the options page
  );

  if ( ! $theme_page )
    return;

  $help = '<p>' . __( 'Some themes provide customization options that are grouped together on a Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Initium, provides the following Theme Options:', 'initium' ) . '</p>' .
      '<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'initium' ) . '</p>' .
      '<p><strong>' . __( 'For more information:', 'initium' ) . '</strong></p>' .
      '<p>' . __( '<a href="http://codex.wordpress.org/Appearance_Theme_Options_Screen" target="_blank">Documentation on Theme Options</a>', 'initium' ) . '</p>' .
      '<p>' . __( '<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>', 'initium' ) . '</p>';

  add_contextual_help( $theme_page, $help );
}
add_action( 'admin_menu', 'initium_theme_options_add_page' );


/**
 * Returns the default options for Twenty Eleven.
 *
 * @since Twenty Eleven 1.0
 */
function initium_get_default_theme_options() {
  return apply_filters( 'initium_default_theme_options', $default_theme_options );
}

/**
 * Returns the options array for Twenty Eleven.
 *
 * @since Twenty Eleven 1.0
 */
function initium_get_theme_options() {
  return get_option( 'initium_theme_options', initium_get_default_theme_options() );
}

/**
 * Returns the options array for Twenty Eleven.
 *
 * @since Twenty Eleven 1.0
 */
function theme_options_render_page() {
  ?>
  <div class="wrap">
    <?php screen_icon(); ?>
    <h2><?php printf( __( '%s Theme Options', 'initium' ), get_current_theme() ); ?></h2>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
      <?php
        settings_fields( 'initium_options' );
        $options = initium_get_theme_options();
        $default_options = initium_get_default_theme_options();
      ?>

      <?php submit_button(); ?>
    </form>
  </div>
  <?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see initium_theme_options_init()
 * @todo set up Reset Options action
 *
 * @since Twenty Eleven 1.0
 */
function initium_theme_options_validate( $input ) {
  $output = $defaults = initium_get_default_theme_options();

  return apply_filters( 'initium_theme_options_validate', $output, $input, $defaults );
}