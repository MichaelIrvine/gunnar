jQuery(document).ready(function($) {

  $(".slick-gallery__projects").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 300,
    adaptiveHeight: false,
    fade: true,
    arrows: true,
    dots: false,
    nextArrow:
      '<button class="projects-gallery-next project-gallery-arrow" aria-label="Next" type="button"><img src="https://gunnarfloral.com/wp-content/uploads/2019/03/gunnar-custom-cursor_left-128x128.png"/></button>',
    prevArrow:
      '<button class="projects-gallery-previous project-gallery-arrow" aria-label="Previous" type="button"><img src="https://gunnarfloral.com/wp-content/uploads/2019/03/gunnar-custom-cursor_left-128x128.png"/></button>',
    responsive: [
      {
        breakpoint: 620,
        settings: {
          arrows: true
        }
      }
    ]
  });

});

