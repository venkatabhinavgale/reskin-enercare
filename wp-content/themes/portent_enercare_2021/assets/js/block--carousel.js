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
});