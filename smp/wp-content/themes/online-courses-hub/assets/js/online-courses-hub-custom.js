jQuery('document').ready(function(){
  var owl = jQuery('#course-fields .owl-carousel');
    owl.owlCarousel({
    margin: 30,
    nav:true,
    autoplay : false,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: true,
    dots:false,
    navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
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