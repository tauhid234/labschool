<?php
/**
 * Template part for displaying posts
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */

?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="page-box row">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the audio file.
        if ( ! empty( $audio ) ) {
          foreach ( $audio as $audio_html ) {
            echo '<div class="entry-audio">';
              echo $audio_html;
            echo '</div><!-- .entry-audio -->';
          }
        };
      };
    ?>
    <div class="box-content">
      <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
      <div class="box-info">
        <?php if(get_theme_mod('elearning_education_remove_date',true) != ''){ ?>
          <i class="far fa-calendar-alt"></i><span class="entry-date"><?php the_date(); ?></span>
        <?php }?>
        <?php if(get_theme_mod('elearning_education_remove_author',true) != ''){ ?>
          <i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
        <?php }?>
        <?php if(get_theme_mod('elearning_education_remove_comments',true) != ''){ ?>
          <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','elearning-education'), __('0 Comments','elearning-education'), __('% Comments','elearning-education') ); ?></span>
        <?php }?>
      </div>
      <p><?php $excerpt = get_the_excerpt(); echo esc_html( elearning_education_string_limit_words( $excerpt, esc_attr(get_theme_mod('elearning_education_excerpt_count','35')))); ?></p>
      <?php if(get_theme_mod('elearning_education_remove_read_button',true) != ''){ ?>
        <div class="readmore-btn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'elearning-education' ); ?>"><?php echo esc_html(get_theme_mod('elearning_education_read_more_text',__('Read More','elearning-education')));?></a>
        </div>
      <?php }?>
    </div>
    <div class="clearfix"></div>
  </div>
</article>