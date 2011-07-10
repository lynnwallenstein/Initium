<?php
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Initium
 * @since Initium 1.0
 */
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <hgroup>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'initium' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <h3 class="entry-format"><?php _e( 'Aside', 'initium' ); ?></h3>
      </hgroup>

      <?php if ( comments_open() ) : ?>
      <div class="comments-link">
        <?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'initium' ) . '</span>', _x( '1', 'comments number', 'initium' ), _x( '%', 'comments number', 'initium' ) ); ?>
      </div>
      <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'initium' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'initium' ) . '</span>', 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
      <?php initium_posted_on(); ?>
      <?php if ( comments_open() ) : ?>
      <span class="sep"> | </span>
      <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'initium' ) . '</span>', __( '<b>1</b> Reply', 'initium' ), __( '<b>%</b> Replies', 'initium' ) ); ?></span>
      <?php endif; ?>
      <?php edit_post_link( __( 'Edit', 'initium' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- #entry-meta -->
  </article><!-- #post-<?php the_ID(); ?> -->
