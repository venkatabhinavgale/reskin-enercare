"use strict";

window.addEventListener('load', function () {
  var carouselWrapper = document.querySelectorAll('.block-carousel__wrapper');
  carouselWrapper.forEach(function (carousel) {
    //let carousel = document.querySelector('.block-carousel__wrapper');
    var $slidesToShow = carousel.getAttribute("data-num-slides");
    if ($slidesToShow === "") $slidesToShow = 1;
    var $slidesToScroll = carousel.getAttribute("data-num-advance");
    if ($slidesToScroll === "") $slidesToScroll = 1;
    var $breakpoints = carousel.getAttribute("data-breakpoints");
    var $responsive_obj = null;

    if ($breakpoints !== "") {
      $responsive_obj = JSON.parse(decodeURIComponent($breakpoints));
    }

    var $id = carousel.getAttribute("data-id"); //console.log("slidesToShow", $slidesToShow);
    //console.log("slidesToScroll", $slidesToScroll);
    //console.log("responsive_obj", $responsive_obj);

    new Glider(carousel.querySelector('.block-carousel'), {
      slidesToShow: $slidesToShow,
      slidesToScroll: $slidesToScroll,
      arrows: {
        prev: '.glider-prev-' + $id,
        next: '.glider-next-' + $id
      },
      dots: '.glider-dots-' + $id,
      responsive: $responsive_obj
    });
  });
  /**
   * Setup Next/Previous Status Reporters
   */

  var gliderNotificationCenter;
  gliderNotificationCenter = document.querySelector('#gliderNotificationCenter');
  var reviewsCarouselPrev = document.querySelector('.block-reviews__prev');
  var reviewsCarouselNext = document.querySelector('.block-reviews__next');

  var reviewCarouselAction = function reviewCarouselAction(event, direction) {
    gliderNotificationCenter.textContent = '';

    if (!event.target.classList.contains('disabled') && window.outerWidth >= 1024) {
      gliderNotificationCenter.textContent = "Carousel of reviews moved to ".concat(direction, " slide of 4 reviews.");
    } else if (!event.target.classList.contains('disabled') && window.outerWidth < 775) {
      gliderNotificationCenter.textContent = "Carousel of reviews moved to ".concat(direction, " review.");
    }
  };

  reviewsCarouselNext.addEventListener('click', function (event) {
    reviewCarouselAction(event, 'Next');
  });
  reviewsCarouselPrev.addEventListener('click', function (event) {
    reviewCarouselAction(event, 'Prev');
  });
});