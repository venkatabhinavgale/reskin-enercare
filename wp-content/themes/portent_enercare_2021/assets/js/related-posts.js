"use strict";

window.addEventListener('load', function () {
  var columnCarousel = document.querySelectorAll('.block-blog-posts');
  columnCarousel.forEach(function (carousel) {
    var id = '5772835235';
    new Glider(carousel, {
      slidesToShow: 1,
      slidesToScroll: 1,
      itemWidth: 260,
      arrows: {
        prev: '.related-posts__glider-prev',
        next: '.related-posts__glider-next'
      },
      dots: '.related-posts__glider-dots',
      responsive: [{
        // screens greater than >= 775px
        breakpoint: 768,
        settings: {
          // Set to `auto` and provide item width to adjust to viewport
          slidesToShow: 'auto',
          slidesToScroll: 'auto',
          itemWidth: 260,
          duration: 0.25
        }
      }, {
        // screens greater than >= 1024px
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          itemWidth: 260,
          duration: 0.25
        }
      }]
    });
  });
});
