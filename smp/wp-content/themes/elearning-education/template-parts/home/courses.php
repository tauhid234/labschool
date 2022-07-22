<?php
/**
 * Template part for displaying Online Courses section
 *
 * @package eLearning Education
 * @subpackage elearning_education
 */
?>

<section id="online-courses" class="text-center py-5">
  <div class="container">
    <?php if( get_theme_mod( 'elearning_education_online_courses_heading' ) != '') { ?>
      <h2><?php echo esc_html(get_theme_mod('elearning_education_online_courses_heading')); ?><hr></h2>
    <?php }?>
    <?php if( get_theme_mod( 'elearning_education_online_courses_sub_heading' ) != '') { ?>
      <p class="mb-0"><?php echo esc_html(get_theme_mod('elearning_education_online_courses_sub_heading')); ?></p>
    <?php }?>
    <?php if ( class_exists( 'LearnPress' ) ) {?>
      <div class="owl-carousel pt-5">
        <?php
          $args = array(
            'post_type' => 'lp_course',
            'posts_per_page' => get_theme_mod('elearning_education_online_courses_per_page'),
            'course_category' => get_theme_mod('elearning_education_online_courses_category'), 
            'order' => 'ASC'
          );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $post;
          $course = LP_Global::course();
          $price = $course->get_price_html();
          $lessons = $course->get_items( LP_LESSON_CPT );
          $lessons  = count( $lessons );
          $students = $course->count_students();?>
          <div class="courses-box text-md-left text-center">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
            <div class="courses-box-content p-2">
              <span><?php echo get_the_term_list( get_the_ID(), 'course_category', '', '<span>|</span>' ); ?></span>
              <h3 class="p-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <hr>
              <div class="courses-info">
                <strong class="mr-2 course-price"><?php echo esc_html($course->get_origin_price_html()); ?></strong>
                <span class="mr-2"><i class="far fa-comment"></i> <?php echo esc_html(get_comments_number()); ?></span>
                <span class="mr-2"><i class="far fa-user mr-1"></i><?php echo esc_html($students); ?></span>
                <span><i class="far fa-clock mr-1"></i><?php echo esc_html(learn_press_get_post_translated_duration( get_the_ID()), esc_html__( 'Lifetime access', 'elearning-education' ) ); ?></span>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>
      </div>
    <?php }?>
  </div>
</section>