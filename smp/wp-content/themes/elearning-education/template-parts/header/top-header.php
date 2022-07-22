<?php 
/*
* Display Logo and contact details
*/
?>

<div class="top-header py-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-9 col-md-12 text-center text-md-right">
        <?php if( get_theme_mod( 'elearning_education_phone_number' ) != '') { ?>
          <span class="mr-2"><i class="fas fa-phone mr-2"></i><?php echo esc_html( get_theme_mod('elearning_education_phone_number','')); ?></span>
        <?php } ?>
        <?php if( get_theme_mod( 'elearning_education_email_address' ) != '') { ?>
          <span class="mr-2"><i class="far fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('elearning_education_email_address','')); ?></span>
        <?php } ?>
        <span class="media-links mb-3 mb-md-0">
          <?php if( get_theme_mod( 'elearning_education_facebook_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f mr-2"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'elearning_education_twitter_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_twitter_url','' ) ); ?>"><i class="fab fa-twitter mr-2"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'elearning_education_instagram_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_instagram_url','' ) ); ?>"><i class="fab fa-instagram mr-2"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'elearning_education_youtube_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_youtube_url','' ) ); ?>"><i class="fab fa-youtube mr-2"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'elearning_education_pint_url' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_pint_url','' ) ); ?>"><i class="fab fa-pinterest mr-2"></i></a>
          <?php } ?>
        </span>
        <?php if( get_theme_mod( 'elearning_education_register_button_link' ) != '' || get_theme_mod( 'elearning_education_register_button' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_register_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'elearning_education_register_button','' ) ); ?></a>
        <?php } ?>
        <?php if( get_theme_mod( 'elearning_education_login_button_link' ) != '' || get_theme_mod( 'elearning_education_login_button' ) != '') { ?>
          <a href="<?php echo esc_url( get_theme_mod( 'elearning_education_login_button_link','' ) ); ?>" class="login-btn"><i class="fas fa-lock mr-2"></i><?php echo esc_html( get_theme_mod( 'elearning_education_login_button','' ) ); ?></a>
        <?php } ?>
      </div>
    </div>
  </div> 
</div>