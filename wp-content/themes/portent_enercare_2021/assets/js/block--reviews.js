"use strict";

window.addEventListener('load', function () {
  var blockReviews = document.querySelector('.block-reviews__glider');
  var prevArrow, prevArrowImage, nextArrow, nextArrowImage, dots, imagePath;
  imagePath = '/wp-content/themes/portent_enercare_2021/assets/icons/utility/';
  prevArrow = document.createElement('button');
  prevArrowImage = document.createElement('img');
  prevArrow.classList.add('button__prev', 'block-reviews__prev');
  prevArrow.setAttribute('aria-label', 'Previous');
  prevArrowImage.setAttribute('src', "".concat(imagePath, "arrow_back.svg"));
  prevArrowImage.setAttribute('alt', 'Previous');
  prevArrow.appendChild(prevArrowImage);
  nextArrow = document.createElement('button');
  nextArrowImage = document.createElement('img');
  nextArrow.classList.add('button__next', 'block-reviews__next');
  nextArrow.setAttribute('aria-label', 'Next');
  nextArrowImage.setAttribute('src', "".concat(imagePath, "arrow_forward.svg"));
  nextArrowImage.setAttribute('alt', 'Next');
  nextArrow.appendChild(nextArrowImage);
  dots = document.createElement('div');
  dots.classList.add('dots', 'block-reviews__dots');
  dots.setAttribute('role', 'tablist');
  blockReviews.parentNode.insertBefore(dots, blockReviews.nextSibling);
  blockReviews.parentNode.insertBefore(nextArrow, blockReviews.nextSibling);
  blockReviews.parentNode.insertBefore(prevArrow, blockReviews.nextSibling);
  new Glider(blockReviews, {
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: true,
    dots: '.block-reviews__dots',
    arrows: {
      prev: '.block-reviews__prev',
      next: '.block-reviews__next'
    },
    responsive: [{
      // screens greater than >= 775px
      breakpoint: 775,
      settings: {
        // Set to `auto` and provide item width to adjust to viewport
        slidesToShow: 2,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.25
      }
    }, {
      // screens greater than >= 1024px
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.25
      }
    }]
  });
});