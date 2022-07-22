<?php
/**
 * Template part for displaying home page content
 *
 * @package Online Courses Hub
 * @subpackage online_courses_hub
 */
?>

<?php if( get_theme_mod('online_courses_hub_course_fields_number') != ''){ ?>
<section id="course-fields">
    <div class="owl-carousel">
        <?php $number = get_theme_mod('online_courses_hub_course_fields_number');
        for($i=1; $i<=$number; $i++ ) { ?>
            <div class="row course-fields-box">
                <div class="col-lg-2 col-md-12 align-self-center">
                    <i class="<?php echo esc_attr(get_theme_mod('online_courses_hub_course_fields_icon_'.$i)) ?>"></i>
                </div>
                <div class="col-lg-10 col-md-12 align-self-center">
                    <h4><?php echo esc_html(get_theme_mod('online_courses_hub_course_fields_heading_'.$i)); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('online_courses_hub_course_fields_text_'.$i)); ?></p>
                </div>
            </div>
        <?php }?>
    </div>
</section>
<?php }?>