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
      '<button class="projects-gallery-next project-gallery-arrow" aria-label="Next" type="button">Next&#x2192;</button>',
    prevArrow:
      '<button class="projects-gallery-previous project-gallery-arrow" aria-label="Previous" type="button">&#x2190;Previous</button>',
    responsive: [
      {
        breakpoint: 475,
        settings: {
          arrows: false,
        }
      }
    ]
  });

});

