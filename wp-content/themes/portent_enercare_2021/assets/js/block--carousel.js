"use strict";

window.addEventListener('load', function () {
  var carouselWrapper = document.querySelectorAll('.block-carousel__wrapper');
  carouselWrapper.forEach(function (carousel) {
    //let carousel = document.querySelector('.block-carousel__wrapper');
    var $slidesToShow = carousel.getAttribute("data-num-slides");
    if ($slidesToShow == "") $slidesToShow = 1;
    var $slidesToScroll = carousel.getAttribute("data-num-advance");
    if ($slidesToScroll == "") $slidesToScroll = 1;
    var $breakpoints = carousel.getAttribute("data-breakpoints");
    var $responsive_obj = null;

    if ($breakpoints != "") {
      $responsive_obj = JSON.parse(decodeURIComponent($breakpoints));
    }

    var $id = carousel.getAttribute("data-id"); //console.log("slidesToShow", $slidesToShow);
    //console.log("slidesToScroll", $slidesToScroll);
    //console.log("responsive_obj", $responsive_obj);

    new Glider(carousel.querySelector('.wp-block-acf-glider-carousel'), {
      slidesToShow: $slidesToShow,
      slidesToScroll: $slidesToScroll,
      arrows: {
        prev: '.glider-prev-' + $id,
        next: '.glider-next-' + $id
      },
      dots: '.glider-dots-' + $id,
      responsive: $responsive_obj
      /* example
      responsive: [
      {
        // screens greater than >= 775px
        breakpoint: 775,
        settings: {
          // Set to `auto` and provide item width to adjust to viewport
          slidesToShow: 'auto',
          slidesToScroll: 'auto',
          itemWidth: 150,
          duration: 0.25
        }
      },{
        // screens greater than >= 1024px
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          itemWidth: 150,
          duration: 0.25
        }
      }
      ]
      */

    });
  });
});