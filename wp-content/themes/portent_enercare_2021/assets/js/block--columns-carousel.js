"use strict";

window.addEventListener('load', function () {
  console.log('loading');
  var columnCarousel = document.querySelectorAll('.wp-block-columns.is-mobile-carousel');
  columnCarousel.forEach(function (carousel) {
    var id = '5772835235';
    new Glider(carousel, {
      slidesToShow: 'auto',
      slidesToScroll: 1,
      itemWidth: 260,
      arrows: {
        prev: '.glider-prev-' + id,
        next: '.glider-next-' + id
      },
      dots: '.glider-dots-' + id
    });
  });
});