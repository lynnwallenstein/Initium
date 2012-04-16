<?php
/**
 * The template for displaying the header.
 *
 * @package WordPress
 * @subpackage Initium
 * @since Initium 1.0
 */
?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
      echo " | $site_description";

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
      echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

  ?></title>

  <?php if(is_single() || is_page()) { ?>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:url" content="<?php the_permalink(); ?>"/>
    <meta name="author" content="<?php bloginfo('admin_email'); ?>">
    <?php while ( have_posts() ) : the_post(); ?>
      <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
      <meta name="description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
    <?php endwhile; // end of the loop. ?>
  <?php  } else { ?>
    <meta property="og:type" content="blog" />
    <meta property="og:title" content="<?php bloginfo('name'); ?>" />
    <meta property="og:url" content="<?php bloginfo('url'); ?>"/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta name="author" content="<?php bloginfo('admin_email'); ?>">
  <?php  }  ?>


  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon.png" />
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-114x114-precomposed.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-72x72-precomposed.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-precomposed.png">

  <!-- CSS: implied media="all" -->
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- All JavaScript at the bottom, except for Modernizr and Respond.
     Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries -->
  <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.5.3.min.js"></script>

  <?php
    /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
      wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head();
  ?>

</head>
<body <?php body_class(); ?>>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

  <div id="container"  class="hfeed">
    
    <header id="page-header" role="banner">
      <hgroup role="banner">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <h2><?php bloginfo('description'); ?></h2>
      </hgroup>
      <nav id="access" role="navigation">
        <h3 class="assistive-text"><?php _e( 'Main menu', 'initium' ); ?></h3>
        <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
        <div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'initium' ); ?></a></div>
        <div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'initium' ); ?>"><?php _e( 'Skip to secondary content', 'initium' ); ?></a></div>
        <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
      </nav><!-- #access -->
    </header><!-- /header#page-header -->

      <div id="main" role="main">