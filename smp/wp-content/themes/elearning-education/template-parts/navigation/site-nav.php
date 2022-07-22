<?php 
/*
* Display Theme menus
*/
?>

<div class="menubar">
  	<div class="container right_menu">
		<div class="innermenubox">
			<?php if(has_nav_menu('primary-menu')){ ?>
	  			<div class="toggle-nav mobile-menu">
	    			<button onclick="elearning_education_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','elearning-education'); ?></span></button>
	  			</div>
			<?php }?>
 			<div id="mySidenav" class="nav sidenav">
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'elearning-education' ); ?>">
	              	<?php if(has_nav_menu('primary-menu')){
	                  	wp_nav_menu( array( 
		                    'theme_location' => 'primary-menu',
		                    'container_class' => 'main-menu clearfix' ,
		                    'menu_class' => 'clearfix',
		                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
		                    'fallback_cb' => 'wp_page_menu',
	                  	) );
	              	} ?>
	  				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="elearning_education_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','elearning-education'); ?></span></a>
	    		</nav>
	  		</div>
	    </div>
  	</div>
</div>