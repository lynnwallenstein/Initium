<?php
/**
 * Template Name: Sidebar Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage Initium
 * @since Initium 1.0
 */

get_header(); ?>


      <section id="content" role="main">

        <?php the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

        <?php comments_template( '', true ); ?>

      </section><!-- #content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>