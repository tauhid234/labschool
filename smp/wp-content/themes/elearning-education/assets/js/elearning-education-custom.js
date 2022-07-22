/**
  * Theme Js file.
**/

// ===== Mobile responsive Menu ==== 

function elearning_education_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function elearning_education_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

// ===== Scroll to Top ==== 

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

// ===== Loader ==== 

jQuery('document').ready(function($){
  setTimeout(function () {
  jQuery(".loader").fadeOut("slow");
  },1000);
});

// ===== Category Dropdown ==== 

jQuery(document).ready(function(){
  jQuery(".dropdown-menu").hide(); jQuery(".dropdown-toggle").click(function(){
    jQuery(".dropdown-menu").toggle();
  });
});

// ===== Slider ==== 

jQuery('document').ready(function(){
  var owl = jQuery('#online-courses .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:true,
    navText : ['<i class="fa fa-chevron-left py-4 p-3" aria-hidden="true"></i>','<i class="fa fa-chevron-right py-4 p-3" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 4
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});
