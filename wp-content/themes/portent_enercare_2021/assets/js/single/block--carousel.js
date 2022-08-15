window.addEventListener('load', function(){

  let carouselWrapper = document.querySelectorAll('.block-carousel__wrapper');
  carouselWrapper.forEach(function(carousel) {

    //let carousel = document.querySelector('.block-carousel__wrapper');
    let $slidesToShow = carousel.getAttribute("data-num-slides");
    if ($slidesToShow === "")
      $slidesToShow = 1;

    let $slidesToScroll = carousel.getAttribute("data-num-advance");
    if ($slidesToScroll === "")
      $slidesToScroll = 1;

    let $breakpoints = carousel.getAttribute("data-breakpoints");
    let $responsive_obj = null;
    if ($breakpoints !== "") {
      $responsive_obj = JSON.parse(decodeURIComponent($breakpoints));
    }

    let $id = carousel.getAttribute("data-id");

    //console.log("slidesToShow", $slidesToShow);
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
	let gliderNotificationCenter;
	gliderNotificationCenter = document.querySelector('#gliderNotificationCenter');

	let reviewsCarouselPrev = document.querySelector('.block-reviews__prev');
	let reviewsCarouselNext = document.querySelector('.block-reviews__next');

	let reviewCarouselAction = function(event, direction) {
		gliderNotificationCenter.textContent = '';
		if(!event.target.classList.contains('disabled') && window.outerWidth >= 1024) {
			gliderNotificationCenter.textContent = `Carousel of reviews moved to ${direction} slide of 4 reviews.`;
		} else if(!event.target.classList.contains('disabled') && window.outerWidth < 775) {
			gliderNotificationCenter.textContent = `Carousel of reviews moved to ${direction} review.`;
		}
	};

	reviewsCarouselNext.addEventListener('click', function(event){
		reviewCarouselAction(event, 'Next');
	});
	reviewsCarouselPrev.addEventListener('click', function(event){
		reviewCarouselAction(event, 'Prev');
	});
});
