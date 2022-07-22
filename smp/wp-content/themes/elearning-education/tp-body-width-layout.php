<?php

	$elearning_education_tp_theme_css = "";

	$elearning_education_theme_lay = get_theme_mod( 'elearning_education_tp_body_layout_settings','Full');
    if($elearning_education_theme_lay == 'Container'){
		$elearning_education_tp_theme_css .='body{';
			$elearning_education_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$elearning_education_tp_theme_css .='}';
		$elearning_education_tp_theme_css .='.page-template-front-page .menubar{';
			$elearning_education_tp_theme_css .='position: static;';
		$elearning_education_tp_theme_css .='}';
		$elearning_education_tp_theme_css .='.scrolled{';
			$elearning_education_tp_theme_css .='width: auto; left:0; right:0;';
		$elearning_education_tp_theme_css .='}';
	}else if($elearning_education_theme_lay == 'Container Fluid'){
		$elearning_education_tp_theme_css .='body{';
			$elearning_education_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$elearning_education_tp_theme_css .='}';
		$elearning_education_tp_theme_css .='.page-template-front-page .menubar{';
			$elearning_education_tp_theme_css .='width: 99%';
		$elearning_education_tp_theme_css .='}';		
		$elearning_education_tp_theme_css .='.scrolled{';
			$elearning_education_tp_theme_css .='width: auto; left:0; right:0;';
		$elearning_education_tp_theme_css .='}';
	}else if($elearning_education_theme_lay == 'Full'){
		$elearning_education_tp_theme_css .='body{';
			$elearning_education_tp_theme_css .='max-width: 100%;';
		$elearning_education_tp_theme_css .='}';
	}

    $elearning_education_scroll_position = get_theme_mod( 'elearning_education_scroll_top_position','Right');
    if($elearning_education_scroll_position == 'Right'){
        $elearning_education_tp_theme_css .='#return-to-top{';
            $elearning_education_tp_theme_css .='right: 20px;';
        $elearning_education_tp_theme_css .='}';
    }else if($elearning_education_scroll_position == 'Left'){
        $elearning_education_tp_theme_css .='#return-to-top{';
            $elearning_education_tp_theme_css .='left: 20px;';
        $elearning_education_tp_theme_css .='}';
    }else if($elearning_education_scroll_position == 'Center'){
        $elearning_education_tp_theme_css .='#return-to-top{';
            $elearning_education_tp_theme_css .='right: 50%;left: 50%;';
        $elearning_education_tp_theme_css .='}';
    }